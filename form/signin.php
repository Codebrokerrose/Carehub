<?php
  include("config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carehub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <!-- <img class="logo" src="logo_carehub.jpeg" alt="logo"> -->
        </div>
        <div></div><div></div><div></div>
        <div class="nav-button">
            <button id="loginBtn" class="Btn white-btn">Sign in</button>
            <button id="registerBtn" class="Btn"><a href="signup.php">Sign up</a> </button>
        </div>
    </nav>
</div>
    <div class="box">
        <div class="image">  
        </div>
        <div class="form">
            <form action="" method="post" class="sign-in-form">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="user" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="pass" required>
                </div>
                <input type="submit" value="Login" name="sub" class="btn">
            </form>
        </div>
    </div>
    <div class="back">
        <button class="Btn"><a href="/carehub/home/index.php"><- Go back</a></button>
    </div>
</body>
</html>

<?php
if(isset($_POST['sub']) && ($_POST['sub'] == 'Login')){
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // Admin login check
    $query = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'") or die($conn->error);
    $fetch = $query->fetch_array();
    $valid = $query->num_rows;

    if($valid > 0){
        $_SESSION['admin_id'] = $fetch['admin_id'];
        header("location:../../carehub-admin/public_html/admin/dashboard.php");
    } else {
        // User login check
        $log = "SELECT * FROM `register` WHERE `username`='$username' AND `password`='$password'";
        $p = $conn->query($log);
        if($p && $p->num_rows > 0){
            // SQL query to insert data into the login table
            $sql = "INSERT INTO `login` (username, password) VALUES ('$username', '$password')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['username'] = $username;
                header("Location: /carehub/home/index.php"); // Redirect to the homepage or any other page
                exit();
            } else {
                echo "<script>alert('Error logging in. Please try again.')</script>";
            }
        } else {
            echo "<script>alert('Invalid username or password')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }
    }
    $conn->close();
}
?>

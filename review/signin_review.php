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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" /> <!--links to an external CSS file hosted on the Font Awesome Pro CDN, providing access to Font Awesome icons-->
    <link rel="stylesheet" href="style_review.css">
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
            <!-- <p class="social-text">Or Sign in with social platform</p>
            <div class="social-media">
                <a href="#" class="social-icon">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="social-icon">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="social-icon">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div> -->
            <!-- <br><br>
            <p class="account-text">Don't have an account? <a href="signup.php" id="sign-up-btn2">Sign up</a></p> -->
        </form>
    </div>
    </div>
    <div class="back">
        <button  class="Btn "><a href="review_page.php"><- Go back </a>  </button>
    </div>
</body>
</html>
<?php
if(isset($_POST['sub'])&& ($_POST['sub']=='Login')){

$log="select * from `register` where `username`='".$_POST['user']."' and `password`='".$_POST['pass']."'";
$p=mysqli_query($db_con,$log);
if($p && mysqli_num_rows($p)>0){
        // Fetching form data
        $username = $_POST['user'];
        $password = $_POST['pass']; // Note: In a real-world scenario, you should encrypt the password before storing it in the database
    
        // SQL query to insert data into the login table
        $sql = "INSERT INTO `login` (username,  password) VALUES ('$username', '$password')";
        $db_con->query($sql);
        // // Executing the SQL query
        if ($db_con->query($sql) === TRUE) {  
            echo "New record created successfully";
        } 
        $_SESSION['username']=$_POST['user'];
        // Redirect the user to another page (optional)
        header("Location: /carehub/review/review_form.php"); // Redirect to the homepage or any other page
        exit();
}

}
?>
</table>
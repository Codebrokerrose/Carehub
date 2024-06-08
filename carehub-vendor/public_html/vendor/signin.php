<?php
// Start the session before any output
session_start();

// Check if the signin form is submitted
if (isset($_POST['signin'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

    // Establish database connection
    $conn = new mysqli("localhost", "root", "", "carehub") or die(mysqli_error());

    // Escape input values to prevent SQL injection
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);
    $address = $conn->real_escape_string($address);
    $mobile = $conn->real_escape_string($mobile);


    // Insert registration record into vendor_register table
    $insert_query = "INSERT INTO `vendor-register` (`user_no`,`name`,`password`, `email`,  `address`, `mobile`, `status`) 
                     VALUES ('','$name','$password', '$email',  '$address', '$mobile', '0')";

    // Execute the query
    if ($conn->query($insert_query) === TRUE) {
        // Redirect to dashboard if registration is successful
        $_SESSION['username'] = $username;
        header("location:./dashboard.php");
        exit(); // Make sure to exit after redirection
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor || Panel</title>
    <link rel="shortcut icon" href="../uploads/cicon.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/customize.css">
    <style>
        /* CSS styles */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, Sans-serif;	
        }
        
        body {
            height: 100vh;
            justify-content: center;
            align-items: center;
            background: url('../../../carehub/carehub_service_img/vendor_img.jpeg'); no-repeat center center fixed;
            background-size: cover;
            font-size: 16px;
        }
        
        .container {
            width: 100%;
            max-width: 650px;
            background: rgba(0, 0, 0, 0.9);
            padding: 20px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: inset -2px 2px 2px white;
        }
        
        .form-title {
            font-size: 26px;
            font-weight: 600;
            text-align: center;
            padding-bottom: 6px;
            color: white;
            text-shadow: 2px 2px 2px black;
            border-bottom: solid 1px white;
        }
        
        .user-input-box {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            padding-bottom: 10px;
        }
        
        .user-input-box:nth-child(odd) {
            justify-content: flex-end;
        }
        
        .user-input-box label {
            width: 50%; /* Adjusted width for labels */
            color: white;
            font-size: 20px;
            font-weight: 400;
            margin: 5px 0;
        }
        
        .user-input-box input {
            width: 50%; /* Adjusted width for inputs */
            height: 40px;
            border-radius: 7px;
            outline: none;
            border: 1px solid grey;
            padding: 0 10px;
            margin-bottom: 10px;
        }
        
        .form-submit-btn {
            margin-top: 20px;
        }
        
        .form-submit-btn input {
            display: block;
            width: 100%;
            margin-top: 10px;
            font-size: 20px;
            padding: 10px;
            border: none;
            border-radius: 3px;
            color: rgb(209, 209, 209);
            background: rgba(63, 114, 76, 0.7);
        }
        
        .form-submit-btn input:hover {
            background: rgba(56, 204, 93, 0.7);
            color: rgb(255, 255, 255);
        }
        
        @media (max-width: 600px) {
            .container {
                min-width: 280px;
            }
        
            .user-input-box {
                margin-bottom: 6px;
            }
        }
#branding{
            padding-left:10px;
            padding-bottom:20px;
 }
.div1{
    width:80%;
    margin:auto;
    overflow:hidden;
     }
header .div1 {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 0; /* Remove any padding if present */
    margin: 0; /* Remove any margin if present */
}

.logo {
    margin-left: 5%; /* Ensure the logo is at the very left */
    margin-bottom:1%;
}

.logo img {
    width: 90px;
    height: 65px;
    border-radius: 100%;
}



.back .Btn{
    width: 130px;
    height: 40px;
    font-weight: 500;
    background: rgba(255, 255, 255, 0.4);
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: .3s ease;
}

.back{
    position: absolute;
    bottom: 2%;
    left: 2%;
}
header{
    padding-top:10px;
}

.Btn:hover{
    background: rgba(255,255,255,0.3);
}
.Btn.Btn.white-btn:hover{
    background: rgba(255,255,255,0.5);
}
.Btn>a{
    color:black;
}
    </style>
</head>
<body>
    <header style="background: gray; color:white;">
        <div class="div1">
        <div class="logo">
            <img src="/carehub/logo_carehub.jpeg" alt="Logo">
        </div>
            <div id="branding">
                <h1> 
                    <span class="highlight" style="color:#9cf;">VENDOR</span> | CAREHUB
                </h1>
            </div>
        </div>
    </header>
    <br><br>
    <div class="container">
        <div class="clsDiv">
            <h2 style="text-align:center;"><font color="white">Vendor</font></h2>
            <hr/>
            <form id="frmLogin" method="post" action="">
                <div class="user-input-box">
                    <label for="name">Full Name:</label>
                    <input class="clsTxt" type="text" name="name" placeholder="Enter full name" required>
                </div>
                <div class="user-input-box">
                    <label for="email"><font color="white">Email</font></label>
                    <input class="clsTxt" type="email" name="email" placeholder="Enter email" required>
                </div>
     
                <div class="user-input-box">
                    <label for="password"><font color="white">Password</font></label>
                    <input class="clsTxt" type="password" name="password" placeholder="Enter password" required>
                </div>
                <div class="user-input-box">
                    <label for="address">Address:</label>
                    <input class="clsTxt" type="text" name="address" placeholder="Enter address" required>
                </div>
                <div class="user-input-box">
                    <label for="mobile">Mobile:</label>
                    <input class="clsTxt" type="text" name="mobile" placeholder="Enter mobile number" required>
                </div>
                <a href="index.php">Already have an account? Sign in</a>
                <br><br>
                <button type="submit" name="signin" class="btn btn-primary btn-block">Sign in</button>
            </form>
        </div>
    </div>
    <div class="back">
        <button class="Btn "><a href="/carehub/home/index.php"><- Go back </a>  </button>
    </div><br>
</body>
</html>

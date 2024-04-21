<?php
  include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carehub</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
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
                <button id="loginBtn" class="Btn "><a href="signin.php">Sign in</a> </button>
                <button id="registerBtn" class="Btn white-btn"><a href="signup.php">Sign up</a> </button>
            </div>
           
        </nav>
    </div>
    <div class="box">
    <div class="image">  
    </div>
    <div class="form">
        <form action="/carehub/home/index.php" method="post" class="sign-in-form">
            <h2 class="title">Sign Up</h2>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="user">
            </div>
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Email" name="email">
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="pass">
            </div>
            <input type="submit"name="submit" value="SIGNUP" class="btn">
            <p class="social-text">Or Sign in with social platform</p>
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
            </div>
            <!-- <br> -->
            <!-- <p class="account-text">Have an account? <a href="signin.php" id="sign-up-btn2">Sign In</a></p> -->
        </form>
    </div>
    </div>
    <div class="back">
        <button class="Btn "><a href="/carehub/home/index.php"><- Go back </a>  </button>
    </div>
</body>
</html>
<?php
if(isset($_POST['submit']) && ($_POST['submit']=='Submit')){
$insert="INSERT INTO `register` (`username`, `email`, `password`) VALUES('".$_POST['user']."','".$_POST['email']."','".$_POST['pass']."')";
$result=mysqli_query($db_con,$insert);
}
?>
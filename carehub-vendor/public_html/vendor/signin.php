<?php
// Start the session before any output
session_start();

// Check if the signin form is submitted
if (isset($_POST['signin'])) {
    // Get form data
    $company = $_POST['company'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    // Establish database connection
    $conn = new mysqli("localhost", "root", "", "carehub") or die(mysqli_error());

    // Escape input values to prevent SQL injection
    $company = $conn->real_escape_string($company);
    $email = $conn->real_escape_string($email);
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);
    $type = $conn->real_escape_string($type);

    // Insert registration record into vendor_register table
    $insert_query = "INSERT INTO `vendor_register` (`id`, `full_name`, `email`, `username`, `password`, `service_type`) 
                     VALUES ('', '$company', '$email', '$username', '$password', '$type')";

    // Execute the query
    $conn->query($insert_query);

    // Close database connection
    $conn->close();

    // Redirect to dashboard if registration is successful
    $_SESSION['username'] = $username;
    header("location:./dashboard.php");
    exit(); // Make sure to exit after redirection
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin || Panel</title>
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
            background: url('background.png') no-repeat center center fixed;
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
            padding-left:100px;
            padding-bottom:20px;
        }
    </style>
</head>
<body>
    <header style="background: gray; color:white;">
        <div>
            <div id="branding">
                <h1> 
                    <span class="highlight" style="color:#9cf;">VENDOR</span> | CAREHUB
                </h1>
            </div>
        </div>
    </header>
    <br><br><br>
    <div class="container">
  
        <div class="clsDiv">
            <h2 style="text-align:center;"><font color="white">Vendor</font></h2>
            <hr/>
            <form id="frmLogin" method="post" action="">
                <div class="user-input-box">
                    <label for="company">Full name of service producer:</label>
                    <input class="clsTxt" type="text" name="company" placeholder="Enter company name">
                    <label for="email"><font color="white">Email</font></label>
                    <input class="clsTxt" type="email" name="email" placeholder="Enter email">
                </div>
                <div class="user-input-box">
                    <label for="username"><font color="white">Username</font></label>
                    <input class="clsTxt" type="text" name="username" placeholder="Enter username">
                </div>
                <div class="user-input-box">
                    <label for="password"><font color="white">Password</font></label>
                    <input class="clsTxt" type="password" name="password" placeholder="Enter password">
                </div>
                <div class="user-input-box">
                    <label for="type">Service (eg. garden, aquarium, pet) :</label>
                    <input class="clsTxt" type="text" name="type" placeholder="Enter service type ">
                </div>
                <a href="index.php">Already have an account? Sign in</a>
                <br><br>
                <button type="submit" name="signin" class="btn btn-primary btn-block">Sign in</button>
            </form>
        </div>
    </div>
    <br><br><br>
</body>
</html>

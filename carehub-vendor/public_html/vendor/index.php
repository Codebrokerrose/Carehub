
<!DOCTYPE html>
<html>
<head>
	<title> VENDOR || Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel = "shortcut icon" href = "../uploads/cicon.png" />
    <!-- //for-mobile-apps -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link href="css/customize.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="../css/style4.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	
</head>
<style>
header{
    padding-top:10px;
}
header .container {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 0; /* Remove any padding if present */
    margin: 0; /* Remove any margin if present */
}

.logo {
    margin-left: 5%; /* Ensure the logo is at the very left */
}

.logo img {
    width: 90px;
    height: 65px;
    border-radius: 100%;
}

#branding {
    margin-left: 10px; /* Adjust this value to move the text closer or further from the logo */
}
#branding h1 {
    margin: 0;
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
<body style="background-image:url('background.png'); background-repeat:no-repeat; background-size:cover;">
	<header style="background: gray; color:white;">
    	<div class="container">
		<div class="logo">
            <img src="/carehub/logo_carehub.jpeg" alt="Logo">
        </div>
    		<div id="branding">
    			<h1> 
                <span class="highlight" style="color:#9cf;">VENDOR</span> |
                 CAREHUB
    			</h1>
    		</div>
    	</div>
    	<br/>	
</header>
<div class="container">
<br><br><br>
<div class="clsDiv" style="background-color:rgba(0,0,0, 0.9); ">
	<h2 style=" text-align:center;"><font color="white">Vendor</font></h2>
	<hr/>
	<form id="frmLogin" method="post" action="">
		<label for="username" ><font color="white">Username</font></label>
		<input class="clsTxt" type="text" name="username" placeholder="Enter username">
		<label for="password"><font color="white">Password</font></label>
		<input class="clsTxt" type="text" name="password" placeholder="Enter password">
		<a href="signin.php">Do you have no account ? Sign in</a>
		<br><br>
		<button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
	</form>
</div>
</div>
<div class="back">
        <button class="Btn "><a href="/carehub/home/index.php"><- Go back </a>  </button>
    </div>
</body>
</html>
<?php
	session_start();
	
	if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
		$conn = new mysqli("localhost","root","","carehub") or die(mysqli_error());
		// Check if the vendor exists in the vendor_register table
		$query_register = $conn->query("SELECT * FROM `vendor-register` WHERE `name` = '$username' && `password` = '$password'") or die(mysqli_error());
		$valid_register = $query_register->num_rows;

		if($valid_register > 0) {
			// Insert login record into vendor_login table
			$insert_query = $conn->prepare("INSERT INTO `vendor-login` (`username`, `password`) VALUES ('$username', '$password')");
			$insert_query->execute();
			$insert_query->close();

			// Retrieve vendor information from the vendor table
			$query_vendor = $conn->query("SELECT * FROM `vendor-login` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
			$fetch_vendor = $query_vendor->fetch_array();
			$_SESSION['username'] = $fetch_vendor['username'];
			header("location:./dashboard.php");
		} else {
			echo "<script>alert('Invalid username or password')</script>";
			echo "<script>window.location = 'index.php'</script>";
		}
		$conn->close(); 
	}
?>

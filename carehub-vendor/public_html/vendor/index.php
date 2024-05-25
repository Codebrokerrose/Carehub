
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
<body style="background-image:url('background.png'); background-repeat:no-repeat; background-size:cover;">
	<header style="background: gray; color:white;">
    	<div class="container">
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

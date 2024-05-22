
<!DOCTYPE html>
<html>
<head>
	<title> Admin || Panel</title>
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
                <span class="highlight" style="color:#9cf;">ADMIN</span> |
                 CAREHUB
    			</h1>
    		</div>
    	</div>
    	<br/>	
</header>
<div class="container">
<br><br><br>
<div class="clsDiv" style="background-color:rgba(0,0,0, 0.9); ">
	<h2 style=" text-align:center;"><font color="white">Admin</font></h2>
	<hr/>
	<form id="frmLogin" method="post" action="login.php">
		<label for="username" ><font color="white">Username</font></label>
		<input class="clsTxt" type="text" name="username" placeholder="Enter username">
		<label for="password"><font color="white">Password</font></label>
		<input class="clsTxt" type="text" name="password" placeholder="Enter password"><br><br>
		<button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
	</form>
</div>
</div>
</body>
</html>

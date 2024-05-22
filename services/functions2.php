<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'carehub';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
// Template header, feel free to customize this
function template_header($title) {
// Get the number of items in the shopping cart, which will be displayed in the header.
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI','Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        outline: none;
        border: none;
        text-decoration: none;
        text-transform:uppercase;
    }
    </style>
	<body>
        <header>
            <div class="content-wrapper">
            <img class="logo" src="logo_carehub.jpeg" alt="logo">
                <h1>Personilized Aquarium Care <br> <i class="fa-solid"></i></h1>
                <nav>
                    <a href="../home/index.php">Home</a>
                    <a href="index2.php">Details</a>
                    <a href="index2.php?page=products2">Products</a>
                </nav>
                <div class="link-icons">
                    <a href="index2.php?page=cart">
						<i class="fas fa-shopping-cart"></i><span>$num_items_in_cart</span>
					</a>
                </div>
            </div>
        </header>
        <main>
EOT;
}
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year, CARE-HUB</p>
            </div>
        </footer>
    </body>
</html>
EOT;
}
?>
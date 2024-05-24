<?php


// Create tables if not exist
$sql_checkout = "CREATE TABLE IF NOT EXISTS checkout (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL,
    zip VARCHAR(10) NOT NULL,
    cardname VARCHAR(255) NOT NULL,
    cardnumber VARCHAR(255) NOT NULL,
    expmonth VARCHAR(20) NOT NULL,
    expyear VARCHAR(4) NOT NULL,
    cvv VARCHAR(4) NOT NULL,
    same_address BOOLEAN NOT NULL,
    payment_method VARCHAR(20) NOT NULL
)";
$pdo->exec($sql_checkout);

$sql_checkout_products = "CREATE TABLE IF NOT EXISTS checkout_products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    checkout_id INT NOT NULL,
    product_id INT NOT NULL,
    product_title VARCHAR(255) NOT NULL,
    FOREIGN KEY (checkout_id) REFERENCES checkout(id)
)";
$pdo->exec($sql_checkout_products);

// Get the number of items in the shopping cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$num_items_in_cart = count($products_in_cart);

$products = array();
if ($products_in_cart) {
    // Select products from the database
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM category WHERE id IN (' . $array_to_question_marks . ')');
    $stmt->execute(array_keys($products_in_cart));
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $fullname = htmlspecialchars($_POST['firstname']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    $zip = htmlspecialchars($_POST['zip']);
    $cardname = htmlspecialchars($_POST['cardname']);
    $cardnumber = htmlspecialchars($_POST['cardnumber']);
    $expmonth = htmlspecialchars($_POST['expmonth']);
    $expyear = htmlspecialchars($_POST['expyear']);
    $cvv = htmlspecialchars($_POST['cvv']);
    $same_address = isset($_POST['sameadr']) ? 1 : 0;
    $payment_method = isset($_POST['cashOnDelivery']) ? 'Cash on Delivery' : 'Card Payment';

    // Insert form inputs into the database
    $stmt = $pdo->prepare("INSERT INTO checkout (fullname, email, address, city, state, zip, cardname, cardnumber, expmonth, expyear, cvv, same_address, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$fullname, $email, $address, $city, $state, $zip, $cardname, $cardnumber, $expmonth, $expyear, $cvv, $same_address, $payment_method]);

    $checkout_id = $pdo->lastInsertId();

    // Insert product details into the checkout_products table
    $removed_products = array();
    foreach ($products as $product) {
        $stmt = $pdo->prepare("INSERT INTO checkout_products (checkout_id, product_id, product_title) VALUES (?, ?, ?)");
        $stmt->execute([$checkout_id, $product['id'], $product['title']]);
        
        // Prepare the removed products array
        $removed_products[] = array(
            'title' => $product['title'],
            'price' => $product['price'],
            'quantity' => $products_in_cart[$product['id']],
            'total' => $product['price'] * $products_in_cart[$product['id']],
            'date' => date('y-m-d')
        );
    }


  // Get the previously removed products from the session
  $previously_removed_products = isset($_SESSION['removed_products']) ? $_SESSION['removed_products'] : array();

  // Merge the old removed products with the new ones
  $_SESSION['removed_products'] = array_merge( $removed_products,$previously_removed_products);

  // Proceed with the rest of the checkout process
  $_SESSION['checkout_complete'] = true;
  header('Location: index.php?page=book');
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Stylesheet here */
        body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
  background-color: skyblue;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
  text-decoration:none;
  color:black;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

h2 {
  margin-left: 10px;
  font-weight: bold;
  font-size: 30px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
    </style>
</head>
<body>

<h2>Checkout Form</h2>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form method="post" action="">
                <!-- Checkout form content here -->
<div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name * </label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe" required>
            <label for="email"><i class="fa fa-envelope"></i> Email * </label>
            <input type="text" id="email" name="email" placeholder="john@example.com" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address * </label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
            <label for="city"><i class="fa fa-institution"></i> City * </label>
            <input type="text" id="city" name="city" placeholder="New York" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State * </label>
                <input type="text" id="state" name="state" placeholder="NY" required>
              </div>
              <div class="col-50">
                <label for="zip">Pin * </label>
                <input type="text" id="zip" name="zip" placeholder="10001" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr" > Shipping address same as billing
        </label>
        <hr>
        <h4 class="mb-3">Payment</h4>
        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="cashOnDelivery" name="cashOnDelivery" type="radio" class="custom-control-input">
            <span class="custom-control-label" for="cashOnDelivery">Cash on Delivery </span>
          </div>
        </div><br>
        <hr>
                <input type="submit" value="Continue to checkout" class="btn">
            </form>
        </div>
    </div>
    <div class="col-25">
        <div class="container">
            <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo $num_items_in_cart; ?></b></span></h4>
            <?php foreach ($products as $product): ?>
                <div>
                    <tr>
                        <td class="img">
                            <a href="index.php?page=product&id=<?=$product['id']?>">
                                <img src="uploads/<?=$product['img']?>" width="50" height="50" alt="<?=$product['title']?>">
                            </a>
                        </td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <a href="index.php?page=product&id=<?=$product['id']?>" style="font-weight:bold; text-transform:uppercase; position:absolute;"><?=$product['title']?></a>
                            <a href="index.php?page=cart&remove=<?=$product['id']?>" class="remove">Remove</a>
                        </td>
                    </tr>
                </div><br>
            <?php endforeach; ?>
            <hr>
            <p>Total <span class="price" style="color:black"><?php echo $_SESSION['subtotal']; ?></span></p>
        </div>
    </div>
</div>

</body>
</html>

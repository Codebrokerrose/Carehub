<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page</title>

    <!-- Swiper CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="styles.css">
    
   <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
   <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<!-- header section starts -->
<section id="header">
<?php include 'C:\xampp\htdocs\carehub\home\nav.php'; ?>
</section>
<!-- header section ends-->

<header>
    <div class="container">
        <div class="container__left">
            <h1>Read what our customers love about us</h1>
            <p style="text-transform:capitalize;">Over 200 companies from diverse sectors consult us to enhance the user experience of their products and services.</p>
            <p style="text-transform:capitalize;">We have helped companies increase their customer base and generate multifold revenue with our service.</p>
            <button>Read our success stories</button>
        </div>
    </div>
</header>

<section id="slider" class="pt-5" style="margin-top:100px;">
  <div class="container2">
    <h1  >Some of the Feedbacks</h1>
	  <div class="slider">
				<div class="owl-carousel">
				<?php
            // Fetch and display reviews from database
            $servername = "localhost";
            $username = "root"; // Replace with your database username
            $password = ""; // Replace with your database password
            $dbname = "carehub";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve reviews from database
            $sql = "SELECT * FROM reviews";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="slider-card">';
                    echo '<p class="text-center p-4" style="text-transform:capitalize;">' . $row["comment"] . '</p> <br>
					<h5 class="mb-0 text-center"><b>' . $row["username"] . '</b></h5>';
                                      
                    echo '</div>';
                }
            } else {
                echo '<div class="slider-card">';
                echo "<p>No reviews yet.</p>";
                echo '</div>';
            }
            $conn->close();
            ?>

			</div>
		</div>
  </div>
</section>
<?php if (isset($_SESSION['username'])) { ?>
<a href="review_form.php"style="margin:0 0 50px 50px" class="submit-review-btn">Give Your Feedback</a>
<?php } else { ?>
    <a href="signup_review.php"style="margin:0 0 50px 50px" class="submit-review-btn">Give Your Feedback</a>
    <?php } ?>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/script.js"></script>

<?php include 'C:\xampp\htdocs\carehub\home\footer.php'; ?>
</body>
</html>

 

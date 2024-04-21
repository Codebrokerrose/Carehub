<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareHub-About</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="About.css">
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    <script src="https://kit.fontawesome.com/f75e97ac39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
    <section id="header">
        <!-- navigation -->
        <?php include 'C:\xampp\htdocs\carehub\home\nav.php'; ?>
    </section>
    <section id="page-header" class="about-header">
        <h2>#KnowUs</h2>
        <p>Everything you need to know about us</p>
    </section>
    <section id="about-head" class="section-p1">
        <img src="/img/about/aNew.jpeg" alt="">
        <div>
            <h2>Who Are We?</h2>
            <p>Our objective is to enhance indoor plant care, fish care and pet care success 
                and promote healthier indoor plant environments by providing accurate care 
                instructions, personalized recommendations, and easy access to related services.
                We aim to make plant care and other hobbies more convenient, enjoyable, and rewarding for plant enthusiasts and pet owners alike.
            </p>
            <abbr title="">Get the best and stunning services from our team based on your looks
                and appearences you like.
            </abbr>
            
            <br><br>

            <!---for the sliding text-->
            <marquee bgcolor="yellow"  loop="-1" scrollamount="5" width="100%">Get the best and stunning fashion advices from our team based on your looks
                and appearences you like.</marquee>
        </div>
    </section>
    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="/img/features/f2.png" alt="">
            <h6>Order Online</h6>
        </div>
        <div class="fe-box">
            <img src="/img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="/img/features/f4.png" alt="">
            <h6>Promotion</h6>
        </div>
        <div class="fe-box">
            <img src="/img/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="/img/features/f6.png" alt="">
            <h6>24/7 Support</h6>
        </div>
    </section>
    <section id="newsletter" class="section-p1 section-m1">
        <!----since input section and writings are not in same row so have to create two divs--->
        <div class="newstext">
            <h4>Sign Up for Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers</span>
            </p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>
    <footer class="section-p1">
        <div class="col">
            <img  class="logo" src="/logo_carehub.jpeg" alt="">
            <h4>Contact</h4>
            <p><strong>Address</strong> kolkata, West Bengal 700024</p>
            <p><strong>Phone:</strong> +91 81000XXXXX</p>
            <p><strong>Hours:</strong> 10:00 - 18:00,Mon - Sat</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About </h4>
            <a href="#">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help & SupportS</a>
        </div>

        <div class="col install">
            <p>Secured Payment Gateway</p>
            <img src="/img/pay/pay.png" alt="">
        </div>
        <div class="copyright">
            <p>© 2024, CareHub Pvt Ltd</p>
        </div>
    </footer>
    <script src="/js/nav.js"></script>
</body>
</html>
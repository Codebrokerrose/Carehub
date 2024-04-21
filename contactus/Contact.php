<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareHub-ContactUs</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="Contact.css">
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
        <h2>#let's_talk</h2>
        <p>We are here to hear you</p>
    </section>
    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>We are all across the country. Meet us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p>Kolkata West-Bengal,India</p>
                </li>
                <li>
                    <i class="fal fa-envelope"></i>
                    <p>contact@abcd.com</p>
                </li>
                <li>
                    <i class="fal fa-phone-alt"></i>
                    <p>+91 81000XXXXX</p>
                </li>
                <li>
                    <i class="fal fa-clock"></i>
                    <p>Monday to Saturday: 9.00am to 16.00pm</p>
                </li>
            </div>
        </div>
        <div class="map">
            <!--adding the google map-->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3685.0081103378798!2d88.28075391429411!3d22.541368939798513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02790ae49907e5%3A0xa0fa815e35df395e!2sMallick%20Para%20Basti%2C%20Garden%20Reach%2C%20Kolkata%2C%20West%20Bengal%20700024!5e0!3m2!1sen!2sin!4v1659711929694!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <section id="form-details">
        <form action="">
            <span>LEAVE A MESSAGE</span>
            <h2>We would love to hear from you</h2>
            <input type="text" placeholder="Your Name">
            <input type="text" placeholder="E-mail">
            <input type="text" placeholder="Subject">
            <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
            <button class="normal">Submit</button>
        </form>
        <div class="people">
            <div class="circular-image">
                <img src="/carehub/usericon.png" alt="">
                <p><span>Soham Das</span>Ceo <br>Phone: +91 81000XXXXX
                <br>E-mail:contact@abcd.com</p>
            </div>
            <div>
                <img src="/carehub/usericon.png" alt="">
                <p><span>Raunak Kanji</span>Ceo <br>Phone: +91 81000XXXXX
                <br>E-mail:contact@abcd.com</p>
            </div>
            <div>
                <img src="/carehub/usericon.png" alt="">
                <p><span>Abhishek Balmiki</span>Ceo <br>Phone: +91 81000XXXXX
                <br>E-mail:contact@abcd.com</p>
            </div>
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
            <img  class="logo" src="/carehub/logo_carehub.jpeg" alt="">
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
            <img src="/carehub/img/pay/pay.png" alt="">
        </div>
        <div class="copyright">
            <p>© 2024, CareHub Pvt Ltd</p>
        </div>
    </footer>
</body>
</html>
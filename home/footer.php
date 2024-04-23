<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navigation</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" /> <!--links to an external CSS file hosted on the Font Awesome Pro CDN, providing access to Font Awesome icons-->
    <script src="https://kit.fontawesome.com/f75e97ac39.js" crossorigin="anonymous"></script> <!-- imports the Font Awesome JavaScript kit from its CDN, enabling dynamic loading of Font Awesome icons.-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> <!--This links to another external CSS file hosted on the Font Awesome CDN, providing access to Font Awesome version 6.1.1 icons. The integrity attribute ensures that the file has not been tampered with, and the crossorigin attribute specifies how to handle requests from different origins.-->
  </head>
  <style>
    /* Footer */
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

footer{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    background-color: rgba(199, 195, 195, 0.5);
}
footer .col{
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-left: 15px;
    margin-top: 15px;
    margin-bottom: 20px;
}
/*footer .logo{

}*/
footer h4{
    font-size: 14px;
    padding-bottom: 20px;
}
footer p{
    font-size: 13px;
    margin: 0 0 8px 0;
}
footer a{
    font-size: 13px;
    text-decoration: none;
    color: #222;
    margin-bottom: 10px;
}
footer .follow{
    margin-top: 20px;
}
footer .follow i{
    color: #465b52;
    padding-right: 4px;
    cursor: pointer;
}
footer .install .row img{
    border: 1px solid #088178;
    border-radius: 6px;
}
footer .install img{
    margin: 10px 0 15px 0;
}
footer .follow i:hover,
footer a:hover{
    color:#088178;
}
footer .copyright{
    width: 100%;
    text-align: center;
}
    .footer {
    margin-top: -100px;
    width: 100%;
    height: 900px;
    background-color: black;
  }

  .footer hr {
    height: 1px;
    margin-left: 5%;
    width: 90%;
  }

  .section-p1{
    padding: 40px 80px;
}

  </style>
<body>
        <!-- footer -->
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
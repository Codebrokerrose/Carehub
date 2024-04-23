<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CareHub </title>
    <script src="https://kit.fontawesome.com/cf90a6dd12.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="service_style.css">
</head>

<body>
    <!-- head top navbar -->
    <div id="topnavbar">
        <div id="logo">
            <div class="logo_img"><a href="aquarium.php">
                 <img class="logo"
                    src="logo_carehub.jpeg"
                    alt="logo">
                </a></div>
            <div>
                <p>
                    Personilized Aquariam <br>& Fish Care 
                    And more <i class="fa-solid"></i>
                </p>
            </div>
        </div>
        <div>
            <a href="/carehub/home/index.php"><h4>Home</h4></a>
            <a href="cartpage.php"><h4>Bookings</h4></a>
            <!-- <h4> Bookings</h4> -->
        </div>
    </div>
    <div id="productVideo">
        <div>
            <button><img
                    src="https://images.pond5.com/aquarium-icon-vector-isolated-contour-illustration-125891909_iconl.jpeg"
                    alt=""> For the best care of your Aquariam</button>
            <h1> Aquariam & Fish Caring </h1>
        </div>
        <div>
            <video autoplay loop muted plays-inline id="video">
                <source src="home-aquarium.webm" type="video/webm">
                </source>
            </video>
        </div>
    </div>
    <!-- productfilterbar -->
    <div id="container">

    <div id="productfilterbar" >

        <div>
            <a href="#aquarium_facility"> <img
                    src="https://www.redfin.com/blog/wp-content/uploads/2023/01/In-home-aquarium.jpg"
                    alt=""> </a>
                <p> Aquarium Service and installation</p>
            
        </div>
        <div> <a href="#order_fish">
                <img src="https://t4.ftcdn.net/jpg/06/02/25/13/240_F_602251377_pzHzmD8jIjUQLQh1sV03zJhqxTXL64cp.jpg"
                    alt="order_service"> </a>
            <p> Get your Fish Partner</p>
        </div>
        <div> <a href="#caring_instructions"> 
            <img src="https://assets.rebelmouse.io/eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpbWFnZSI6Imh0dHBzOi8vYXNzZXRzLnJibC5tcy83ODYxNzQ1L29yaWdpbi5qcGciLCJleHBpcmVzX2F0IjoxNzcwODY3MjE3fQ.1ZXXXBokM6Sul79eEALYzmw9miT0m_x6vyR7f_4lQ2s/img.jpg?width=980"
                alt="caring"> </a>
            <p> care Instructions </p>
        </div>
    </div>

    <!-- cart page  -->

    <div id="cartpagebar">

        <div id="cartpage">
            <div>
                <p> <i class="fa-solid fa-star"></i> Save 15% on every order</p>
                <p> Get Plus now</p>
            </div>
            <div>
                <p><i class="fa-solid fa-tag"></i> Upto 200 cashback</p>
                <p> on Amazon Pay</p>
            </div>
            <div>
                <p> <i class="fa-solid fa-tag"></i> 5% Simpl cashback up to 750</p>
                <p>Pay via Simpl</p>
            </div>
            <div>
                <p> <i class="fa-solid fa-tag"></i> Assured Cashback</p>
                <p>Upto 500 off </p>
            </div>
            <div>
                <p> <i class="fa-solid fa-tag"></i> Get upto 500 cashback </p>
                <p> Valid on Mobiwik Wallet</p>
               
            </div>
            <p id="tag"><i class="fa-solid fa-tag"></i>Congratulations! ₹50 saved so far!</p>        
            <but id="cart_button">
                <p>
                    <p id="total"></p>
                    <p id="sprice"></p>
                </p>
                

                <a href="cartpage.php">
                    <button id="OrderPlace">View Cart</button>
                </a>
                
            </but>     
        </div>
 
    </div>
    </div>
    <div id="productcart">
        
    </div>
</body>

</html>
<script src="productPage.js"></script>
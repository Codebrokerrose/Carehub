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
            <div><a href="petcare.php"> <img class="logo"
                    src="logo_carehub.jpeg"
                    alt="logo">
                </a></div>
            <div>
                <p>
                    Personilized Pet Care <br>
                    And More <i class="fa-solid"></i>
                </p>
            </div>
        </div>
        <div>
            <a href="/carehub/home/index.php"><h4>Home</h4></a>
            <a href="cartpage.php"><h4>Bookings</h4></a>
        </div>
    </div>
    <div id="productVideo">
        <div>
            <button><img
                    src="https://cdn-icons-png.flaticon.com/512/3460/3460335.png"
                    alt=""> For the best care of your Pets</button>
            <h1> Pet Caring </h1>
        </div>
        <div>
            <video autoplay loop muted plays-inline id="video">
                <source src="petvideo.mp4" type="video/mp4">
                </source>
            </video>
        </div>
    </div> 
    <!-- productfilterbar -->
    <div id="container">

    <div id="productfilterbar" >

        <div>
            <a href="#pet_home_facility"> <img
                    src="https://media.istockphoto.com/id/1250060339/photo/dog-shelter.jpg?s=612x612&w=0&k=20&c=-YBjeCarIKcvzONuxHdYAr1N64DjiiDOa56QOArlvY4="
                    alt=""> </a>
                <p> Pet Home Shelter</p>
            
        </div>
        <div> <a href="#order_pet_service">
                <img src="https://www.pawpurrfect.co/wp-content/uploads/2023/02/1-900x600-1-900x600-1-900x600.jpg"
                    alt="order_service"> </a>
            <p> Order Pet Service</p>
        </div>
        <div> <a href="#caring_instructions"> 
            <img src="https://www.sheknows.com/wp-content/uploads/2018/08/y5qkj4f4rpclrhgalqlu.jpeg?w=600"
                alt="caring"> </a>
            <p> care Instructions </p>
        </div>
    </div>

    <!--  productpage && cart page -->

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
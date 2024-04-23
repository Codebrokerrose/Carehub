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
            <div><a href="gardening.html"> <img class="logo"
                    src="logo_carehub.jpeg"
                    alt="logo">
                </a></div>
            <div>
                <p>
                    Personilized Plant Care <br>
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
                    src="planticon.png"
                    alt="" > For the Healthy and Greeny Environment</button>
            <h1> Gardening </h1>
        </div>
        <div>
            <video autoplay loop muted plays-inline id="video">
                <source src="gardenvideo.mp4" type="video/mp4">
                </source>
            </video>
        </div>
    </div>
    <!-- productfilterbar -->
    <div id="container">

    <div id="productfilterbar" >

        <div>
            <a href="#garden_facility"> <img
                    src="https://thumbs.dreamstime.com/b/english-cottage-garden-green-grass-lawn-backyard-house-infomal-landscape-decorate-rosemary-herb-silver-leaves-144973344.jpg"
                    alt=""> </a>
                <p> Order garden facility at home</p>
            
        </div>
        <div> <a href="#order_plants">
                <img src="https://www.shutterstock.com/image-vector/collection-3d-realistic-vector-icon-260nw-1948554235.jpg"
                    alt="orderingplant"> </a>
            <p> Order Plants</p>
        </div>
        <div> <a href="#caring_instructions"> 
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgGOGDMF3_ql6RF1gvHREt2XW0A92G_CTMjHgqr9NpVA&s"
                alt="caring"> </a>
            <p> care Instructions </p>
        </div>
    </div>

    <!-- product && cart page  -->

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
    </div>
    <div id="productcart">

    </div>

    
    

</body>

</html>
<script src="productPage.js"></script>
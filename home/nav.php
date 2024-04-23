<?php
  include("C:\\xampp\\htdocs\\carehub\\form\\config.php");
?>
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
    
html{
    scroll-behavior: smooth;
}


section nav{
    display: flex;
    justify-content: space-around;
    align-items: center;
    position: fixed;
    right: 0;
    left: 0;
    /* background: rgba(199, 195, 195); */
    background: #eee;
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
    z-index: 1000;
}

section nav .logo img{
    width: 100px;
    cursor: pointer;
    margin: 7px 0;
    position: absolute;
    left: 5%;

}

section nav ul{
    
    list-style: none;
}

section nav ul li{
    
    display: inline-block;
    margin: 0 15px;
}

section nav ul li a{
    text-decoration: none;
    color: #000;
    font-weight: 700;
    font-size: 17px;
    transition: 0.1s;
}

section nav ul li a::after{
    content: '';
    width: 0;
    height: 2px;
    background: var(--blue);
    display: block;
    transition: 0.2s linear;
}

section nav ul li a:hover::after{
    width: 100%;
}

section nav ul li a:hover{
    color: var(--blue);
}

section nav .icon i{
    font-size: 18px;
    color: #000;
    margin: 0 5px;
    cursor: pointer;
    transition: 0.3s;
}

section nav .icon i:hover{
    color: var(--blue);
}

.logo{
    width: 80px;
    height: 65px;
    border-radius: 100%;
    margin-bottom: 10px;
}

.icon{
    display: flex;
    margin-right: 15px;
}
.othericon{
    margin-top:4px ;
}

/* magnifying icon  */
.search{
    position: relative;
    width: 30px;
    height: 30px;
    background: white;
    border-radius: 60px;
    transition: 0.5s;
    /* box-shadow: 0 0 0 1px #000000; */
    margin-right: 15px;
    overflow: hidden;
}
.search.active{
    width: 360px;
}
.search .Icon{
    position: absolute;
    top: 0;
    left: 0;
    width: 30px;
    height: 30px;
    background-color: #eee;
    border-radius: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    cursor: pointer;
}
/* .search .Icon::before{
    content: '';
    position: absolute;
    width: 10px;
    height: 10px;
    border: 3px solid #000000;
    border-radius: 50%;
    transform: translate(-4px,-4px);
}
.search .Icon::after{
    content: '';
    position:absolute;
    width:3px;
    height: 12px;
    background:#000000;
    transform: translate(6px,6px) rotate(315deg);
} */

.search .input{
    position: relative;
    width: 300px;
    height: 30px;
    left: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.search .input input{
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    border: none;
    outline: none;
    font-size: 18px;
    padding: 10px 0;
}

.clear{
    position: absolute;
    top: 30%;
    transform: translateX(-50%);
    width: 15px;
    height: 15px;
    right: 12px;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
}

.clear::before{
    position:absolute;
    content:'';
    width:1px;
    height: 15px;
    background: #999;
    transform: rotate(45deg);
}
.clear::after{
    position:absolute;
    content:'';
    width:1px;
    height: 15px;
    background: #999;
    transform: rotate(315deg);
}

/* results of searchbox  */
.result-box ul{
    max-height: 250px;
    overflow-y: scroll;
}

.result-box ul{
    position: absolute;
    background: white;
    border-top:1px solid #999 ;
    padding: 15px 10px;
    right: 12%;
    top: 53px;
    display: flex;
    flex-direction: column;
}
.result-box ul li{
    width: 270px;
    list-style: none;
    border-radius: 3px;
    padding: 15px 10px;
    cursor: pointer;
}
.result-box ul li:hover{
    background-color: #e9f3ff;
}

/* usericon */
.user-pic{
    position: absolute;
    width: 30px;
    border-radius: 50%;
    cursor: pointer;
    right: 2%;
}

.sub-menu-wrap{
    position: absolute;
    top: 100%;
    right: 2%;
    width: 320px;
    max-height: 0px;
    overflow: hidden;
    transition: max-height 0.5s;
    
}

.sub-menu-wrap.open-menu{
    max-height: 400px;
    
}

.sub-menu{
    background:  #c1c4e9     ;
    padding: 20px;
    margin: 10px;
}
.sub-menu hr{
    border: 0;
    height: 1px;
    width: 100%;
    background: #000000;
    margin: 15px 0 10px;
}

.sub-menu-link{
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #525252;
    margin: 12px 0;
}

.sub-menu-link .options{
    width: 100%;
    font-size: 18px;
}

.sub-menu-link img{
    width: 40px;
    background: #e5e5e5;
    border-radius: 50%;
    padding: 8px;
    margin-right: 15px;
}

.sub-menu-link span{
    font-size: 22px;
    transition: transform 0.5s;
}

.sub-menu-link:hover span{
    transform: translatex(5px);
}

.sub-menu-link:hover .options{
    font-weight: 600;
}

.user-info{
    z-index: 9999;
    display: flex;
    align-items: center;
}

.user-info h3{
    font-weight: 500;
}

.user-info img{
    width: 18%;
    border-radius: 50%;
    margin-right: 15px;
}


/* button  */

.log{
    position: absolute;
    top: 15%;
    right: 2%;
    z-index: 2;
}

.button {
    background-color:  #eee  ; 
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    color: black; 
    border: 0.1px solid  rgb(71, 68, 68)  ;
  }
  
  .button:hover {
    background-color:  white  ;
  }

  </style>
<body>

        <!-- navigation -->
        <nav>
            <div class="logo">
                <img src="/carehub/logo_carehub.jpeg" class="logo">
            </div>

            <ul>
                <li><a href="/carehub/home/index.php">Home</a></li>
                <li><a href="/carehub/about/About.php">About</a></li>
                <li><a href="/carehub/blog/Blog.php">Blog</a></li>
                <li><a href="/carehub/review/review.php">Review</a></li>
                <li><a href="/carehub/contactus/Contact.php">Contact</a></li>
            </ul>

            <div class="icon">
                <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                <div class="search">
                    <div class="Icon"><i class="fa-solid fa-magnifying-glass"></i> </div>
                    <div class="input">
                        <input type="text" placeholder="search" id="mysearch">
                    </div>
                    <span class="clear" onclick="document.getElementById('mysearch').value=''"></span>
                </div>
                <div class="result-box">
                    <!-- <ul>
                        <li>js</li>
                        <li>css</li>
                    </ul> -->
                </div>
                <div class="othericon">
                    <!-- <i class="fa-solid fa-heart"></i> -->
                    <a href="/carehub/services/cartpage.php"><i class="fa-solid fa-cart-shopping"></i></a>
                    <i class="icofont-user"></i></div>
            </div>
            <?php if (isset($_SESSION['username'])){?>
                <img src="/carehub/usericon.png" alt="usericon" class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="/carehub/usericon.png" alt="usericon">
                        <h4><?php if (isset($_SESSION['username'])){ echo $_SESSION['username'];}else{ echo "Ankana Saha";  }?></h4>
                        
                    </div>
                    <hr>
                    <a href="#" class="sub-menu-link">
                        <img src="/carehub/usericon.png" alt="not loaded">
                        <span class="options">Edit Profile</span>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="https://static-00.iconduck.com/assets.00/settings-icon-1964x2048-8nigtrtt.png" alt="not loaded">
                        <span class="options">Settings & Privacy</span>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="https://static-00.iconduck.com/assets.00/help-icon-256x256-qc8wqct6.png" alt="not loaded">
                        <span class="options">Help & Support</span>
                        <span>></span>
                    </a>
                    <a href="/carehub/home/logout.php" class="sub-menu-link">
                        <img src="https://cdn-icons-png.flaticon.com/512/126/126467.png" alt="not loaded">
                        <span class="options">Logout</span>
                        <span>></span>
                    </a>
                </div>
            </div>
            <?php  }else{  ?>
                <div class="log">
                <!-- <button type="button" class="btn btn-outline-primary  button"><a href="/form/signin.php">Sign-in</a></button> -->
                <button class="button "><a href="/carehub/form/signup.php">Sign-up</a></button>
                </div>
            <?php } ?>
            
            
        </nav>

        <script src="/carehub/js/nav.js"></script>
        <script src="/carehub/js/search.js"></script>
</body>
</html>
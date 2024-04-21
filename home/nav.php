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
                <div class="othericon"><i class="fa-solid fa-heart"></i>
                    <a href="/services/cartpage.php"><i class="fa-solid fa-cart-shopping"></i></a>
                    <i class="icofont-user"></i></div>
            </div>
            <div class="log">
                <!-- <button type="button" class="btn btn-outline-primary  button"><a href="/form/signin.php">Sign-in</a></button> -->
                <button type="button" class="button"><a href="/carehub/form/signup.php">Sign-up</a></button>
            </div>
            <img src="/carehub/usericon.png" alt="usericon" class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="/carehub/usericon.png" alt="usericon">
                        <h4>Ankana Saha</h4>
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
                    <a href="#" class="sub-menu-link">
                        <img src="https://cdn-icons-png.flaticon.com/512/126/126467.png" alt="not loaded">
                        <span class="options">Logout</span>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
        <script src="/carehub/js/nav.js"></script>
        <script src="/carehub/js/search.js"></script>
</body>
</html>
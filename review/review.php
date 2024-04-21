<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>

    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="review.css">

</head>
<body>

<!-- header section starts -->
<section id="header">
<nav>
    <div class="logo">
        <img src="/logo_carehub.jpeg" class="logo">
    </div>

    <ul>
        <li><a href="/home/index.html">Home</a></li>
        <li><a href="/about/About.html">About</a></li>
        <li><a href="/blog/Blog.html">Blog</a></li>
        <li><a href="#review">Review</a></li>
        <li><a href="/contactus/Contact.html">Contact</a></li>
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
      <div class="othericon"><i class="fa-solid fa-heart"></i>
          <a href="/services/cartpage.html"><i class="fa-solid fa-cart-shopping"></i></a>
          <i class="icofont-user"></i></div>
  </div>
    <img src="/usericon.png" alt="usericon" class="user-pic" onclick="toggleMenu()">
    <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
            <div class="user-info">
                <img src="/usericon.png" alt="usericon">
                <h4>Ankana Saha</h4>
            </div>
            <hr>
            <a href="#" class="sub-menu-link">
                <img src="/usericon.png" alt="not loaded">
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
</section>
<!-- header section ends-->

<header>
    <div class="container">
      <div class="container__left">
        <h1>Read what our customers love about us</h1>
        <p>
          Over 200 companies frim diverse sectors consult us to enhance the
          user experience of their products and services.
        </p>
        <p>
          We have helped companies increase their customer base and generate
          multifold revenue with our service.
        </p>
        <button>Read our success stories</button>
      </div>
      <div class="container__right">
        <div class="card">
          <img src="assets/pic-1.jpg" alt="user" />
          <div class="card__content">
            <span><i class="ri-double-quotes-l"></i></span>
            <div class="card__details">
              <p>
                We had a great time collaboraring with the Filament team. They
                have my high recommendation!
              </p>
              <h4>- Marnus Stephen</h4>
            </div>
          </div>
        </div>
        <div class="card">
          <img src="assets/pic-2.jpeg" alt="user" />
          <div class="card__content">
            <span><i class="ri-double-quotes-l"></i></span>
            <div class="card__details">
              <p>
                The team drastically improved our product's user experience &
                increased our business outreach.
              </p>
              <h4>- Andrew Jettpace</h4>
            </div>
          </div>
        </div>
        <div class="card">
          <img src="assets/pic-3.jpg" alt="user" />
          <div class="card__content">
            <span><i class="ri-double-quotes-l"></i></span>
            <div class="card__details">
              <p>
                I absolutely loved working with the Filament team. Complete
                experts at what they do!
              </p>
              <h4>- Stacy Stone</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
<script src="/js/nav.js"></script>

</body>
</html>
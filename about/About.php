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
    <section id="page-header" class="about-header" style="background-image: url(/carehub/img/about/banner.png);">
        <h2>#KnowUs</h2>
        <p style="text-transform:capitalize;">Everything you need to know about us</p>
    </section>
    <section id="about-head" class="section-p1" style="padding-top: 170px;">
        <img src="/carehub/img/about/aNew.jpeg" alt="">
        <div>
            <h2>Who Are We?</h2><br>
            <p style="text-transform:capitalize;">Our objective is to enhance indoor plant care, fish care and pet care success 
                and promote healthier indoor plant environments by providing accurate care 
                instructions, personalized recommendations, and easy access to related services.
                We aim to make plant care and other hobbies more convenient, enjoyable, and rewarding for plant enthusiasts and pet owners alike.
            </p>
            <abbr title="" style="text-transform:capitalize;">Get the best and stunning services from our team based on your looks
                and appearences you like.
            </abbr>
            
            <br><br>

            <!---for the sliding text-->
            <marquee bgcolor="yellow"  loop="-1" scrollamount="5" width="100%">Get the best and stunning fashion advices from our team based on your looks
                and appearences you like.</marquee>
        </div>
    </section>
    <section id="feature" class="section-p1" style="padding-top:200px;">
        <div class="fe-box">
            <img src="/carehub/img/features/f2.png" alt="">
            <h6>Order Online</h6>
        </div>
        <div class="fe-box">
            <img src="/carehub/img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="/carehub/img/features/f4.png" alt="">
            <h6>Promotion</h6>
        </div>
        <div class="fe-box">
            <img src="/carehub/img/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="/carehub/img/features/f6.png" alt="">
            <h6>24/7 Support</h6>
        </div>
    </section>
    <section id="newsletter" class="section-p1 section-m1" style="background-image: url(/carehub/img/banner/b14.png);">
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
    <?php include 'C:\xampp\htdocs\carehub\home\footer.php'; ?>
</body>
</html>
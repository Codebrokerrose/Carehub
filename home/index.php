<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carehub-home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" /> <!--links to an external CSS file hosted on the Font Awesome Pro CDN, providing access to Font Awesome icons-->
    <script src="https://kit.fontawesome.com/f75e97ac39.js" crossorigin="anonymous"></script> <!-- imports the Font Awesome JavaScript kit from its CDN, enabling dynamic loading of Font Awesome icons.-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> <!--This links to another external CSS file hosted on the Font Awesome CDN, providing access to Font Awesome version 6.1.1 icons. The integrity attribute ensures that the file has not been tampered with, and the crossorigin attribute specifies how to handle requests from different origins.-->
  </head>
<body>

    <section id="Home">
    <?php include 'nav.php'; ?>
        <!-- navigation -->
        

        <!-- login/registration  -->
        <!-- <div class="log">
            <button type="button" class="btn btn-outline-primary  button"><a href="/form/signin.php">Sign-in</a></button>
            <button type="button" class="btn btn-outline-primary  button"><a href="/form/signup.php">Sign-up</a></button>
        </div> -->

        <!-- slider starts from here -->
        
        <div class="contain">
            <div class="slide-container active"> <div class="slide"> 
                <div class="content">
                    <h3>garden</h3>
                    <br>
                    <h4 class="scroll-txt">Take Care of Your Hobbies in a Easy Way . 
                    </h4>
           <br>
                    <a href="#" class="btn">learn_more</a>
                </div>
                <video src="./slide/slide3.mp4" muted autoplay loop></video>
            </div></div>
            <div class="slide-container"> <div class="slide"> 
                <div class="content">
                    <h3>aquariam</h3>
                    <br>
                    <h4 class="scroll-txt">Take Care of Your Hobbies in a Easy Way .</h4><br>
                    <a href="#" class="btn">learn_more</a>
                </div>
                <video src="./slide/slide2.mp4" muted autoplay loop></video>
            </div></div>
            <div class="slide-container"> <div class="slide"> 
                <div class="content">
                    <h3>Pet</h3><br>
                    <h4 class="scroll-txt">Take Care of Your Hobbies in a Easy Way .</h4><br>
                    <a href="#" class="btn">learn_more</a>
                </div>
                <video src="./slide/slide1.mp4" muted autoplay loop></video>
            </div></div>
            <div id="next" onclick="next()">></div>
            <div id="prev" onclick="prev()"><</div>
        </div>

        <!-- <div class="main">

            <div class="men_text">
                <h1>Take Care of Your<span>Hobbies</span><br>in a Easy Way</h1>
            </div>

            <div class="main_image">
            </div>
           

        </div>

        <p>
            Welcome to our innovative application designed to cater to the needs of plant enthusiasts and pet owners alike. Our application is specifically crafted to assist in the care of indoor plants, offering personalized care instructions, watering schedules on specific plant and user inputs. In addition to plant care, our application also provides access to gardening, pet care, and aquarium services, making it a comprehensive solution for all your indoor plant and pet care needs 
        </p> -->

    </section>
    <!-- categories------------------------ -->
    <hr>
    <div class="category_launches_newCat">
    <p>Category of Services  </p>
    <div class="category_launches_content">
      
    <form class=button_2 action="/carehub/services/gardening.php">
        <input type="image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrxHxyn-nyS-Rfvm7hC-OYbF0At3pjt5iOvvpciuLCrMm6GKUM9ypr19jdjMLgwRPzfK4&usqp=CAU" width="320" height="200"></input>
        <p class="category">Gardening </p>
        <p class="offers"></p>
    </form>
    
    <form class=button_2 action="/carehub/services/petcare.php">
      <input type="image" src="https://img.freepik.com/free-vector/people-playing-with-their-pets_52683-38011.jpg" width="320"  height="200"></input>
      <p class="category">Pet's care</p>
      <p class="offers"></p>
    </form>
    
    <form class=button_2 action="/carehub/services/aquarium.php">
      <input type="image" src="https://i.pinimg.com/736x/0f/ad/63/0fad633952eeac14b1d772f3e02cee04.jpg" width="320" height="200"></input>
      <!-- <input type="image" src="/aquariam.jpg" width="320" height="200"></input> -->
      <p class="category">Aquariam services</p>
      <p class="offers"></p>
    </form>
    </div>
    </div>

   



     <!--------------------End of the categories------------------------>
    <hr>
    <section id="banner" class="section-m1">
        <h4>All Services </h4>
        <h2>Up to <span>25% off</span> - This Summer</h2>
        <button class="normal">Explore More</button>
    </section>

    <!--Footer-->
    
<!-- 
    <footer>
        <div class="footer_main">

            <div class="footer_tag">
                <h2>Location</h2>
                <p>Sri Lanka</p>
                <p>USA</p>
                <p>India</p>
                <p>Japan</p>
                <p>Italy</p>
            </div>

            <div class="footer_tag">
                <h2>Quick Link</h2>
                <p><a href="index.php">Home</a ></p>
                <p><a href="#">About</a ></p>
                <p><a href="#">Category</a ></p>
                <p><a href="#">Review</a ></p>
                <p><a href="#">Order</a ></p>
            </div>

            <div class="footer_tag">
                <h2>Contact</h2>
                <p>+94 12 3456 789</p>
                <p>+94 25 5568456</p>
                <p>johndeo123@gmail.com</p>
                <p>foodshop123@gmail.com</p>
            </div>

            <div class="footer_tag">
                <h2>Our Service</h2>
                <p>Fast Delivery</p>
                <p>Easy Payments</p>
                <p>24 x 7 Service</p>
            </div>

            <div class="footer_tag">
                <h2>Follows</h2>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin-in"></i>
            </div>

        </div>

        <p class="end">Design by<span><i class="fa-solid fa-face-grin"></i> Carehub Master Code</span></p>

    </footer> -->

    <!--add advertizement -->

  <!-- <button class="learn_more" >
 
     <img src="https://cdn-dljph.nitrocdn.com/PEQqQodxjemeogsAdkpwmiyJxAvbbXbv/assets/static/optimized/rev-7ef0db9/wp-content/uploads/2019/09/ICON-FINAL.png" alt="spanner" width="100px" height="100px">
     <p><b>Company Insurance Protection </b><br>
      <span class="ll_more">Upto Rs.10,000 insurance cover with every service requests. </span> 
      <span class="l_more"> Learn More</span></p>
     </button>
    

    <hr>

    <button class="know_more" >
 
      
      <p><b>Anti Discrimination Policy</b><br>
       <span class="kk_more"> Company treats its community equally with respect and without judgement or bias <br> </span> 
       <br><span class="k_more"> Know more</span></p>
       <img src="https://img.utdstc.com/icon/6d5/2d7/6d52d7c3f05bc2a591b5add13d099a59b7bcf38d60faec55cc6d2f165cc985a8:200" alt="spanner" width="100px" height="100px">
      </button>
    
      <hr>

      <button class="skill_india" >
        <img src="http://shrideviti.com/wp-content/uploads/2019/10/SKILL_INDIA.jpg" alt="spanner" width="150px" height="150px">
        <p><b>Proud partners with Govt.of India</b><br>
         <span class="s_india_">Find professionals certified by Govt. of India under skill India Mission  <br> </span> 
        </p>
        </button>
        <hr>
 
        <div class="footer">
            <div class="about_us">
            <div class="places">
              <br>
              <span class="place_">About Us</span>
              <span class="place_">UC Impact</span>
              <span class="place_">Terms & Conditiions</span>
              <span class="place_">Privacy Policy</span>
              <span class="place_">Interest-Based Advertising</span>
              <span class="place_">Anti Discrimination Policy</span>
              <span class="place_">Blog</span>
              <span class="place_">Reviews</span>
              <span class="place_">Near Me</span>
              <span class="place_">Careers</span>
              <span class="place_">Gift Cards</span>
              <span class="place_">Contact Us</span>
              <br><br>
              <span class="place_">Quick Links</span>
            </div>
            </div>
            <hr>
  
            <div class="serving_in">
            <p style="color: white;"><b>Serving In</b></p><br>
  
            <p class="country"><b>AUS</b></p>
            <div class="places">
              <span class="place_">Melbourne</span>
              <span class="place_">Sydney</span>
            </div>
   
            <p class="country"><b>IND</b></p>
            <div class="places">
              <span class="place_">Agra</span>
              <span class="place_">Ahmedabad</span>
              <span class="place_">Alwar</span>
              <span class="place_">Amritsar</span>
              <span class="place_">Banglore</span>
              <span class="place_">Bhopal</span>
              <span class="place_">Chennai</span>
              <span class="place_">Coimbatore</span>
              <span class="place_">Delhi NCR</span>
              <span class="place_">Guntur</span>
              <span class="place_">Hyderabad</span>
              <span class="place_">Indore</span>
              <span class="place_">Jabalpur</span>
              <span class="place_">Jaipur</span>
              <span class="place_">Kochi</span>
              <span class="place_">Kolkata</span>
              <span class="place_">Kota</span><br><br>
              <span class="place_">Lucknow</span>
              <span class="place_">Ludhiyana</span>
              <span class="place_">Mumbai</span>
              <span class="place_">Mysore</span>
              <span class="place_">Patna</span>
              <span class="place_">Pune</span>
              <span class="place_">Raipur</span>
              <span class="place_">Surat</span>
              <span class="place_">Thiruvananthapuram</span>
              <span class="place_">Vadodara</span>
              <span class="place_">Varanasi</span>
              <span class="place_">Warangal</span>
            </div>
  
            <p class="country"><b>KSA</b></p>
            <div class="places">
              <span class="place_">Jeddah</span>
              <span class="place_">Riyadh</span>
            </div>
  
            <p class="country"><b>SGP</b></p>
            <div class="places">
              <span class="place_">Singapore</span>
            </div>
  
            <p class="country"><b>UAE</b></p>
            <div class="places">
              <span class="place_">Abu Dhabi</span>
              <span class="place_">Dubai</span>
              <span class="place_">Sharjah</span>
            </div>
  
            <p class="country"><b>USA</b></p>
            <div class="places">
              <span class="place_">Austin</span>
            </div>
            </div>
          <hr id="hr_of_footer">
  
  
            <div class="social_apps">
                <img src="/logo_carehub.jpeg" alt="logo">
          
      
          <div id="company_name_">
               <p style="color: rgb(160, 155, 155);;"><b>CareHub</b>
               </p>
          </div>
  
           <p id="copyright">© 2014-22 CareHub Technologies India Pvt Ltd.</p>
             <div class="sm_icons">
              <a href=""><i class="fa-brands fa-square-twitter fa-2x" style="color:  rgb(160, 155, 155); margin: 10px 10px;"></i></a>
              <a href=""><i class="fa-brands fa-square-facebook fa-2x" style="color:  rgb(160, 155, 155);margin: 10px 10px;"></i></a>
              <a href=""><i class="fa-brands fa-square-instagram fa-2x" style="color:  rgb(160, 155, 155);margin: 10px 10px;"></i></a>
              <a href=""><i class="fa-brands fa-youtube fa-2x" style="color:  rgb(160, 155, 155);margin: 10px 10px;"></i></a>
              <a href=""><i class="fa-brands fa-linkedin fa-2x" style="color:  rgb(160, 155, 155);margin: 10px 10px;"></i></a>
              <a href=""><i class="fa-brands fa-pinterest-p fa-2x" style="color:  rgb(160, 155, 155);margin: 10px 10px;"></i></a>
            </div>
           <form action="">
            <input type="image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Google_Play_Store_badge_EN.svg/2560px-Google_Play_Store_badge_EN.svg.png" width="150px" height="40px" style="margin-left: 90px;">
           </form>
           <form action="">
            <input type="image" src="data:image/png;base64,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" width="150px" height="40px" style="margin-left: 90px;border-radius: 5px;">
           </form>
          </div> -->
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
        <!-- <script src="/carehub/js/nav.js"></script>
        <script src="/carehub/js/search.js"></script> -->
        <script src="slider.js"></script>
</body>
</html>
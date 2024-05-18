<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carehub-home</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <!--links to an external CSS file hosted on the Font Awesome Pro CDN, providing access to Font Awesome icons-->
  <script src="https://kit.fontawesome.com/f75e97ac39.js" crossorigin="anonymous"></script>
  <!-- imports the Font Awesome JavaScript kit from its CDN, enabling dynamic loading of Font Awesome icons.-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--This links to another external CSS file hosted on the Font Awesome CDN, providing access to Font Awesome version 6.1.1 icons. The integrity attribute ensures that the file has not been tampered with, and the crossorigin attribute specifies how to handle requests from different origins.-->
</head>

<body>

  <section id="Home">
    <!-- navigation -->
    <?php include 'nav.php'; ?>
    <!-- login/registration  -->
    <!-- <div class="log">
            <button type="button" class="btn btn-outline-primary  button"><a href="/form/signin.php">Sign-in</a></button>
            <button type="button" class="btn btn-outline-primary  button"><a href="/form/signup.php">Sign-up</a></button>
        </div> -->

    <!-- slider starts from here -->

    <div class="contain">
      <div class="slide-container active">
        <div class="slide">
          <div class="content">
            <h3>garden</h3>
            <br>
            <h4 class="scroll-txt">Take Care of Your Hobbies in a Easy Way .
            </h4>
            <br>
            <a href="#" class="btn">learn_more</a>
          </div>
          <video src="./slide/slide3.mp4" muted autoplay loop></video>
        </div>
      </div>
      <div class="slide-container">
        <div class="slide">
          <div class="content">
            <h3>aquariam</h3>
            <br>
            <h4 class="scroll-txt">Take Care of Your Hobbies in a Easy Way .</h4><br>
            <a href="#" class="btn">learn_more</a>
          </div>
          <video src="./slide/slide2.mp4" muted autoplay loop></video>
        </div>
      </div>
      <div class="slide-container">
        <div class="slide">
          <div class="content">
            <h3>Pet</h3><br>
            <h4 class="scroll-txt">Take Care of Your Hobbies in a Easy Way .</h4><br>
            <a href="#" class="btn">learn_more</a>
          </div>
          <video src="./slide/slide1.mp4" muted autoplay loop></video>
        </div>
      </div>
      <div id="next" onclick="next()">></div>
      <div id="prev" onclick="prev()">
        << /div>
      </div>
  </section>
  <!-- categories------------------------ -->
  <hr>
  <div class="category_launches_newCat">
    <p>Category of Services </p>
    <div class="category_launches_content">

      <form class=button_2 action="/carehub/services/gardening.php">
        <input type="image"
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrxHxyn-nyS-Rfvm7hC-OYbF0At3pjt5iOvvpciuLCrMm6GKUM9ypr19jdjMLgwRPzfK4&usqp=CAU"
          width="320" height="200"></input>
        <p class="category">Gardening </p>
        <p class="offers"></p>
      </form>

      <form class=button_2 action="/carehub/services/petcare.php">
        <input type="image" src="https://img.freepik.com/free-vector/people-playing-with-their-pets_52683-38011.jpg"
          width="320" height="200"></input>
        <p class="category">Pet's care</p>
        <p class="offers"></p>
      </form>

      <form class=button_2 action="/carehub/services/aquarium.php">
        <input type="image" src="https://i.pinimg.com/736x/0f/ad/63/0fad633952eeac14b1d772f3e02cee04.jpg" width="320"
          height="200"></input>
        <!-- <input type="image" src="/aquariam.jpg" width="320" height="200"></input> -->
        <p class="category">Aquariam services</p>
        <p class="offers"></p>
      </form>
    </div>
  </div>
  <!--------------------End of the categories------------------------>
  <hr>
  <section id="banner" class="section-m1" style="background-image: url('/carehub/img/banner/banfish.jpeg');">
    <h4>All Services </h4>
    <h2>Up to <span>25% off</span> - This Summer</h2>
    <button class="normal">Explore More</button>
  </section>
  <!--------------------End of the categories------------------------>
  <!-- Image Gallery -->
  <div class="image-gallery">
    <div class="image-gallery-text">
      <h2>How to take care of you pets!</h2>
      <p>
        <b>Proper Nutrition:</b> Provide your pet with a balanced and nutritious diet suitable for their species, age,
        and size. Ensure access to fresh water at all times.<br><br>
        <b>Regular Exercise:</b> Dogs, cats, and other active pets need regular exercise to stay healthy. Playtime,
        walks, and engaging activities help keep them physically and mentally stimulated.<br><br>
        <b>Grooming:</b> Regular grooming helps keep your pet's coat and skin healthy. Brushing, bathing, nail trimming,
        and dental care are all important aspects of grooming.<br><br>
        <b>Environment Enrichment:</b> Provide a safe and stimulating environment for your pet. Offer toys, scratching
        posts, climbing structures, and other enrichment activities to keep them entertained.<br><br>
        <!-- <b>Training and Socialization:</b> Training and socialization are important for pets to learn good behavior and
        to interact positively with people and other animals. -->
      </p>

      <button class="button">Explore More</button>
    </div>


    <div class="image-gallery-images">
      <img src="/carehub/img/banner/collag.jpeg" alt="Image 1" height=500px width=550px>
      <!-- <img src="/carehub/img/banner/plantbanner.png" alt="Image 2" height=300px width=150px>
      <img src="/carehub/img/banner/plantbanner.png" alt="Image 3" height=300px width=300px> -->
      <!-- Add more images as needed -->
    </div>
  </div>
  <!--------------------End of the categories------------------------>
  <!-- <hr>
  <section class="plantInfo">
    <img src="/carehub/img/banner/banfish.jpeg" alt="Your Image" height=250px width="100%">
    <div class="planttext">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio quas earum laudantium saepe dolore blanditiis
        sint doloremque quo architecto, pariatur error consectetur, quisquam nobis molestias tempore voluptas delectus
        possimus cupiditate.</p>

    </div>
    <button class="normal "><a href="/carehub/Plant_Info/Plantform.php">Explore More</a></button>
  </section> -->
  <!--------------------End of the categories------------------------>
  <hr>
  <section id="banner" class="section-m1" style="background-image: url('/carehub/img/banner/gardenbanner1.jpg');">
    <h2>Need Information about Plants?</h2>
    <h4>We <span>got</span> You</h4>
    <button class="normal "><a href="/carehub/Plant_Info/Plantform.php">Explore More</a></button>
  </section>
  <!--------------------End of the categories------------------------>
  <!-- <section class="content-section">

    <div class="text">
      <p>Your text goes here...</p>
      <button class="button">Button Text</button>
    </div>
    <img src="/carehub/img/blog/b2.jpg" alt="Your Image" class="image">
  </section> -->

  <!-- <section id="banner" class="section-m1" style="background-image: url('/carehub/img/banner/plantbanner.png');">
    <h4>All Services </h4>
    <h2>Up to <span>25% off</span> - This Summer</h2>
  <button class="normal "><a href="/carehub/Plant_Info/Plantform.php">Explore More</a></button>
  </section> -->
  <!--Footer-->
  <?php include 'footer.php'; ?>
  <script src="slider.js"></script>
</body>

</html>
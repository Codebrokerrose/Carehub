<!-- Get 4 Products from Database -->
<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM category where `title`LIKE "%aquarium%" OR `title`LIKE "%fish%"  ORDER BY date_added DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Create Home Template -->
<?=template_header('Home')?>
<head>
<script src="https://kit.fontawesome.com/cf90a6dd12.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="service_style.css">
</head>


<div id="productVideo">
        <div>
            <button style="margin-left:50px"><img
                    src="https://images.pond5.com/aquarium-icon-vector-isolated-contour-illustration-125891909_iconl.jpeg"
                    alt=""> For the best care of your Aquariam</button>
            <h1 style="margin-left:100px"> Aquariam & Fish Caring </h1>
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


<!-- <div class="featured">
    <h2>Gadgets</h2>
    <p>Essential gadgets for everyday use</p>
</div> -->
<div class="recentlyadded content-wrapper">
    <h2>Recently Added Services</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index2.php?page=product2&id=<?=$product['id']?>" class="product">
            <img src="uploads/<?=$product['img']?>" width="200" height="200" alt="<?=$product['title']?>">
            <span class="name"><?=$product['title']?></span>
            <span class="price">
                Rs : <?=$product['price']?>
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp">Rs : <?=$product['rrp']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<?=template_footer()?>

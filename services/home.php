<!-- Get 4 Products from Database -->
<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM category where `title`= "garden" OR `title`= "gardening" OR`title`= "plantcare" ORDER BY date_added DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Create Home Template -->
<?=template_header('Home')?>
<head>
<script src="https://kit.fontawesome.com/cf90a6dd12.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="service_style.css">
</head>


    <!-- head top navbar -->
 
    <div id="productVideo">
        <div >
            <button style="margin-left:50px"><img
                    src="planticon.png"
                    alt="" > For the Healthy and Greeny Environment</button>
            <h1 style="margin-left:100px ; margin-top:20px;" > Gardening </h1>
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

    </div>
 

<!-- <div class="featured">
    <h2>Gadgets</h2>
    <p>Essential gadgets for everyday use</p>
</div> -->
<div class="recentlyadded content-wrapper">
    <h2>Recently Added Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
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

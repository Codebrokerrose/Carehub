<!-- Get 4 Products from Database -->
<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM category where `title`LIKE "%pet%"  ORDER BY date_added DESC LIMIT 4');
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
                    src="https://cdn-icons-png.flaticon.com/512/3460/3460335.png"
                    alt=""> For the best care of your Pets</button>
            <h1 style="margin-left:100px"> Pet Caring </h1>
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

<!-- <div class="featured">
    <h2>Gadgets</h2>
    <p>Essential gadgets for everyday use</p>
</div> -->
<div class="recentlyadded content-wrapper">
    <h2>Recently Added Services</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index1.php?page=product1&id=<?=$product['id']?>" class="product">
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

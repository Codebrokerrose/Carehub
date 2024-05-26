<!-- Creating the Product Page -->
<!-- Get Product from Database with GET Request -->
<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM category WHERE  `title`LIKE "%pet%" and id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>

<!-- Create Product Template -->
<?=template_header('Product')?>
<style>
    .side-p{
        margin-left:50px;
        padding-right:100px;
    }
</style>
<div class="product content-wrapper">
    <img src="../../carehub-vendor/public_html/uploads/<?=$product['img']?>" width="500" height="500" alt="<?=$product['title']?>">
    <div class="side-p">
        <h1 class="name"><?=$product['title']?></h1>
        <span class="price">
            Rs : <?=$product['price']?>
            <?php if ($product['rrp'] > 0): ?>
            <span class="rrp">Rs : <?=$product['rrp']?></span>
            <?php endif; ?> 
        </span>
        <form action="index1.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description" style="text-transform:capitalize;">
            <?=$product['description']?>
        </div>
    </div>
</div>

<?=template_footer()?>
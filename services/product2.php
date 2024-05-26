<!-- Creating the Product Page -->
<!-- Get Product from Database with GET Request -->
<?php

// Check to make sure the id parameter is specified in the URL and is numeric
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM category WHERE (title LIKE "%Aquarium%" OR title LIKE "%fish%") AND id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exist (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified or is not numeric
    exit('Product does not exist!');
}
?>

<!-- Create Product Template -->
<?=template_header('Product')?>
<style>
    .side-p {
        margin-left: 50px;
        padding-right: 100px;
    }
</style>
<div class="product content-wrapper">
    <img src="../../carehub-vendor/public_html/uploads/<?=htmlspecialchars($product['img'], ENT_QUOTES)?>" width="500" height="500" alt="<?=htmlspecialchars($product['title'], ENT_QUOTES)?>">
    <div class="side-p">
        <h1 class="name"><?=htmlspecialchars($product['title'], ENT_QUOTES)?></h1>
        <span class="price">
            Rs: <?=htmlspecialchars($product['price'], ENT_QUOTES)?>
            <?php if ($product['rrp'] > 0): ?>
            <span class="rrp">Rs: <?=htmlspecialchars($product['rrp'], ENT_QUOTES)?></span>
            <?php endif; ?>
        </span>
        <form action="index2.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=htmlspecialchars($product['quantity'], ENT_QUOTES)?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=htmlspecialchars($product['id'], ENT_QUOTES)?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description" style="text-transform:capitalize;">
            <?=htmlspecialchars($product['description'], ENT_QUOTES)?>
        </div>
    </div>
</div>

<?=template_footer()?>

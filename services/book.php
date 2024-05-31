<?php

// // Check if the user has completed the checkout process
// if (!isset($_SESSION['checkout_complete'])) {
//     // If the checkout process has not been completed, redirect to the cart page
//     header('Location: index.php?page=cart');
//     exit;
// }

// Get the products that were removed from the cart
$products = isset($_SESSION['removed_products']) ? $_SESSION['removed_products'] : array();

// Handle product cancellation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel_product'])) {
    $product_to_cancel = $_POST['product_title'];

    // Filter out the cancelled product
    $_SESSION['removed_products'] = array_filter($_SESSION['removed_products'], function ($product) use ($product_to_cancel) {
        return $product['title'] !== $product_to_cancel;
    });

    // Redirect to avoid form resubmission
    header('Location: index.php?page=book');
    exit;
}

// Clear the session variables related to the cart
// unset($_SESSION['cart']);
// Keep $_SESSION['removed_products'] to persist the product details
// Keep $_SESSION['checkout_complete'] to track checkout completion
?>

<?= template_header('Booking Details') ?>

<style>
    /* Styles for the booking details page */

    .booking-details {
        padding-top: 20px;
        margin: 0;
        margin-left: 50px;
        width: auto;
    }

    h1 {
        margin-bottom: 20px;
        font-size: 24px;
        text-align: center;
    }

    .table-container {
        overflow-x: auto;
    }

    .booking-table {
        width: 100%;
        border-collapse: collapse;
    }

    .booking-table th,
    .booking-table td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    .booking-table th {
        background-color: #f2f2f2;
    }

    .booking-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .booking-table tbody tr:hover {
        background-color: #ddd;
    }

    .table {
        margin: 20px auto;
        width: 90%;
        border-spacing: 0;
        text-align: center;
        border-radius: 12px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 10px;
        background-color: #1A48F1;
    }

    .table th {
        font-weight: 500;
        font-size: 20px;
        color: #FDC830;
        line-height: 26px;
        padding: 18px 30px;
    }

    .table thead {
        border-radius: 12px;
    }

    .table thead tr {
        background: #020644;

    }

    .table td {
        padding: 30px 10px;
        font-weight: 500;
        font-size: 20px;
        color: black-2;
        line-height: 26px;
        text-transform: uppercase;
        color: #fff;
    }

    .table tbody tr:nth-child(odd) {
        background: #1A48F1;
    }

    .table tbody tr:nth-child(even) {
        background: #1A48F1;
    }

    .table__wrapper {
        padding-top: 40px;
    }
</style>

<div class="booking-details content-wrapper">
    <h1>Booking Details</h1>
    <table class="table">
        <thead>
            <tr>
                <td>Product</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total</td>
                <td>Date</td>
                <td>Stop</td>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($products)): ?>
                <tr>
                    <td colspan="6" style="text-align:center;">No products found</td>
                </tr>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['title'] ?></td>
                        <td>Rs : <?= $product['price'] ?></td>
                        <td><?= $product['quantity'] ?></td>
                        <td>Rs : <?= $product['total'] ?></td>
                        <td><?= $product['date'] ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="product_title" value="<?= $product['title'] ?>">
                                <input type="submit" name="cancel_product" value="Cancel" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <div>Services will be provided within 24 hours.</div>
</div>

<?= template_footer() ?>
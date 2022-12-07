<?php

$pageTitle = "Products - SLAV LIMITED.LTD";
$error_message = get_error();
$page = "products";

ob_start();

?>

<link rel="stylesheet" href="css/products.css">

<div class="container">

    <div class="row">
        <div class="col-12">
            <h1>Products</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2>Our products</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p>Here is a list of our products</p>
        </div>
    </div>
    <--! get the product_name product_image product_price product_stock from the database and show them -->
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $products = get_products();
                    foreach ($products as $product) {
                        echo '<tr>';
                        echo '<td>' . $product['product_name'] . '</td>';
                        echo '<td><img src="' . $product['product_image'] . '" alt="product image"></td>';
                        echo '<td>' . $product['product_price'] . '</td>';
                        echo '<td>' . $product['product_stock'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>


</div>

<?php $pageContent = ob_get_clean(); ?>


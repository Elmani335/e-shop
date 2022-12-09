<?php
$pageTitle = "Products - SLAV LIMITED.LTD";

$page = "products";

$error_message = get_error();

ob_start();

?>

<link rel="stylesheet" href="css/products.css">

<div class="container">

    <div class="row">
        <h1>Products</h1>
    </div>
    <div class="row2">

        <?php
function get_products()
{
    global $db;
    $query = 'SELECT * FROM product';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}
$products = get_products();
foreach ($products as $product) :
    // show the products in a table
    echo $product['name_product'] . " - " . $product['price_product'] . "€" . " - " . $product['description_product'] . "<br>";

?>

        <?php $pageContent = ob_get_clean() ?>
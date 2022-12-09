<?php
$pageTitle = "Cart - SLAV LIMITED.LTD";

$page = "cart";

$error_message = get_error();

ob_start();

?>

    <link rel="stylesheet" href="css/cart.css">

    <div>
        <h1>Cart</h1>
    </div>

<?php

// show the products in the cart
function get_cart()
{
    global $db;
    $query = 'SELECT * FROM cart INNER JOIN product on cart.product_id = product.id_product';
    $statement = $db->prepare($query);
    $statement->execute();
    $cart = $statement->fetchAll();
    $statement->closeCursor();
    return $cart;
}
$cart = get_cart();

?>

<?php $pageContent = ob_get_clean() ?>

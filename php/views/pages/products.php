<?php
$pageTitle = "Products - SLAV LIMITED.LTD";

$page = "products";

$error_message = get_error();

ob_start();

?>
    <link rel="stylesheet" href="css/products.css">

    <div>
        <h1>Products</h1>
    </div>
<div class="container">

    <div class="row">
        <?php
function get_products()
{
    global $db;
    $query = 'SELECT * FROM product INNER JOIN join_categorie on product.categ_product = join_categorie.id_categorie';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}
$products = get_products();
foreach ($products as $product) {
    // show the products in a table
    echo "<div class='col-md-4'>";
    echo "<div class='card'>";
    echo "<div class='container'>";
    echo "<p><b>" . $product['name_product'] . "</b></p>";
    echo "<p>" . $product['description_product'] . "</p>";
    echo "<p>" . $product['price_product'] . "€</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    // add a button to add the product to the cart
    echo '<form action="index.php?page=cart" method="post">';
    echo '<input type="hidden" name="action" value="add">';
    echo '<input type="hidden" name="product_id" value="' . $product['id_product'] . '">';
    echo '<input type="submit" value="Add to Cart">';
    echo '</form>';

    // save the product id in a session variable
    $_SESSION['product_id'] = $product['id_product'];



}
?>

<?php $pageContent = ob_get_clean() ?>
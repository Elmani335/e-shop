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
    echo "<img src='images/" . $product['image_product'] . "' alt='Avatar' style='width:100%'>";
    echo "<div class='container'>";
    echo "<h4><b>" . $product['name_product'] . "</b></h4>";
    echo "<p>" . $product['description_product'] . "</p>";
    echo "<p>" . $product['price_product'] . "€</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    
}
?>

<?php $pageContent = ob_get_clean() ?>
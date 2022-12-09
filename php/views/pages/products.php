<?php
$pageTitle = "Products - SLAV LIMITED.LTD";

$page = "products";

$error_message = get_error();

ob_start();

?>

<link rel="stylesheet" href="css/products.css">

<div class="container">

    <div class="row">
        <div class="col-12">
            <h1>Products</h1>
        </div>
    </div>
    <div> <?php echo "\n" ?></div>
    <div class="row2">
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
                    function get_products() {
                        global $db;
                        $query = 'SELECT * FROM product';
                        $statement = $db->prepare($query);
                        $statement->execute();
                        $products = $statement->fetchAll();
                        $statement->closeCursor();
                        return $products;
                    }

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


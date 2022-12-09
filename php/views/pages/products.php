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
        foreach ($products as $product) : ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title
                        <?php if ($product['stock_product'] == 0) {
                        echo "out-of-stock";
                    } ?>">
                        <?= $product['name_product'] ?>
                    </h5>
                    <--! show all product in a table format -->

                    <p class="card-text">
                        <table>
                            <tr>
                                <td>Price</td>
                                <td><?= $product['price_product'] ?> €</td>
                            </tr>
                            <tr>
                                <td>Stock</td>
                                <td><?= $product['stock_product'] ?></td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td><?= $product['category_product'] ?></td>
                            </tr>
                            
                            <tr
                    <a href="index.php?page=product&id=<?= $product['id_product'] ?>" class="btn btn-primary">See more</a>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>



        <?php $pageContent = ob_get_clean(); ?>
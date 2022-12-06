<?php

require_once __DIR__ . '/../php/init.php';

// ROUTER
$page = "home";

if (isset($_GET['page'])) {
    if (in_array($_GET['page'], $router_pages)) {
        $page = $_GET['page'];
    }
    else {
        $page = '404';
    }
}

require __DIR__ . '/../php/views/pages/'.$page.'.php';
require __DIR__ . '/../php/views/partials/header.php';
echo $pageContent;
require __DIR__ . '/../php/views/partials/footer.php';

?>
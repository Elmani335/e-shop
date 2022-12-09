<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once __DIR__ . '/database.inc.php';

// CONFIG
$router_pages = ['home', 'contact', 'products', 'login', 'register', '404', 'cart' ];

// inclure les actions


// inclure les utilitaires
require_once __DIR__ . '/utils/errors.php';

// inclure toutes les classes

// definir la fonction get_products

// definir  la fonction get user connet

if (isset($_SESSION['user'])) {
    $IsUserConnected = true;
} else {
    $IsUserConnected = false;
}


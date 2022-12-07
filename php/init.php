<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once __DIR__ . '/database.inc.php';

// CONFIG
$router_pages = ['home', 'contact', 'products', 'login', 'inscription', '404'];

// inclure les actions
require_once __DIR__ . '/actions/user-interaction.php';

// inclure les utilitaires
require_once __DIR__ . '/utils/errors.php';

// inclure toutes les classes


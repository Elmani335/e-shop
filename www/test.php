<?php

include_once __DIR__ . '/../php/db.php';
$db = 0;
$database_dynamic = file_get_contents('/../php/eshop.sql');
$db->exec($database_dynamic);



$pageTitle = "SLAV E-SHOP";

// Commencer a ecrire dans la memoire tampon
ob_start();
?>

    <h1>E SHOP - SLAV LIMITED LTD</h1>

<?php
// TEST XSS - WHY htmlspecialchars()
// $testContent = "<h2>Test content</h2>";
// echo $testContent;
// echo htmlspecialchars($testContent);
?>

<?php
// On arrete d'ecrire dans la memoire tampon et on recupere le contenu precedent
$pageContent = ob_get_clean();

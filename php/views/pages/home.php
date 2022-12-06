<?php
$pageTitle = "Home - Mon site.com";

// Commencer a ecrire dans la memoire tampon
ob_start();
?>
<h1>HOME PAGE</h1>

<?php
// TEST XSS - WHY htmlspecialchars()
// $testContent = "<h2>Test content</h2>";
// echo $testContent;
// echo htmlspecialchars($testContent);
?>

<?php
// On arrete d'ecrire dans la memoire tampon et on recupere le contenu precedent
$pageContent = ob_get_clean();

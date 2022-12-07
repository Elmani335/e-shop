<?php
$database_dynamic = file_get_contents('../php/includes/eshop.sql');
$db = NEW PDO('mysql:host=82.64.34.8', 'eshop', 'Eshop.git');
$db->exec($database_dynamic);
// redirect after 3seconds to home page
header("Refresh:3; url=./index.php");
?>
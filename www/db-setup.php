<?php
$database_dynamic = file_get_contents('../php/sql/eshop.sql');
$db = NEW PDO('mysql:host=localhost', 'root', 'root');
$db->exec($database_dynamic);
// redirect after 2seconds to home page
header("Refresh:0.5; url=index.php");
?>
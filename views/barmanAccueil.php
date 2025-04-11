<h1>PAGE BARMAN</h1>
<?php



/*$response = file_get_contents("../api/get_tables.php");*/
$response = file_get_contents("http://localhost/Projet_S4/api/get_tables.php");

$data = json_decode($response, true);

var_dump($data);

exit;


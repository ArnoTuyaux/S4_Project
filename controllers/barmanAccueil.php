<!--controllers/barmanAccueil.php-->

<?php
include('views/layouts/nav.inc.php');

$response = file_get_contents("http://localhost/Projet_S4/api/get_tables.php");
$tables = json_decode($response, true);

include('views/barmanAccueil.php');


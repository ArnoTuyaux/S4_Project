<?php
$id = $_GET['id'] ?? null;

if ($id === null) {
    die("ID non fourni.");
}

$response = file_get_contents("http://localhost/Projet_S4/api/get_plat_by_id.php?id=$id");
$plat = json_decode($response, true);

if (!$plat) {
    die("Erreur de récupération du plat.");
}

include("../../views/administration/admin_ModifierCarte.php");

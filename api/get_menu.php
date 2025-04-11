<?php

require_once '../../class/Database.php';
require_once '../../class/plats.php';

$db = new Database();
$conn = $db->getConnection();

$query = "SELECT p.ID_PLAT, p.NOM_PLAT, p.PRIX, tp.TYPE_PLAT
          FROM PLAT p
          JOIN TYPE_PLATS tp ON p.ID_TYPE_PLATS = tp.ID_TYPE_PLATS
          WHERE p.SUR_LA_CARTE = TRUE AND tp.TYPE_PLAT = '$type_plat'";

$result = $db->requete($query);
$plats = $result->fetchAll(PDO::FETCH_ASSOC);
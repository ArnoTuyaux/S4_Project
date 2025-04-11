<?php
$type_plat = isset($_GET['type']) ? $_GET['type'] : 'Entree';
require_once("../../api/get_menu.php");


include("../../views/administration\admin_Carte.php");
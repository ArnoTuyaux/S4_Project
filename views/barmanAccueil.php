<h1>PAGE BARMAN</h1>

<?php

$response = file_get_contents("http://localhost/Projet_S4/api/get_tables.php");
$tables = json_decode($response, true);

if ($tables && is_array($tables)) {
    echo "<div>";
    foreach ($tables as $table) {
        $id = $table['ID_TABLES'];
        $statut = $table['statut_table'];

        switch ($statut) {
            case "Disponible":
                $color = "gray";
                break;
            case "Occupee":
                $color = "red";
                break;
            case "Reservee":
                $color = "green";
                break;
            case "A Nettoyer":
                $color = "orange";
                break;
            default:
                $color = "gray";
        }

        echo "<button style='padding:10px; margin: 10px; background-color:$color; color:white; border:none;'>Table $id</button>";
    }
    echo "</div>";
} else {
    echo "Erreur lors du chargement des tables.";
}

/*$response = file_get_contents("../api/get_tables.php");*/
/*$response = file_get_contents("http://localhost/Projet_S4/api/get_tables.php");
$data = json_decode($response, true);
var_dump($data);
exit;*/

?>


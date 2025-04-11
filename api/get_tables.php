<?php

/*ini_set('display_errors', 1);
error_reporting(E_ALL);

// Test rapide
echo json_encode(["test" => "ok"]);
exit;*/

require_once '../class/Database.php';
require_once '../class/Tables.php';

$db = new Database();
$conn = $db->getConnection();

$sql = "SELECT t.ID_TABLES, s.statut_table, t.id_secteur
        FROM tables t
        JOIN statut_Table s ON t.ID_STATUT_TABLE = s.ID_STATUT_TABLE";

$result = $db->requete($sql);

$tables = [];

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $table = new Tables($row['ID_TABLES'], $row['statut_table'], $row['id_secteur']);
    $tables[] = [
        'ID_TABLES' => $table->getID_Table(),
        'statut_table' => $table->getStatut_table()
    ];
}

echo json_encode($tables);

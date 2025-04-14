<?php

require_once 'Database.php';
require_once 'Statut_Table.php';

class Tables
{
    private $ID_Tables;
    private $statut_table;
    private $ID_Secteur;

    public function __construct($ID_Tables, $statut_table, $ID_Secteur)
    {
        $this->ID_Tables = $ID_Tables;
        $this->statut_table = new Statut_Table($statut_table);
        $this->ID_Secteur = $ID_Secteur;
    }

    public function getID_Table() { return $this->ID_Tables; }

    public function getStatut_table() { return $this->statut_table->getStatut_Table(); }

    public function toArray()
    {
        return [
            'ID_TABLES' => $this->getID_Table(),
            'statut_table' => $this->getStatut_table()
        ];
    }

    public static function getAllTables()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $sql = "SELECT t.ID_TABLES, s.statut_table, t.id_secteur
                FROM tables t
                JOIN statut_Table s ON t.ID_STATUT_TABLE = s.ID_STATUT_TABLE";
        $stmt = $db->requete($sql);

        $tables = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tables[] = new Tables($row['ID_TABLES'], $row['statut_table'], $row['id_secteur']);
        }

        return $tables;
    }
}
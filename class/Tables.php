<?php

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

    public function getID_Table()
    {
        return $this->ID_Tables;
    }

    public function getStatut_table()
    {
        return $this->statut_table->getStatut_Table();
    }

    public function setID_Tables($id)
    {
        $this->ID_Tables = $id;
    }

    public function setStatut_table($statut)
    {
        $this->statut_table = new Statut_Table($statut);
    }
}

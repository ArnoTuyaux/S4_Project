<?php
require_once 'Database.php';

class Reservation {
    public static function ajouterReservation($nom_client, $telephone, $date, $horaire, $nb_personnes, $id_table) {
        $db = new Database();
        $conn = $db->getConnection();

        $sql = "INSERT INTO reservation (nom_client, telephone, date_reservation, horaire, nombre_personne, id_tables)
                VALUES (:nom_client, :telephone, :date, :horaire, :nombre_personne, :id_tables)";
        $stmt = $conn->prepare($sql);

        return $stmt->execute([
            ':nom_client' => $nom_client,
            ':telephone' => $telephone,
            ':date' => $date,
            ':horaire' => $horaire,
            ':nombre_personne' => $nb_personnes,
            ':id_tables' => $id_table
        ]);
    }
}

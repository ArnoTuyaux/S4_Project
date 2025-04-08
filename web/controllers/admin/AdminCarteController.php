<?php

// Connexion à la base de données
$host = 'localhost';
$dbname = 's4';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

function afficherPlats() {
    global $pdo;

    // Récupérer les plats depuis la base de données où "SUR_LA_CARTE" est à TRUE
    $query = 'SELECT p.ID_PLAT, p.NOM_PLAT, p.PRIX, tp.TYPE_PLAT
              FROM PLAT p
              JOIN TYPE_PLATS tp ON p.ID_TYPE_PLATS = tp.ID_TYPE_PLATS
              WHERE p.SUR_LA_CARTE = TRUE';
    $stmt = $pdo->query($query);
    $plats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Inclure la vue pour afficher les plats
    include './views/admin/admin_carte.php';
}

// Appeler la fonction pour afficher les plats
afficherPlats();
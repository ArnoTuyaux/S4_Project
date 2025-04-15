<?php

require_once '../class/Plats.php';
header('Content-Type: application/json');

$data = $_POST;

if (empty($data)) {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
}

$id = $data['id'] ?? null;
$nom = $data['nom'] ?? null;
$prix = $data['prix'] ?? null;

if (!$id || !$nom || !$prix) {
    http_response_code(400);
    echo json_encode(['error' => 'Données manquantes']);
    exit;
}

try {
    $success = Plats::updatePlat($id, $nom, $prix);
    if ($success) {
        echo json_encode(['success' => true]);
    } else {
        throw new Exception("Échec de la mise à jour.");
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}

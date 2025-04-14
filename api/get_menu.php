<?php
require_once '../class/Plats.php';

header('Content-Type: application/json');

try {
    $type = $_GET['type'] ?? 'Entree';
    $plats = Plats::getAllPlats($type);

    $result = array_map(function($p) {
        return $p->toArray();
    }, $plats);

    echo json_encode($result);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
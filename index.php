<!-- index.php -->
<!DOCTYPE html>
<html lang="fr">
<body>
<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'Accueil';

switch ($page) {
    case 'Accueil':
        require_once('controllers/Accueil.php');
        break;
    case 'barmanAccueil':
        require_once('controllers/barmanAccueil.php');
        break;
    // Ajoute d'autres pages
    default:
        echo "<h1>Page non trouvée</h1>";
        break;
}
?>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Plats</title>
    <link rel="stylesheet" href="css/admin/style.css">
</head>
<body>
<nav class="navbar">
    <button class="back-btn">←</button>
    <div class="nav-buttons">
        <button>ENTRÉES</button>
        <button class="active">PLATS</button>
        <button>DESSERTS</button>
        <button>BOISSONS</button>
        <button>EMPLOYÉS</button>
    </div>
</nav>

<main class="container">
    <div class="dish-list">
        <?php foreach ($plats as $plat): ?>
            <div class="dish-item">
                <span><?= htmlspecialchars($plat['NOM_PLAT']) ?> (<?= htmlspecialchars($plat['TYPE_PLAT']) ?>) - <?= number_format($plat['PRIX'], 2, ',', ' ') ?> €</span>
                <button class="edit">Modifier</button>
                <button class="delete">Supprimer</button>
            </div>
        <?php endforeach; ?>
    </div>

    <button class="add-btn">Ajouter</button>
</main>
</body>
</html>
<body>
<nav class="navbar">
    <button class="back-btn">←</button>
    <div class="nav-buttons">
        <a href="?type=Entree"><button class="<?= (isset($_GET['type']) ? $_GET['type'] : 'Plats') === 'Entree' ? 'active' : '' ?>">ENTRÉES</button></a>
        <a href="?type=Plat"><button class="<?= (isset($_GET['type']) ? $_GET['type'] : 'Plats') === 'Plat' ? 'active' : '' ?>">PLATS</button></a>
        <a href="?type=Dessert"><button class="<?= (isset($_GET['type']) ? $_GET['type'] : 'Plats') === 'Dessert' ? 'active' : '' ?>">DESSERTS</button></a>
        <a href="?type=Boisson"><button class="<?= (isset($_GET['type']) ? $_GET['type'] : 'Plats') === 'Boisson' ? 'active' : '' ?>">BOISSONS</button></a>
        <a href="?type=Employe"><button class="<?= (isset($_GET['type']) ? $_GET['type'] : 'Plats') === 'Employe' ? 'active' : '' ?>">EMPLOYÉS</button></a>
    </div>
</nav>
<?php foreach ($plats as $plat): ?>
<div class="dish-item">
        <span>
    <?= htmlspecialchars($plat['NOM_PLAT']) ?>
    (<?= htmlspecialchars($plat['TYPE_PLAT']['TYPE_PLAT']) ?>)
    - <?= number_format($plat['PRIX'], 2, ',', ' ') ?> €
</span>
	<a href="../../controllers/administration/admin_ModifierCarte.php?id=<?= $plat['ID_PLAT'] ?>"><button class="edit">Modifier</button></a>
	<button class="delete">Supprimer</button>
</div>
<?php endforeach; ?>
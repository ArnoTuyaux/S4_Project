<!DOCTYPE html>
<html>
<head>
    <title>Modifier un plat</title>
</head>
<body>
<h1>Modifier le plat</h1>
<form action="../../api/update_plat.php" method="post">
	<input type="hidden" name="ID_PLAT" value="<?= htmlspecialchars($plat['ID_PLAT']) ?>">

	<label>Nom du plat</label>
	<input type="text" name="NOM_PLAT" value="<?= htmlspecialchars($plat['NOM_PLAT']) ?>">

	<label>Prix</label>
	<input type="number" step="0.01" name="PRIX" value="<?= htmlspecialchars($plat['PRIX']) ?>">

	<label>Type</label>
	<input type="text" name="TYPE_PLAT" value="<?= htmlspecialchars($plat['TYPE_PLAT']['TYPE_PLAT']) ?>">

	<button type="submit">Enregistrer</button>
</form>

</body>
</html>
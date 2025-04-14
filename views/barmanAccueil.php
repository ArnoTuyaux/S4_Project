<h1>PAGE BARMAN</h1>
<link rel="stylesheet" href="css/nav.css?v=1">

<?php

if ($tables && is_array($tables)) {
    echo "<div>";
    foreach ($tables as $table) {
        $id = $table['ID_TABLES'];
        $statut = $table['statut_table'];

        switch ($statut) {
            case "Disponible":
                $color = "gray";
                break;
            case "Occupee":
                $color = "red";
                break;
            case "Reservee":
                $color = "green";
                break;
            case "A Nettoyer":
                $color = "orange";
                break;
            default:
                $color = "gray";
        }

        echo "<button style='padding:10px; margin: 10px; background-color:$color; color:white; border:none;'>Table $id</button>";
    }
    echo "</div>";
} else {
    echo "Erreur lors du chargement des tables.";
}
?>

<!--<script>
    function openReservationModal() {
        // tu peux faire un `fetch()` ou juste afficher un <div> modal
        alert("Ici on ouvrira la modale de réservation !");
    }
</script>
-->
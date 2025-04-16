<link rel="stylesheet" href="css/nav.css?v=1">
<link rel="stylesheet" href="css/barmanAccueil.css">

<?php
if ($tables && is_array($tables)) {
    echo "<div class='zones-container'>";

    foreach ($zones as $zoneName => $ids) {
        echo "<div class='zone'><h2>$zoneName</h2>";
        foreach ($tables as $table) {
            $id = $table['ID_TABLES'];
            if (in_array($id, $ids)) {
                $statut = $table['statut_table'];

                echo "<button class='table-btn' data-statut='$statut' data-id='$id'>Table $id</button>";
            }
        }
        echo "</div>";
    }

    echo "</div>";
} else {
    echo "Erreur lors du chargement des tables.";
}
?>

<script>
    let commandesData = [];

    fetch('http://localhost/Projet_S4/api/get_commandes_actives.php')
        .then(reponse => reponse.json())
        .then(data => {
            commandesData = data;
        });

    // On sélectionne tous les boutons des tables
    let boutons = document.querySelectorAll('.table-btn');

    boutons.forEach(function(bouton) {
        let statut = bouton.dataset.statut;
        let idTable = bouton.dataset.id;

        if (statut === 'Occupee') {
            bouton.addEventListener('click', function() {
                // On filtre les commandes pour ne garder que celles de cette table
                let commandes = commandesData.filter(function(c) {
                    return c.ID_TABLES == idTable;
                });

                afficherModale(commandes, idTable);
            });
        }
    });

    function afficherModale(commandes, numeroTable) {
        let modal = document.getElementById('commandeModal');
        let details = document.getElementById('commandeDetails');
        let tableSpan = document.getElementById('tableNum');

        // affiche le numéro de la table
        tableSpan.textContent = numeroTable;
        details.innerHTML = "";

        if (commandes.length > 0) {
            // liste HTML des plats
            let html = "<ul>";
            commandes.forEach(function(cmd) {
                html += "<li>" + cmd.NOM_PLAT + " - " + cmd.PRIX + "€</li>";
            });
            html += "</ul>";

            details.innerHTML = html; // ajout dans la modale
        } else {
            details.textContent = "Aucune commande.";
        }
        modal.style.display = "flex";
    }

    let closeBtn = document.getElementById('closeModal');
    closeBtn.addEventListener('click', function() {
        document.getElementById('commandeModal').style.display = 'none';
    });
    window.addEventListener('click', function(event) {
        let modal = document.getElementById('commandeModal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

</script>



<?php 
$sqlSelect = "SELECT prenom_participant FROM participant JOIN utilisateur ON participant.num_participant = utilisateur.num_participant WHERE id_user = :id_user";
$stmtSelect = $pdo->prepare($sqlSelect);

$id_user = $_SESSION["id_user"];

$stmtSelect->bindParam(':id_user', $id_user);

$stmtSelect->execute();

$infoUser = $stmtSelect->fetch();

//Récup l'id user
$prenom = $infoUser['prenom_participant'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="css/accueil.css" rel="stylesheet">
    <link href="css/activite.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.2/angular.min.js"></script>
    <script src="js/accueil.js"></script>
    <script>
        function submitForm(link) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ?')) {
                link.closest('form').submit();
            }
            return false;
        }
    </script>
</head>
<body>
    <header>
        <div class="in-header">
            <span class="headBase-texte"><a>Association</a></span>
        </div>
        <span class="head-base-menu"></span>
        <div class="membre__menu">
            <div class="membre__etage-first">
                <img class="icone" src="img/utilisateur.svg">
                <p class="membre__infos-pseudo">Administrateur</p>
                <i class="material-icons membre__infos-expand">expand_more</i>
            </div>
            <div class="membre__etage-menu">
                <a href="" class="membre__link"><i class="material-icons membre__link-icons">account_circle</i> Mon Compte</a>
                <a href="deconnexion.php" class="membre__link"><i class="material-icons membre__link-icons">exit_to_app</i> Déconnexion</a>
            </div>
        </div>
    </header>
    <div class="content-wrapper">
        <div class="menu">
            <div class="menubutton">
                <div class="blok een"></div>
                <div class="blok twee"></div>
                <div class="blok drie"></div>
            </div>
            <ul class="">
                <li class="accueil"><div class="menutekstwrapper"><a class="menutekst" href="index.php">Accueil</a></div></li>
                <li class="activite"><div class="menutekstwrapper"><a class="menutekst" href="?page=activite">Activités</a></div></li>
                <li class="creneau"><div class="menutekstwrapper"><a class="menutekst" href="?page=creneau">Créneaux</a></div></li>
                <li class="utilisateur"><div class="menutekstwrapper"><a class="menutekst" href="?page=responsable">Responsables</a></div></li>
                <li class="utilisateur"><div class="menutekstwrapper"><a class="menutekst" href="?page=participant">Participants</a></div></li>
                <li class="utilisateur"><div class="menutekstwrapper"><a class="menutekst" href="?page=user">Utilisateurs</a></div></li>
            </ul>
        </div>
        <section class="table-section">
            <h1>Liste des créneaux</h1>
            <div class="center-table-wrapper">
                <table class="center-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>    
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Récupérer les données de la table activite
                        $sqlSelectCreneau = "SELECT * FROM creneau";
                        $stmtSelectCreneau = $pdo->prepare($sqlSelectCreneau);
                        $stmtSelectCreneau->execute();
                        $creneaux = $stmtSelectCreneau->fetchAll(PDO::FETCH_ASSOC);

                        // Afficher les données dans le tableau
                        foreach ($creneaux as $creneau) {
                            echo "<tr>";
                            echo "<td style='text-align: center;' >" . $creneau['id_creneau'] . "</td>";
                            echo "<td>" . $creneau['heure_debut'] . "</td>";
                            echo "<td>" . $creneau['heure_fin'] . "</td>";
                            echo '<td class="bouton">
                                <a href="form/modif/modifier_creneau.php?id_creneau=' . $creneau['id_creneau'] . '"><img src="img/bouton_modif.svg" alt="Modifier"></a>                            
                                <form method="post" action="">
                                    <input type="hidden" name="action" value="suppr_creneau">
                                    <input type="hidden" name="id_creneau" value=" '. $creneau["id_creneau"] . '">
                                    <a href="#" type="submit" onclick="submitForm(this)"><img src="img/bouton_suppr.svg" alt="Supprimer"></a>
                                </form>
                                </td>';
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"><a href="form/ajout/ajout_creneau.php"><img src="img/bouton_ajout.svg" alt="Ajouter"></a></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
    </div>
</body>
</html>
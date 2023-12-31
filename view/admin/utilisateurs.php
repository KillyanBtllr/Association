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
            <h1>Liste des utilisateurs</h1>
            <div class="center-table-wrapper">
                <table class="center-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Login</th>
                            <th>Mot de passe (à chiffrer)</th> 
                            <th>Role</th>
                            <th>Numéro participant</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Récupérer les données de la table activite
                        $sqlSelectUtilisateur = "SELECT * FROM utilisateur";
                        $stmtSelectUtilisateur = $pdo->prepare($sqlSelectUtilisateur);
                        $stmtSelectUtilisateur->execute();
                        $utilisateurs = $stmtSelectUtilisateur->fetchAll(PDO::FETCH_ASSOC);

                        // Afficher les données dans le tableau
                        foreach ($utilisateurs as $utilisateur) {
                            echo "<tr>";
                            echo "<td style='text-align: center;' >" . $utilisateur['id_user'] . "</td>";
                            echo "<td>" . $utilisateur['login'] . "</td>";
                            echo "<td>" . $utilisateur['mdp'] . "</td>";
                            echo "<td>" . $utilisateur['role'] . "</td>";
                            echo "<td>" . $utilisateur['num_participant'] . "</td>";
                            echo '<td class="bouton">
                                <a href="form/modif/modif_utilisateur.php?id_user=' . $utilisateur['id_user'] . '"><img src="img/bouton_modif.svg" alt="Modifier"></a>                            
                                <form method="post" action="">
                                    <input type="hidden" name="action" value="suppr_utilisateur">
                                    <input type="hidden" name="id_user" value=" '. $utilisateur["id_user"] . '">
                                    <a href="#" type="submit" onclick="submitForm(this)"><img src="img/bouton_suppr.svg" alt="Supprimer"></a>
                                </form>
                                </td>';
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6"><a href="form/ajout/ajout_utilisateur.php"><img src="img/bouton_ajout.svg" alt="Ajouter"></a></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
    </div>
</body>
</html>
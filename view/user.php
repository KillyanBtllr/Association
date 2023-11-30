<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="css/accueil.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.2/angular.min.js"></script>
</head>
<body>
    <header>
        <div class="in-header">
        <span class="headBase-logo"><img src="https://www.placehold.it/300x300" alt="" height="50px" width="50px" /></span>
        <span class="headBase-texte"><a href="/5bear/lab/index.php" class="lien-head">Association</a></span>
        </div>
        <span class="head-base-menu"></span>
        <div class="membre__menu">
        <div class="membre__etage-first">
            <p class="membre__infos-pseudo">Administrateur</p>
            <i class="material-icons membre__infos-expand">expand_more</i>
        </div>
        <div class="membre__etage-menu">
            <a href="" class="membre__link"><i class="material-icons membre__link-icons">account_circle</i> Mon Compte</a>
            <a href="deconnexion.php" class="membre__link"><i class="material-icons membre__link-icons">exit_to_app</i> Déconnexion</a>
        </div>
        </div>
    </header>
    
    <div class="frame">
        <h2>Gestion des activités :</h2>
        <a class="custom-btn btn-3" href="form/ajout/ajout_activite.php"><span>Créer une activité</span></a>
        <a class="custom-btn btn-3" href="form/modif/modif_activite.php"><span>Modifier une activité</span></a>
        <a class="custom-btn btn-3" href="form/suppr/suppr_activite.php"><span>Supprimer une activité</span></a>

        <h2>Gestion des créneaux :</h2>
        <a class="custom-btn btn-3" href="form/ajout/ajout_creneau.php"><span>Ajouter un créneau</span></a>
        <a class="custom-btn btn-3" href="form/affecter_creneau.php"><span>Affecter un créneau</span></a>
        <a class="custom-btn btn-3" href="form/modif/modifier_creneau.php"><span>Modifier un créneau</span></a>
        <a class="custom-btn btn-3" href="form/suppr/suppr_creneau.php"><span>Supprimer un créneau</span></a>

        <h2>Gestion des responsables :</h2>        
        <a class="custom-btn btn-3" href="form/ajout/ajout_resp.php"><span>Ajouter un responsable</span></a>
        <a class="custom-btn btn-3" href="form/modif/modif_resp.php"><span>Modifier un responsable</span></a>
        <a class="custom-btn btn-3" href="form/suppr/suppr_resp.php"><span>Supprimer un responsable</span></a>

        <h2>Gestion des participants :</h2>
        <a class="custom-btn btn-3" href="form/modif/modif_participant.php"><span>Modifier un participant</span></a>
        <a class="custom-btn btn-3" href="form/suppr/suppr_participant.php"><span>Supprimer un participant</span></a>

        <h2>Gestion des utilisateurs :</h2>
        <a class="custom-btn btn-3" href="form/modif/modif_utilisateur.php"><span>Modifier un utilisateur</span></a>
        <a class="custom-btn btn-3" href="form/suppr/suppr_utilisateur.php"><span>Supprimer un utilisateur</span></a>
        
    </div>
</body>
</html>
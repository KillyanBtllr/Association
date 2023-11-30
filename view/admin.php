<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="css/accueil.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.2/angular.min.js"></script>
    <script src="js/accueil.js"></script>
</head>
<body>
    <header>
        <div class="in-header">
            <span class="headBase-texte"><a href="/5bear/lab/index.php" class="lien-head">Association</a></span>
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
    <div class="menu">
	<div class="menubutton">
		<div class="blok een"></div>
		<div class="blok twee"></div>
		<div class="blok drie"></div>
	</div>
	<ul class="">
        <li class="accueil"><div class="menutekstwrapper"><a class="menutekst" href="" target="_blank" >Accueil</a></div></li>
		<li class="activite"><div class="menutekstwrapper"><a class="menutekst" href="" target="_blank" >Activités</a></div></li>
		<li class="creneau"><div class="menutekstwrapper"><a class="menutekst" href="" target="_blank" >Créneaux</a></div></li>
		<li class="utilisateur"><div class="menutekstwrapper"><a class="menutekst" href="" target="_blank" >Responsables</a></div></li>
		<li class="utilisateur"><div class="menutekstwrapper"><a class="menutekst" href="" target="_blank" >Participants</a></div></li>
        <li class="utilisateur"><div class="menutekstwrapper"><a class="menutekst" href="" target="_blank" >Utilisateurs</a></div></li>
	</ul>
</div>
</body>
</html>
<?php
include_once "../../connexion/connexion.php"
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - association</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <div class="login">
        <div class="login-triangle"></div>
        <h2 class="login-header">Modifier un participant</h2>
        <form class="login-container" action="../../api.php" method="POST">
            <input type="hidden" name="action" value="modif_participant">
            <p>Participant sélectionnée : <?php echo $_GET['num_participant']; ?><input type="hidden" name="num_participant" value="<?php echo $_GET['num_participant']; ?>"></p>
            <p><input type="text" name="nom_participant" placeholder="Nouveau nom"></p>
            <p><input type="text" name="prenom_participant" placeholder="Nouveau prénom"></p>
            <p><input type="text" name="mail_participant" placeholder="Nouveau mail"></p>
            <p><input type="submit" value="Envoyer"></p>
            </form>
    </div>
</body>
</html>
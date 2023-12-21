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
        <h2 class="login-header">Modifier Responsable</h2>
        <form class="login-container" action="../../api.php" method="POST">
            <input type="hidden" name="action" value="modif_resp">
            <p>Responsable sélectionnée : <?php echo $_GET['num_resp']; ?><input type="hidden" name="num_resp" value="<?php echo $_GET['num_resp']; ?>"></p>
            <p><input type="text" name="nom_resp" placeholder="Nouveau nom"></p>
            <p><input type="text" name="prenom_resp" placeholder="Nouveau prénom"></p>
            <p><input type="submit" value="Envoyer"></p>
        </form>
    </div>
</body>
</html>
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
        <h2 class="login-header">Ajouter Créneau</h2>
        <form class="login-container" action="../../api.php" method="POST">
            <input type="hidden" name="action" value="ajout_creneau">
            <p>Heure de début :<input type="datetime-local" name="hdebut"></p>
            <p>Heure de fin :<input type="datetime-local" name="hfin"></p>
            <p><input type="submit" value="Envoyer"></p>
        </form> 
    </div>
</body>
</html>
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
        <h2 class="login-header">Modifier un utilisateur</h2>
        <form class="login-container" action="../../api.php" method="POST">
            <input type="hidden" name="action" value="modif_utilisateur">
            <p>Utilisateur : 
                <select name="id_user">
                    <?php
                    $query = "SELECT id_user, login FROM utilisateur";
                    $stmt = $pdo->query($query);

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['id_user'] . '">' . $row['login'] . '</option>';
                    }
                    ?>
                </select>
            </p>
            <p><input type="text" name="nouveau_login" placeholder="Nouveau login"></p>
            <p><input type="text" name="nouveau_mdp" placeholder="Nouveau mot de passe"></p>
            <p>Nouveau role :
                <select name="nouveau_role">
                    <option value="participant">participant</option>
                    <option value="participant">responsable</option>
                    <option value="participant">admin</option>
                </select>
            </p>
            <p><input type="submit" value="Envoyer"></p>
            </form>
    </div>
</body>
</html>
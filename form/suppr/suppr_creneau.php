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
        <h2 class="login-header">Modifier un créneau</h2>
        <form class="login-container" action="../../api.php" method="POST">
            <input type="hidden" name="action" value="suppr_creneau">
            <p class="bold">Sélectionner un créneau à supprimer :<p>
            <select name="id_creneau">
                    <?php
                    $query = "SELECT id_creneau, heure_debut, heure_fin FROM creneau";
                    $stmt = $pdo->query($query);

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['id_creneau'] . '">Début : ' . $row['heure_debut'] . ' / Fin : ' . $row['heure_fin'] . '</option>';
                    }
                    ?>
                </select>
            </p>
            <p><input type="submit" value="Envoyer"></p>
        </form>
    </div>
</body>
</html>
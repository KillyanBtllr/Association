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
        <h2 class="login-header">Modifier une activité</h2>
        <form class="login-container" action="../../api.php" method="POST">
            <input type="hidden" name="action" value="modif_activite">
            <p>Activité sélectionnée : <?php echo $_GET['id_act']; ?><input type="hidden" name="id_activite" value="<?php echo $_GET['id_act']; ?>"></p>
            <p><input type="text" name="nouveau_nom_act" placeholder="Nouveau nom de l'activité"></p>
            <p><input type="text" name="nouvelle_description_act" placeholder="Nouvelle description"></p>
            <p>Nouveau responsable :
                <select name="nouveau_num_resp">
                    <?php
                    $query = "SELECT num_resp, nom_resp, prenom_resp FROM responsable";
                    $stmt = $pdo->query($query);

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['num_resp'] . '">' . $row['nom_resp'] . ' ' . $row['prenom_resp'] . '</option>';
                    }
                    ?>
                </select>
            </p>
            <p><input type="submit" value="Envoyer"></p>
            </form>
    </div>
</body>
</html>
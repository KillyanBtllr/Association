<!-- 
    IMPORTANT -> Renommez le fichier exemple_connexion.php par connexion.php
    Remplacez les valeurs des variables $dbhost, $dbbase, $dbuser et $dbpwd par les votres
-->


<?php

$dbhost = '';
$dbbase = '';
$dbuser = '';
$dbpwd = '';

try {
   
    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbbase",$dbuser,$dbpwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>

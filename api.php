<?php
session_start();
require_once 'connexion/connexion.php';
if (isset($_SESSION["role"])) { 
    switch ($_SESSION["role"]) {

        //liste des re requêtes de l'interface admin
        case "admin": {
            if(!empty($_POST["action"])){
                $action = $_POST["action"];
            
                switch($action){
                    case "afficher_activite":
                
                        try {
                            
                            $sql = "SELECT * FROM activite";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                            foreach ($rows as $row) {
                                print_r($row);
                            }
                        }
                        
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
                
                    case "ajout_resp":
                
                        try {
                            $sqlInsert = "INSERT INTO responsable (nom_resp, prenom_resp) VALUES (:nom, :prenom)";
                            $stmtInsert = $pdo->prepare($sqlInsert);
                
                            $nom = $_POST["nom"];
                            $prenom = $_POST["prenom"];
                
                            $stmtInsert->bindParam(':nom', $nom);
                            $stmtInsert->bindParam(':prenom', $prenom);
                
                            $stmtInsert->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
            
                    case "ajout_creneau":
                
                        try {
                            $sqlInsert = "INSERT INTO creneau (heure_debut, heure_fin) VALUES (:hdebut, :hfin)";
                            $stmtInsert = $pdo->prepare($sqlInsert);
                
                            $hdebut = $_POST["hdebut"];
                            $hfin = $_POST["hfin"];
                
                            $stmtInsert->bindParam(':hdebut', $hdebut);
                            $stmtInsert->bindParam(':hfin', $hfin);
                
                            $stmtInsert->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
            
                    case "ajout_activite":
            
                        try {
                            $sqlInsert = "INSERT INTO activite (nom_act, description, num_resp) VALUES (:nom_act, :desc_act, :num_resp)";
                            $stmtInsert = $pdo->prepare($sqlInsert);
                
                            $nom_act = $_POST["nom_act"];
                            $desc_act = $_POST["desc_act"]; 
                            $num_resp = $_POST["num_resp"];
                
                            $stmtInsert->bindParam(':nom_act', $nom_act);
                            $stmtInsert->bindParam(':desc_act', $desc_act);
                            $stmtInsert->bindParam(':num_resp', $num_resp);
                
                            $stmtInsert->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
                        
                    case "affecter_creneau":
                        try {
                            $id_act = $_POST["id_act"];
                            $id_creneau = $_POST["id_creneau"];
                    
                            // Vérifier si la ligne existe déjà
                            $sqlSelect = "SELECT id_act, id_creneau FROM avoir WHERE id_act = :id_act AND id_creneau = :id_creneau";
                            $stmtSelect = $pdo->prepare($sqlSelect);
                            $stmtSelect->bindParam(':id_act', $id_act);
                            $stmtSelect->bindParam(':id_creneau', $id_creneau);
                            $stmtSelect->execute();
                    
                            if ($stmtSelect->rowCount() > 0) {
                                echo "La ligne existe déjà.";
                            } 
            
                            else {
                                // La ligne n'existe pas, vous pouvez effectuer l'insertion
                                $sqlInsert = "INSERT INTO avoir (id_act, id_creneau) VALUES (:id_act, :id_creneau)";
                                $stmtInsert = $pdo->prepare($sqlInsert);
                                $stmtInsert->bindParam(':id_act', $id_act);
                                $stmtInsert->bindParam(':id_creneau', $id_creneau);
                                $stmtInsert->execute();
                    
                                header("Location: index.php");
                            }
            
                        } 
                        
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
            
                        break;
            
                    case "modif_activite":
            
                        try {
                            $sqlInsert = "UPDATE activite SET nom_act = :nouveau_nom_act, description = :nouvelle_description_act, num_resp = :nouveau_num_resp WHERE id_act = :id_activite";
                            $stmtInsert = $pdo->prepare($sqlInsert);
                            
                            $id_activite = $_POST["id_activite"];
                            $nouveau_nom_act = $_POST["nouveau_nom_act"];
                            $nouvelle_description_act = $_POST["nouvelle_description_act"];
                            $nouveau_num_resp = $_POST["nouveau_num_resp"];
                
                            $stmtInsert->bindParam(':id_activite', $id_activite);
                            $stmtInsert->bindParam(':nouveau_nom_act', $nouveau_nom_act);
                            $stmtInsert->bindParam(':nouvelle_description_act', $nouvelle_description_act);
                            $stmtInsert->bindParam(':nouveau_num_resp', $nouveau_num_resp);
                
                            $stmtInsert->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
            
                    case "modif_resp":
            
                        try {
                            $sqlInsert = "UPDATE responsable SET nom_resp = :nouveau_nom_resp, prenom_resp = :nouveau_prenom_resp WHERE num_resp = :num_resp";
                            $stmtInsert = $pdo->prepare($sqlInsert);
                            
                            $nouveau_nom_resp = $_POST["nom_resp"];
                            $nouveau_prenom_resp = $_POST["prenom_resp"];
                
                            $stmtInsert->bindParam(':nouveau_nom_resp', $nouveau_nom_resp);
                            $stmtInsert->bindParam(':nouveau_prenom_resp', $nouveau_prenom_resp);
                
                            $stmtInsert->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
                
                    case "modif_utilisateur":
        
                        try {
                            $sqlInsert = "UPDATE utilisateur SET login = :nouveau_login, mdp = :nouveau_mdp, role = :nouveau_role WHERE id_user = :id_user";
                            $stmtInsert = $pdo->prepare($sqlInsert);
                            
                            $id_user = $_POST["id_user"];
                            $nouveau_login = $_POST["nouveau_login"];
                            $nouveau_mdp = $_POST["nouveau_mdp"];
                            $nouveau_role = $_POST["nouveau_role"];
                
                            $stmtInsert->bindParam(':id_user', $id_user);
                            $stmtInsert->bindParam(':nouveau_login', $nouveau_login);
                            $stmtInsert->bindParam(':nouveau_mdp', $nouveau_mdp);
                            $stmtInsert->bindParam(':nouveau_role', $nouveau_role);
                
                            $stmtInsert->execute();
                
                            header("Location: index.php");
                        }
                    
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;

                    case "suppr_activite":
            
                        try {
                            $sqlDelete  = "DELETE FROM activite WHERE id_act = :id_act";
                            $stmtDelete = $pdo->prepare($sqlDelete);
                
                            $id_activite_supprimer = $_POST["id_act"];
                
                            $stmtDelete->bindParam(':id_act', $id_activite_supprimer);
                            
                            $stmtDelete->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
            
                    case "suppr_creneau":
            
                        try {
                            $sqlDelete  = "DELETE FROM creneau WHERE id_creneau = :id_creneau";
                            $stmtDelete = $pdo->prepare($sqlDelete);
                
                            $id_creneau = $_POST["id_creneau"];
                
                            $stmtDelete->bindParam(':id_creneau', $id_creneau);
                            
                            $stmtDelete->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
                
                    case "suppr_resp":
            
                        try {
                            $sqlDelete  = "DELETE FROM responsable WHERE num_resp = :num_resp";
                            $stmtDelete = $pdo->prepare($sqlDelete);
                
                            $num_resp = $_POST["num_resp"];
                
                            $stmtDelete->bindParam(':num_resp', $num_resp);
                            
                            $stmtDelete->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;

                    case "suppr_utilisateur":
        
                        try {
                            $sqlDelete  = "DELETE FROM utilisateur WHERE id_user = :id_user";
                            $stmtDelete = $pdo->prepare($sqlDelete);
                
                            $id_user = $_POST["id_user"];
                
                            $stmtDelete->bindParam(':id_user', $id_user);
                            
                            $stmtDelete->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
            
            
                    default:
                        echo "Pas d'action";
                        break;
                }
            }
            //variable "page" permet de gérer les include
            if (isset($_GET["page"])) {
                switch ($_GET["page"]) {
                    case "activite": {
                        include "view/admin/activite.php";
                        break;
                    }

                    case "table": {
                        include "view/admin/produit/table.php";
                        break;
                    }

                    case "plat": {
                        include "view/admin/produit/plat.php";
                        break;
                    }

                    case "boisson": {
                        include "view/admin/produit/boisson.php";
                        break;
                    }
                }
            }
            else {
                include "view/admin.php";
            }
            break;
        }

        case "utilisateur": {
            if(!empty($_POST["action"])){
                $action = $_POST["action"];
            
                switch($action){
                    case "afficher_activite":
                
                        try {
                            
                            $sql = "SELECT * FROM activite";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                            foreach ($rows as $row) {
                                print_r($row);
                            }
                        }
                        
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
                
                    case "ajout_resp":
                
                        try {
                            $sqlInsert = "INSERT INTO responsable (nom_resp, prenom_resp) VALUES (:nom, :prenom)";
                            $stmtInsert = $pdo->prepare($sqlInsert);
                
                            $nom = $_POST["nom"];
                            $prenom = $_POST["prenom"];
                
                            $stmtInsert->bindParam(':nom', $nom);
                            $stmtInsert->bindParam(':prenom', $prenom);
                
                            $stmtInsert->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
            
                    case "ajout_creneau":
                
                        try {
                            $sqlInsert = "INSERT INTO creneau (heure_debut, heure_fin) VALUES (:hdebut, :hfin)";
                            $stmtInsert = $pdo->prepare($sqlInsert);
                
                            $hdebut = $_POST["hdebut"];
                            $hfin = $_POST["hfin"];
                
                            $stmtInsert->bindParam(':hdebut', $hdebut);
                            $stmtInsert->bindParam(':hfin', $hfin);
                
                            $stmtInsert->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
            
                    case "ajout_activite":
            
                        try {
                            $sqlInsert = "INSERT INTO activite (nom_act, description, num_resp) VALUES (:nom_act, :desc_act, :num_resp)";
                            $stmtInsert = $pdo->prepare($sqlInsert);
                
                            $nom_act = $_POST["nom_act"];
                            $desc_act = $_POST["desc_act"]; 
                            $num_resp = $_POST["num_resp"];
                
                            $stmtInsert->bindParam(':nom_act', $nom_act);
                            $stmtInsert->bindParam(':desc_act', $desc_act);
                            $stmtInsert->bindParam(':num_resp', $num_resp);
                
                            $stmtInsert->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
                        
                    case "affecter_creneau":
                        try {
                            $id_act = $_POST["id_act"];
                            $id_creneau = $_POST["id_creneau"];
                    
                            // Vérifier si la ligne existe déjà
                            $sqlSelect = "SELECT id_act, id_creneau FROM avoir WHERE id_act = :id_act AND id_creneau = :id_creneau";
                            $stmtSelect = $pdo->prepare($sqlSelect);
                            $stmtSelect->bindParam(':id_act', $id_act);
                            $stmtSelect->bindParam(':id_creneau', $id_creneau);
                            $stmtSelect->execute();
                    
                            if ($stmtSelect->rowCount() > 0) {
                                echo "La ligne existe déjà.";
                            } 
            
                            else {
                                // La ligne n'existe pas, vous pouvez effectuer l'insertion
                                $sqlInsert = "INSERT INTO avoir (id_act, id_creneau) VALUES (:id_act, :id_creneau)";
                                $stmtInsert = $pdo->prepare($sqlInsert);
                                $stmtInsert->bindParam(':id_act', $id_act);
                                $stmtInsert->bindParam(':id_creneau', $id_creneau);
                                $stmtInsert->execute();
                    
                                header("Location: index.php");
                            }
            
                        } 
                        
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
            
                        break;
            
                    case "modif_activite":
            
                        try {
                            $sqlInsert = "UPDATE activite SET nom_act = :nouveau_nom_act, description = :nouvelle_description_act, num_resp = :nouveau_num_resp WHERE id_act = :id_activite";
                            $stmtInsert = $pdo->prepare($sqlInsert);
                            
                            $id_activite = $_POST["id_activite"];
                            $nouveau_nom_act = $_POST["nouveau_nom_act"];
                            $nouvelle_description_act = $_POST["nouvelle_description_act"];
                            $nouveau_num_resp = $_POST["nouveau_num_resp"];
                
                            $stmtInsert->bindParam(':id_activite', $id_activite);
                            $stmtInsert->bindParam(':nouveau_nom_act', $nouveau_nom_act);
                            $stmtInsert->bindParam(':nouvelle_description_act', $nouvelle_description_act);
                            $stmtInsert->bindParam(':nouveau_num_resp', $nouveau_num_resp);
                
                            $stmtInsert->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
            
                    case "modif_resp":
            
                        try {
                            $sqlInsert = "UPDATE responsable SET nom_resp = :nouveau_nom_resp, prenom_resp = :nouveau_prenom_resp WHERE num_resp = :num_resp";
                            $stmtInsert = $pdo->prepare($sqlInsert);
                            
                            $nouveau_nom_resp = $_POST["nom_resp"];
                            $nouveau_prenom_resp = $_POST["prenom_resp"];
                
                            $stmtInsert->bindParam(':nouveau_nom_resp', $nouveau_nom_resp);
                            $stmtInsert->bindParam(':nouveau_prenom_resp', $nouveau_prenom_resp);
                
                            $stmtInsert->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
                
                    case "modif_utilisateur":
        
                        try {
                            $sqlInsert = "UPDATE utilisateur SET login = :nouveau_login, mdp = :nouveau_mdp, role = :nouveau_role WHERE id_user = :id_user";
                            $stmtInsert = $pdo->prepare($sqlInsert);
                            
                            $id_user = $_POST["id_user"];
                            $nouveau_login = $_POST["nouveau_login"];
                            $nouveau_mdp = $_POST["nouveau_mdp"];
                            $nouveau_role = $_POST["nouveau_role"];
                
                            $stmtInsert->bindParam(':id_user', $id_user);
                            $stmtInsert->bindParam(':nouveau_login', $nouveau_login);
                            $stmtInsert->bindParam(':nouveau_mdp', $nouveau_mdp);
                            $stmtInsert->bindParam(':nouveau_role', $nouveau_role);
                
                            $stmtInsert->execute();
                
                            header("Location: index.php");
                        }
                    
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;

                    case "suppr_activite":
            
                        try {
                            $sqlDelete  = "DELETE FROM activite WHERE id_act = :id_act";
                            $stmtDelete = $pdo->prepare($sqlDelete);
                
                            $id_activite_supprimer = $_POST["id_act"];
                
                            $stmtDelete->bindParam(':id_act', $id_activite_supprimer);
                            
                            $stmtDelete->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
            
                    case "suppr_creneau":
            
                        try {
                            $sqlDelete  = "DELETE FROM creneau WHERE id_creneau = :id_creneau";
                            $stmtDelete = $pdo->prepare($sqlDelete);
                
                            $id_creneau = $_POST["id_creneau"];
                
                            $stmtDelete->bindParam(':id_creneau', $id_creneau);
                            
                            $stmtDelete->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
                
                    case "suppr_resp":
            
                        try {
                            $sqlDelete  = "DELETE FROM responsable WHERE num_resp = :num_resp";
                            $stmtDelete = $pdo->prepare($sqlDelete);
                
                            $num_resp = $_POST["num_resp"];
                
                            $stmtDelete->bindParam(':num_resp', $num_resp);
                            
                            $stmtDelete->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;

                    case "suppr_utilisateur":
        
                        try {
                            $sqlDelete  = "DELETE FROM utilisateur WHERE id_user = :id_user";
                            $stmtDelete = $pdo->prepare($sqlDelete);
                
                            $id_user = $_POST["id_user"];
                
                            $stmtDelete->bindParam(':id_user', $id_user);
                            
                            $stmtDelete->execute();
                
                            header("Location: index.php");
                        }
                
                        catch (PDOException $e) {
                            echo "Erreur lors de la requête SQL : " . $e->getMessage();
                        }
                        break;
            
                    default:
                        echo "Pas d'action";
                        break;
                }
            }
            else {
                include "view/user.php";
            }
            break;
        }

        default: 
            echo "erreur d'action: " . $_POST["action"];
        break;
        
    }
}


else {
    
    if (isset($_POST["login"]) && isset($_POST["mdp"])) {
        //on viens de la page de login
        //on interroge la base et on renseigne les infos utiles au profile

        $statmt = $pdo->prepare("SELECT * FROM utilisateur where login=:log");
        $statmt->bindParam(":log", $_POST["login"], PDO::PARAM_STR);
        $statmt->execute();
        if ($statmt->rowCount()!=0){
            $rep = $statmt->fetchAll(PDO::FETCH_ASSOC);
            if ($_POST["mdp"] == $rep[0]['mdp']) {
                $_SESSION["role"] = $rep[0]["role"];
                $_SESSION["id_user"] = $rep[0]["id_user"];
                $_SESSION["login"] = $rep[0]["login"];
                header("Location: index.php");
            }
            else{
                header("Location: login.php");
            } 
        }
        else {
            header("Location: login.php");
        }

    } 
    else {
        
        if (isset($_POST["login"]) && isset($_POST["mdp"])) {
            //on viens de la page de login
            //on interroge la base et on renseigne les infos utiles au profile
    
            $statmt = $pdo->prepare("SELECT * FROM utilisateur where login=:log");
            $statmt->bindParam(":log", $_POST["login"], PDO::PARAM_STR);
            $statmt->execute();
            if ($statmt->rowCount()!=0){
                $rep = $statmt->fetchAll(PDO::FETCH_ASSOC);
                if ($_POST["mdp"] == $rep[0]['mdp']) {
                    $_SESSION["role"] = $rep[0]["role"];
                    $_SESSION["id_user"] = $rep[0]["id_user"];
                    $_SESSION["login"] = $rep[0]["login"];
                    header("Location: index.php");
                }
                else{
                    header("Location: login.php");
                } 
            }
            else {
                header("Location: login.php");
            }
    
        } else {
            //login fail et on ne viens pas de la page de login
            //on kick
            header("Location: login.php");
        }
    }
}



?>


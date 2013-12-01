<?php
#==================================================================================================================

# condition de connexion

#==================================================================================================================
if (isset($_POST['submit_co'])){
  require_once('../config/connex.inc.php');
  connex('1mydb','../config/myparam');
  //echo '<meta charset="utf8">';
  

  $mail = $_POST['Email']; #&& trim($_POST['Email']) != '')? Verif_magicquotes($_POST['Email']) : null;
  $pass = $_POST['mot_de_passe']; #&& trim($_POST['mot_de_passe']) != '')? Verif_magicquotes($_POST['mot_de_passe']) : null;
  $nom = $_POST['Email'];

  $email= mysql_real_escape_string($_POST['Email']);
  $pass= mysql_real_escape_string($_POST['mot_de_passe']);

  if(isset($pass,$email)){
        // Préparation des données pour les requêtes à l'aide de la fonction mysql_real_escape_string
        $nom = mysql_real_escape_string($email);
        $password = mysql_real_escape_string($pass);
        /* Requête pour récupérer les enregistrements répondant à la clause : 
        champ du pseudo et champ du mdp de la table = pseudo et mdp postés dans le formulaire*/
        $requete = "SELECT * FROM utilisateur WHERE ( mail = '".$mail."' OR nom ='".$nom."') AND mot_de_pass = '".$password."'";  
        $req_exec = mysql_query($requete) or die(mysql_error());
        // Création du tableau associatif du résultat
        $resultat = mysql_fetch_assoc($req_exec);
        extract($resultat);
        // Les valeurs (si elles existent) sont retournées dans le tableau $resultat; 
        if (isset($resultat['mail'],$resultat['mot_de_pass'])){
                /* Démarre la session et enregistre le pseudo dans la variable de session $_SESSION['login']
                qui donne au visiteur la possibilité de visiter les pages protégées.  */
                session_start();
                $_SESSION['login'] = $login;
                $_SESSION['mail'] = $mail;
                $_SESSION['nom'] = $nom;
                $_SESSION['id'] = $id_utilisateur;
                
                if (isset($_SESSION['id'])) {
                  $sql = "INSERT INTO `connection` (`utilisateur_id_utilisateur`) VALUES ('".$id_utilisateur."');";
                  $send_sql = mysql_query($sql) or die(mysql_error());
                }
                header("location:../index.php");
                echo 'Bonjour '.htmlspecialchars($_SESSION['login']).'';
                
                }else{   // Le pseudo ou le mot de passe sont incorrect
                echo 'Le pseudo ou le mot de passe sont incorrect <br />';
                echo "<a href='../index.php'>recommencer</a>" ;
                }
    }else{  //au moins un des deux champs "pseudo" ou "mot de passe" n'a pas été rempli
    echo 'Les champs Pseudo et Mot de passe doivent être remplis.';
    }
   // 
}

?>
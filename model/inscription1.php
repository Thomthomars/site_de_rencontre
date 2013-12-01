<?php
  require_once('../config/connex.inc.php');
  connex('1mydb','../config/myparam');
if(isset($_POST['submit'])){
  $email= mysql_real_escape_string($_POST['mail']);
  $nom= mysql_real_escape_string($_POST['nom']);
  $res  = mysql_query("SELECT COUNT(*) AS nbr FROM utilisateur WHERE mail ='$email' AND nom='$nom'");
      $alors  = mysql_fetch_assoc($res);
  // UNE BOUCLE POUR INFORMER L'UTLISATEUR
  if(($alors['nbr'] == 0)){   
  $nom =mysql_real_escape_string($_POST['nom']);
  $login =mysql_real_escape_string($_POST['login']); 
  $mdp =mysql_real_escape_string($_POST['mdp']);
  //$req_inscri = 'INSERT into client(ID_CLIENT, COURRIEL, NOM_CLIENT, PRENOM_CLIENT, ADRESSE, TEL, MOT_DE_PASSE, ADRESSE_LIVRAISON, NOM_LIVRAISON, PRENOM_LIVRAISON) 
  //VALUES("", "'.$email.'", "'.$nom.'", "'.$prenom.'", "'.$adresse.'", "'.$tel.'", "'.$mdp.'", NULL, NULL, NULL)';

  $req_inscri = "INSERT INTO `utilisateur` (`id_utilisateur`, `taille`, `poid`, `age`, `localisation`, `cheveux_couleur`, `cheveux_coupe`, `mail`, `nom`, `photos_ref`, `nationnalite`, `profession`, `hobbies`, `attentes`, `couleur_yeux`, `origine`, `signe_distinct`, `Style_vestimentaire`, `style_de_vie`, `personalitees`, `tabac_addict`, `alcool-addict`, `je_vie`, `je_sors`, `activite_sport`, `musique`, `cinema`, `livre`, `magazine_journaux`, `mot_de_pass`, `login`,`mail_interne`) 
                           VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, '".$email."', '".$nom."', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '".$mdp."', '".$login."',NULL);";
                           
  $req1 = mysql_query($req_inscri)or die(mysql_error());
  #echo "Inscription réussite ! <br /> <a href='../index.php'>vous pouvez retourner a l'accueil</a>";
  header("location:../index.php");
    }else{
    echo"<p>Cet e-mail ou ce nom est déjà utilisé</p>";
    }
}
?>
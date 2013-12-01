<?php
switch (@$_GET['action'])
  {
      case 'maison' :
            if (!isset($_SESSION['id'])) {
              include 'vue/inscription.inc.php';formulaire();
            }else{
              include 'controller/voir_membre_co_con.inc.php';
              include 'vue/accueil.inc.php';
            }
          break;
      case 'inscription' :
            if (isset($_SESSION['id'])) {
              echo "inutile de vous réinscrire vous etes déjà connecté...";
            }else{
              include 'vue/inscription.inc.php';formulaire();
            }
          break;
      case 'profil':
            if (isset($_SESSION['id'])) {
              include 'controller/voir_profil_con.inc.php';
              include 'vue/voir_profil.inc.php';
            }else{
              echo "<center><h1>vous devez être connecté pour accéder au site !</h1></center>";
              include 'vue/inscription.inc.php';formulaire();
            }
          break;
      case 'conversation':
            if (isset($_SESSION['id'])) {
              include 'controller/voir_liste_conversation_con.inc.php';
              include 'vue/voir_liste_conversation.inc.php';
            }else{
              echo "<center><h1>vous devez être connecté pour accéder au site !</h1></center>";
              include 'vue/inscription.inc.php';formulaire();
            }
          break;
      case 'creat_conf':
            if (isset($_SESSION['id'])) {
              include 'controller/creat_conversation_con.inc.php';
              include 'controller/voir_liste_conversation_con.inc.php';
              include 'vue/voir_liste_conversation.inc.php';  
            }
            break;
      case 'update-go':
            if (isset($_SESSION['id'])) {
              include 'controller/modif_profil_con.inc.php';
              include 'controller/voir_profil_con.inc.php';
              include 'vue/voir_profil.inc.php';
            }else{
              echo "<center><h1>vous devez être connecté pour accéder au site !</h1></center>";
              include 'vue/inscription.inc.php';formulaire();
            }
          break;
      case 'voir':
            if (isset($_SESSION['id'])) {
            include 'controller/voir_conversation_con.inc.php';
            include 'controller/retour_voir_conversation_con.inc.php';
            include 'vue/voir_conversation.inc.php';
            }else{
              echo "<center><h1>vous devez être connecté pour accéder au site !</h1></center>";
              include 'vue/inscription.inc.php';formulaire();
            }
          break;
      case 'envoyer':
            if (isset($_SESSION['id'])) {
              include 'controller/envoyer_message_con.inc.php';
              include 'controller/retour_id_conf_con.inc.php';
              include 'controller/retour_voir_conversation_con.inc.php';
              include 'vue/voir_conversation.inc.php';
            }else{
              echo "<center><h1>vous devez être connecté pour accéder au site !</h1></center>";
              include 'vue/inscription.inc.php';formulaire();
            }
          break;
      case 'voir_profil_utilisateur':
            if (isset($_SESSION['id'])) {
              include 'controller/profil_utilisateur_con.inc.php';
              include 'controller/retour_profil_con.inc.php';
              include 'vue/voir_profil_utilisateur.inc.php';
            }else{
              echo "<center><h1>vous devez être connecté pour accéder au site !</h1></center>";
              include 'vue/inscription.inc.php';formulaire();
            }
            break;
      case 'back_office':
            if (isset($_SESSION['id'])) {
              include 'controller/retour_valeur_profil_con.inc.php';
              include 'vue/back_office.inc.php';formulaire();
            }else{
              echo "<center><h1>vous devez être connecté pour accéder au site !</h1></center>";
              include 'vue/inscription.inc.php';formulaire();
            }
          break;
      case 'recherche':
            if (isset($_SESSION['id'])) {
            include 'controller/voir_membre_con.inc.php';
            include 'vue/voir_membre.inc.php';
            }else{
            echo "<center><h1>vous devez être connecté pour accéder au site !</h1></center>";
            include 'vue/inscription.inc.php';formulaire();
            }
          break;
      // On remonte dans l'arborescence car le formulaire de modif n'est pas au niveau du controller frontal
      // Souligne  une petite maladresse d'architecture
      default:
            if (!isset($_SESSION['id'])) {
              include 'vue/inscription.inc.php';formulaire();
            }else{
              include 'controller/voir_membre_co_con.inc.php';
              include 'vue/accueil.inc.php';
            }
  }
?>
<?php
require_once('config/connex.inc.php');
connex('1mydb','config/myparam');
require_once('model/back_office.php');
extract($_POST);
modif_profil($taille,$poid,$age,$localisation,$cheveux_couleur,$cheveux_coupe,$nationnalite,$profession,$hobbies,$attentes,$couleur_yeux,$origine,$signe_distinct,$Style_vestimentaire,$style_de_vie,$personalitees,$tabac_addict,$alcool_addict,$je_vie,$je_sors,$activite_sport,$musique,$cinema,$livre,$magazine_journaux,$envoyer);
?>
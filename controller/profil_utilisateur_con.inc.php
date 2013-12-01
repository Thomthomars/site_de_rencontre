<?php
require_once('config/connex.inc.php');
connex('1mydb','config/myparam');
require_once('model/back_office.php');
extract($_GET);
print_r($_GET);
$id_profil = $_GET['id'];
voir_profil_utilisateur($_GET['id']);
?>
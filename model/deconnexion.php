<?php
session_start();
  require_once('../config/connex.inc.php');
  connex('1mydb','../config/myparam');
$req = "DELETE FROM connection WHERE connection.utilisateur_id_utilisateur = '".$_SESSION['id']."'";
$send_req = mysql_query($req) or die(mysql_error());
unset($_SESSION);
session_destroy();
header("location:../index.php");
?>
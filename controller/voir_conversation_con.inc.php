<?php 
require_once('config/connex.inc.php');
connex('1mydb','config/myparam');
require_once('model/back_office.php');
$id_convers = $_GET['id'];
voir_conversation($id_convers);
?>
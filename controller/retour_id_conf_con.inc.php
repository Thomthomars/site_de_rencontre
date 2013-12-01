<?php
require_once('config/connex.inc.php');
connex('1mydb','config/myparam');
require_once('model/back_office.php');
$id_convers = voir_conversation($id);
?>
<?php
require_once('config/connex.inc.php');
connex('1mydb','config/myparam');
require_once('model/back_office.php');
extract($_GET);
print_r($_GET);
$user1 = $_GET['id'];
$user = $_SESSION['id'];
creat_conversation($user,$user1);
?>
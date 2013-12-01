<?php
session_start();
if (!isset($_SESSION['id'])){
		include('vue/connexion.inc.php'); formulaire_connexion();
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lesbels</title>
	<link rel="stylesheet" type="text/css" href="ressource/css/index.css">
	<link rel="stylesheet" type="text/css" href="ressource/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="ressource/css/bootstrap-responsive.css">
	<script type="text/javascript" src="ressource/js/bootstrap.js" ></script>
	<script type="text/javascript" src"ressource/js/bootstrap.min.js"></script>
</head>
<body>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
	<a class="brand" href="?action=maison">  Home</a>
	<ul class="nav">
		<li class=""><a href="?action=inscription">Inscription</a></li>
		<li class=""><a href="?action=profil">Profil</a></li>
		<li class=""><a href="?action=recherche">recherche</a></li>
		<li class=""><a href="?action=conversation">conversation</a></li>
	</ul><p class="navbar-text pull-right"><?php if (isset($_SESSION['id'])){  echo 'Bonjour '.$_SESSION['login'].'. Bonne visite ! '; echo "<a href='model/deconnexion.php'> déconnection</a>"; } ?>  </p>
</div></div>

<p>abonnez vous</p>

<div id="container">
<?php
    include ('controller/aiguillage.inc.php');
?>
</div>
</body>
</html>
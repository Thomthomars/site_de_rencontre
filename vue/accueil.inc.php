<?php
echo "<pre>";
print_r($membre_connect);
echo "</pre>";
for ($m = 0; $m<count($membre_connect);$m++) {
	echo $membre_connect[$m]['login'];
	$id_profil = $membre_connect[$m]['id_utilisateur'];
echo " <a href='?action=voir_profil_utilisateur&id=$id_profil' >convers</a><br /> ";
}

?>


<p>Salut salut ceci n'est que la page d'accueil et la toute toute première éboche du site, autant dire que ce n'est même pas la version 1.0</p>


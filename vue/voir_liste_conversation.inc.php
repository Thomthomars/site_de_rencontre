<?php
print_r($_SESSION);
echo "<pre>";
print_r($liste_conversation);
echo "</pre><br />";

for ($m = 0; $m<count($liste_conversation);$m++) {
	echo $liste_conversation[$m]['convers'];
	echo " ";
	echo $liste_conversation[$m]['Date'];
	$id_convers = $liste_conversation[$m]['id_conversation'];
echo " <a href='?action=voir&id=$id_convers' >convers</a><br /> ";
}

?>
<div class="container">
<p>	AUREEEEEEEEEEEEEEEEEEEEEEEEEEEEEEVOIR</p>
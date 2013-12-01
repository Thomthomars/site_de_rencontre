<?php
echo "<pre>";
print_r($conf);
echo "hey les gens";
print_r($id_convers);
echo "</pre>";
echo "ahah";
echo "<br />";
print_r($_GET);
@$id = $_GET['id'];
echo "stop";
echo $id;
echo "attend<br />";
print_r($_POST);

?>

<form method="POST" type="form" action="?action=envoyer" >
	<textarea row="3" name="message" ></textarea><br />
	<input type="hidden" name="id" value=<?php echo $id; ?> />
	<input type="submit" name="envoyer" />
</form>
<p>SAAAAAAAAAAAAAAAAAAAAAAALUT</p>
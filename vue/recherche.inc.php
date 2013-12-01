<?php 
 $form= <<<FORMULAIRE
<form action="model/recherche.php" method="POST" class="form">
<input class="input-medium" name="login" id="login" value="" size="50" tabindex="1" type="text" placeholder="Identifiant"/> 
<input class="input-medium" name="localisation" value="" size="50" tabindex="1" type="text" placeholder="localisation"/>
</form>
FORMULAIRE;
echo $form;
?>
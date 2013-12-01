<?php
function formulaire_connexion(){
echo "pas encore connecter :";

  $form_connex= <<<FORMULAIRE
   <section class="conex">
<form action="model/traitement.php" method="POST" class="form-inline">
<p><br /><br />
      <input name="Email" id="email" value="" size="22" tabindex="1" type="text" placeholder="Email" required />
      <input name="mot_de_passe" id="mdp" value="" size="22" tabindex="1" type="password" placeholder="password" required/>
<label class="checkbox">
    <input type="checkbox"> Remember me
  </label>
<p><input name="submit_co" id="submit" tabindex="5" type="submit">
   </p>
</form>
</section>
FORMULAIRE;
  echo $form_connex;
}
?>
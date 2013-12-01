<?php
function formulaire(){
    $info='';
    if(isset($_GET['enreg'])) $info='<p class="postinfo">Formulaire pour '.$_GET['enreg'].' enregistré</p>';

    $form= <<<FORMULAIRE
  <header class="postheader">
  <h2>Formulaire d'inscription</h2>
  $info
  </header>
  <section class="entry">
  <form action="model/inscription1.php" method="POST" class="form">
      <label for="sexe">Vous etes :</label>
      <input type="radio" id="femme" name="sexe" value="F" required >Femme</input>
      <input type="radio" id="homme" name="sexe" value="H" required >Homme</input><br />
      <input class="input-medium" name="login" id="login" value="" size="50" tabindex="1" type="text" required  placeholder="votre identifiant"/>
      <input class="input-medium" name="nom" id="nom" value="" size="50" tabindex="1" type="text" required  placeholder="votre nom"/>
      <input class="input-medium" name="mail" id="email" value="" size="50" tabindex="1" type="email" required  placeholder="Adresse e-mail"/>
      <input class="input-medium" name="mdp" id="mdp" value="" size="50" tabindex="1" type="password"  placeholder="votre mot de passe" /><br />
      <input class="input-medium" name="mdp2" id="mdp2" value="" size="50" tabindex="1" type="password"  placeholder="votre mot de passe" />
      <input name="submit" id="submit" type="submit" />
   </p>
   <div class="clear"></div>
  </form>
  <div class="clear"></div>
  </section>
FORMULAIRE;
  echo $form;
}
?>
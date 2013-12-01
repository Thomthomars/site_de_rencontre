<?php
function formulaire(){
global $ouf;
    $age ="<select class='btn' name='age'>";
  $age.="<option value=''>select un age</option>";
  for($i=18; $i <100 ; $i++) {
        if ($ouf['age'] == $i) {
      $age.="<option selected >$i</option>";
    }else{
    $age.="<option>$i</option>";}
  }
  $age.="</select>";


  $taille ="<select class='btn' name='taille'>";
  /*if (!empty($ouf)) {
  $taille.= "<option value='$ouf' >$ouf</option>";
  }else{*/
  $taille.="<option value=''>select une taille</option>";
  for($j=100; $j <250 ; $j++) {
    if ($ouf['taille'] == $j) {
      $taille.="<option selected >$j</option>";
    }else{
    $taille.="<option>$j</option>";}
  }
  $taille.="</select>";



  $poid ="<select class='btn' name='poid'>";
  $poid.="<option value=''>select un poids</option>";
  for($k=30; $k < 90 ; $k++) { 
        if ($ouf['poid'] == $k) {
      $poid.="<option selected >$k</option>";
    }else{
    $poid.="<option>$k</option>";}
  }
  $poid.="</select>";

    $form= <<<FORMULAIRE
  <header class="postheader">
  <h2 id="titre">Profil</h2>
  </header>
  <section class="entry">
  <form action="?action=update-go" method="POST" class="form">
  <div class="btn-group">
      $age
      $taille
      $poid
  </div><br /><br />

      <input type="text" id="localisation" name="localisation" placeholder="localisation" value="$ouf[localisation]" />
      <input type="text" id="nationnalite" name="nationnalite" placeholder="nationnalite" value="$ouf[nationnalite]" />
      <input type="text" id="profession" name="profession" placeholder="profession" value="$ouf[profession]" />
      <input type="text" id="origine" name="origine" placeholder="votre origine" value="$ouf[origine]" /><br />
      <textarea row="3" id="hobbies" name="hobbies" placeholder="vos hobbies"  >$ouf[hobbies]</textarea>
      <textarea row="3" id="attentes" name="attentes" placeholder="vos attentes" >$ouf[attentes]</textarea>
<?php
=============================================================================================================================

=============================================================================================================================
?>
      <label for="cheveux_couleur">couleur de cheveux</label>
        <label class="radio inline">
          <input type="radio" id="cheveux_blond" name="cheveux_couleur" value="blond" if ($ouf[cheveux_couleur] == blond) { checked }>blond</input></label>
        <label class="radio inline">
          <input type="radio" id="cheveux_roux" name="cheveux_couleur" value="roux" if ($ouf[cheveux_couleur] == roux) { checked } >roux</input></label>
        <label class="radio inline">
          <input type="radio" id="cheveux_chatain" name="cheveux_couleur" value="chatain" if ($ouf[cheveux_couleur] == chatain) { checked } >chatain</input></label>
        <label class="radio inline">
          <input type="radio" id="cheveux_brun" name="cheveux_couleur" value="brun" if ($ouf[cheveux_couleur] == brun) { checked } >brun</input></label>
<?php 
=============================================================================================================================

=============================================================================================================================
?>
      <label for="cheveux_coupe">coupe de cheveux</label>
        <label class="radio inline">
          <input type="radio" id="cheveux_court" name="cheveux_coupe" value="court"  if ($ouf[cheveux_coupe] == court) { checked }   />court</label>
        <label class="radio inline">
          <input type="radio" id="cheveux_rasé" name="cheveux_coupe" value="rasé" if ($ouf[cheveux_coupe] == rasé) { checked }  />rasé</label>
        <label class="radio inline">
          <input type="radio" id="cheveux_long" name="cheveux_coupe" value="long"  if ($ouf[cheveux_coupe] == long) { checked }  />long</label>
        <label class="radio inline">
          <input type="radio" id="cheveux_mi-long" name="cheveux_coupe" value="mi-long" if ($ouf[cheveux_coupe] == mi-long) { checked } />mi-long</label>
<?php 
=============================================================================================================================

=============================================================================================================================
?>
    <label for="couleur_yeux">couleur des yeux</label>
      <label class="radio inline">
        <input type="radio" id="yeux_vert" name="couleur_yeux" value="vert" if ($ouf[couleur_yeux] == vert) { checked }>vert</label>
      <label class="radio inline">
        <input type="radio" id="yeux_bleu" name="couleur_yeux" value="bleu" if ($ouf[couleur_yeux] == bleu) { checked }>bleu</label>
      <label class="radio inline">
        <input type="radio" id="yeux_maron" name="couleur_yeux" value="maron" if ($ouf[couleur_yeux] == maron) { checked }>maron</label>
      <label class="radio inline">
        <input type="radio" id="yeux_gris" name="couleur_yeux" value="gris" if ($ouf[couleur_yeux] == gris) { checked }>gris</label>
<?php 
=============================================================================================================================

=============================================================================================================================
?>      
    <label for="signe_distinct">signe distinctif</label>
      <label class="radio inline">
        <input type="radio" id="signe_distinct" name="signe_distinct" value="tatouage" if ($ouf[signe_distinct] == tatouage) { checked }>tatouage</label>
      <label class="radio inline">
        <input type="radio" id="signe_distinct" name="signe_distinct" value="piercing" if ($ouf[signe_distinct] == piercing) { checked }>piercing</label>
      <label class="radio inline">
        <input type="radio" id="signe_distinct" name="signe_distinct" value="tache de rousseur" if ($ouf[signe_distinct] == tache de rousseur) { checked }>tache de rousseur</label>
       <label class="radio inline">
        <input type="radio" id="signe_distinct" name="signe_distinct" value="lunettes" if ($ouf[signe_distinct] == lunettes) { checked }>lunettes</label><br />
<?php 
=============================================================================================================================

=============================================================================================================================
?>
      <input type="text" id="Style_vestimentaire" name="Style_vestimentaire" value="$ouf[Style_vestimentaire]" />
      <input type="text" id="style_de_vie" name="style_de_vie" value="$ouf[style_de_vie]" />
      <input type="text" id="personalitees" name="personalitees" placeholder="votre personalitees" value="$ouf[personalitees]" />
      <input type="text" id="tabac_addict" name="tabac_addict" value="$ouf[tabac_addict]" /><br />
      <input type="text" id="alcool_addict" name="alcool_addict" value="$ouf[alcool_addict]" />
      <input type="text" id="je_vie" name="je_vie" placeholder="Ou vivez vous ?" value="$ouf[je_vie]" />
      <input type="text" id="je_sors" name="je_sors" placeholder="Vos spots de sorties" value="$ouf[je_sors]" />
      <input type="text" id="activite_sport" name="activite_sport" placeholder="vos sports" value="$ouf[activite_sport]" /><br />
      <textarea row="3" id="musique" name="musique" placeholder="musique" >$ouf[musique]</textarea>
      <textarea row="3" id="cinema" name="cinema" placeholder="cinema" >$ouf[cinema]</textarea>
      <textarea row="3" id="livre" name="livre" placeholder="livre" >$ouf[livre]</textarea>
      <textarea row="3" id="magazine_journaux" name="magazine_journaux" placeholder="vos magazine/journaux" >$ouf[magazine_journaux]</textarea><br />
      <input name="envoyer" id="submit" type="submit" />
   </p>
   <div class="clear"></div>
  </form>
  <div class="clear"></div>
  </section>
FORMULAIRE;
  echo $form;
}
?>
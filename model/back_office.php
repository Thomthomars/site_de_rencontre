<?php

function modif_profil($taille,$poid,$age,$localisation,$cheveux_couleur,$cheveux_coupe,$nationnalite,$profession,$hobbies,$attentes,$couleur_yeux,$origine,$signe_distinct,$Style_vestimentaire,$style_de_vie,$personalitees,$tabac_addict,$alcool_addict,$je_vie,$je_sors,$activite_sport,$musique,$cinema,$livre,$magazine_journaux,$envoyer){
	$id = $_SESSION['id'];
	#if(isset($_POST['envoyer']) $taille || $poid || $age || $localisation || $cheveux_couleur || $cheveux_coupe || $nationnalite || $profession || $hobbies || $attentes || $couleur_yeux || $origine || $signe_distinct || $Style_vestimentaire || $style_de_vie || $personalitees || $tabac_addict || $alcool_addict || $je_vie || $je_sors || $activite_sport || $musique0 || $musique1 || $musique2 || $cinema0 || $cinema1 || $cinema2 || $livre0 || $livre1 || $livre2 || $magazine_journaux0 || $magazine_journaux1 || $magazine_journaux2)){
	#		$taille == NULL; $poid == NULL; $age == NULL; $localisation == NULL; $cheveux_couleur == NULL; $cheveux_coupe == NULL; $nationnalite == NULL; $profession == NULL; $hobbies == NULL; $attentes == NULL; $couleur_yeux == NULL; $origine == NULL; $signe_distinct == NULL; $Style_vestimentaire ==NULL; $style_de_vie == NULL; $personalitees == NULL; $tabac_addict == NULL; $je_vie == NULL; $je_sors == NULL; $activite_sport == NULL; $musique0 == NULL; $musique1 == NULL; $musique2 == NULL; $cinema0 == NULL; $cinema1 ==NULL; $cinema2 == NULL;$livre0 == NULL;$livre1==NULL;$livre2==NULL;$magazine_journaux0==NULL;$magazine_journaux1==NULL;$magazine_journaux2==NULL;


	#$req_inscri = "INSERT INTO `utilisateur` (`id_utilisateur`, `taille`, `poid`, `age`, `localisation`, `cheveux_couleur`, `cheveux_coupe`, `mail`, `nom`, `photos_ref`, `nationnalite`, `profession`, `hobbies`, `attentes`, `couleur_yeux`, `origine`, `signe_distinct`, `Style_vestimentaire`, `style_de_vie`, `personalitees`, `tabac_addict`, `alcool-addict`, `je_vie`, `je_sors`, `activite_sport`, `musique`, `cinema`, `livre`, `magazine_journaux`, `mot_de_pass`, `login`,`mail_interne`) 
    #               VALUES ('$taille', '$poid', '$age', '$localisation', '$cheveux_couleur', $cheveux_coupe, NULL, '".$email."', '".$nom."', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '".$mdp."', '".$login."');";

   $bluff = "UPDATE `utilisateur` SET `taille`= $taille ,`poid`='$poid',`age`='$age',`localisation`='$localisation',
    `cheveux_couleur`='$cheveux_couleur',`cheveux_coupe`='$cheveux_coupe',`nationnalite`='$nationnalite',`profession`='$profession',
    `hobbies`='$hobbies',`attentes`='$attentes',`couleur_yeux`='$couleur_yeux',`origine`='$origine',`signe_distinct`='$signe_distinct',
    `Style_vestimentaire`='$Style_vestimentaire',`style_de_vie`='$style_de_vie',`personalitees`='$personalitees',
    `tabac_addict`='$tabac_addict',`alcool_addict`='$alcool_addict',`je_vie`='$je_vie',`je_sors`='$je_sors',
    `activite_sport`='$activite_sport',`musique`='$musique',`cinema`='$cinema',`livre`='$livre',`magazine_journaux`='$magazine_journaux'
     WHERE id_utilisateur = $id ";
   /*  if ($taille != '') {
     	$t ="`taille`= $taille";
     }
     $bluff = "UPDATE `utilisateur` SET ".$t." WHERE id_utilisateur = $id";*/
    mysql_query($bluff) or die(mysql_error()); 
	}

function retour_valeur_profil(){
	$id = $_SESSION['id'];
	$ouf = "SELECT * from utilisateur where utilisateur.id_utilisateur = $id";
	$result= mysql_query($ouf) or die(mysql_error());
	while ($tuples = mysql_fetch_assoc($result)) {
		$unt_tuple = $tuples;
	}
	
	return $unt_tuple;
	
}

function voir_mon_profil(){
	$id = $_SESSION['id'];
	$nom = mysql_query("SELECT * from utilisateur where utilisateur.id_utilisateur = $id");
	$tuples=false;
	if ($nom)
    {
       while ($row = mysql_fetch_assoc($nom)){
           $tuples[] = $row; }

        return $tuples;
    }else return false;
}

function voir_membre(){
	$id = $_SESSION['id'];
	$membre = mysql_query("SELECT id_utilisateur,login from utilisateur where utilisateur.id_utilisateur != $id");
	$les_membres = false;
	if ($membre) {
		while ($row = mysql_fetch_assoc($membre)) {
			$les_membres[] = $row; }

		return $les_membres;
	}else return false;
}



function envoyer_mail_interne(){

}

function creat_conversation($user,$user1){
	$user = $_SESSION['id']; $user1 = $_GET['id'];
	$nom_user = $_SESSION['login'];
	if ($user != $user1) {
		$conversa = "Bonjours, $nom_user voudrait dialoguer avec vous.";
		$req1 = "INSERT INTO `conversation`(id_conversation,convers,Date,id_message) VALUES ('','$conversa',NOW(),'1');";
		mysql_query($req1) or die(mysql_error());
		echo $user;
		echo "<br />après<br />";
		echo $user1;
		echo "après<br />";
		$id_convers = mysql_insert_id();
		$req = "INSERT INTO `utilisateur_has_conversation` (`id_utilisateur`, `id_conversation`, `id_utilisateur2`) VALUES ($user,'$id_convers','$user1');";
		#$req = "INSERT INTO `conversation`(id_conversation,convers,Date,id_message) VALUES ('','$conversa',NOW(),'1');";
		mysql_query($req) or die(mysql_error());
	}else{
		echo "<br />raté";
	}
}


function rep_conversation($message,$id,$envoyer){
	$Date_mess= date("Y-m-j H:i:s");
	echo $id;
	$sql = "INSERT INTO `Message` (`id_conversation`, `message`, `id_message`, `message_date`) VALUES ('$id', '$message', '', NOW());";
	mysql_query($sql) or die(mysql_error());
	#mysql_query("INSERT INTO `conversation` (`id_conversation`.conversation,`convers`,`Date`,id_message) VALUES (1,$conf,$Date_mess,''); ");
	return $id;
}



function voir_liste_conversation(){
	$id = $_SESSION['id'];
	$conversation = mysql_query("SELECT conversation.id_conversation, convers, Date, id_message FROM `conversation`
								INNER JOIN utilisateur_has_conversation 
								ON conversation.id_conversation = utilisateur_has_conversation.id_conversation
								WHERE utilisateur_has_conversation.id_utilisateur = $id or utilisateur_has_conversation.id_utilisateur2 = $id ");
								/*INNER JOIN utilisateur
								ON utilisateur_has_conversation.id_utilisateur = utilisateur.id_utilisateur where utilisateur.id_utilisateur = $id */
	$la_conversation = false;
	if ($conversation) {
		while ($row = mysql_fetch_assoc($conversation)){
			$la_conversation[] = $row; }  

		 return $la_conversation;
		}else return false;
}



function voir_conversation($id_convers){
	$id = $id_convers;
	$une_convers = mysql_query("SELECT message, message_date from Message
								INNER JOIN conversation 
								ON Message.id_conversation = conversation.id_conversation
								WHERE Message.id_conversation = '$id'") or die(mysql_error());
								/*INNER JOIN utilisateur_has_conversation 
								ON conversation.id_converstion = utilisateur_has_conversation.id_conversation
								WHERE 
								INNER JOIN utilisateur
								ON utilisateur_has_conversation.id_utilisateur = utilisateur.id_utilisateur");*/
	$la_convers = false;
	if ($une_convers) {
		while($row = mysql_fetch_assoc($une_convers)){
			$la_convers[] = $row; }
			return $la_convers;
	}else{ return false;
}
}
function membre_co(){
	$id = $_SESSION['id'];
	$co = mysql_query("SELECT id_utilisateur,login from utilisateur
					  INNER JOIN connection
					  ON connection.utilisateur_id_utilisateur = utilisateur.id_utilisateur 
					  where connection.utilisateur_id_utilisateur != $id");
	$les_co = false;
	if ($co) {
		while ($row = mysql_fetch_assoc($co)) {
			$les_co[] = $row; }
			return $les_co;
	 }else return false;
}

function voir_profil_utilisateur($id){
	$id_profil = $_GET['id'];
	$req = mysql_query("SELECT * from utilisateur where utilisateur.id_utilisateur =".$id_profil."" ) or die($id_profil);
		while ($row = mysql_fetch_assoc($req)) {
		$profil = $row; }
	return $profil;
}

function urllink($content='') {
	$content = preg_replace('#(((https?://)|(w{3}\.))+[a-zA-Z0-9&;\#\.\?=_/-]+\.([a-z]{2,4})([a-zA-Z0-9&;\#\.\?=_/-]+))#i', '<a href="$0" target="_blank">$0</a>', $content);
	// Si on capte un lien tel que www.test.com, il faut rajouter le http://
	if(preg_match('#<a href="www\.(.+)" target="_blank">(.+)<\/a>#i', $content)) {
		$content = preg_replace('#<a href="www\.(.+)" target="_blank">(.+)<\/a>#i', '<a href="http://www.$1" target="_blank">www.$1</a>', $content);
	//preg_replace('#<a href="www\.(.+)">#i', '<a href="http://$0">$0</a>', $content);
	}
	$content = stripslashes($content);
	return $content; 
}


function user_verified() {
	return isset($_SESSION['id']); 
}


function db_connect() {
	// définition des variables de connexion à la base de données 
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; // INFORMATIONS DE CONNEXION
		$host = 'localhost';
		$dbname = '1mydb';
		$user = 'root'; 
		$password = 'root'; // FIN DES DONNEES
		$db = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $password, $pdo_options);
		return $db;
	} catch (Exception $e) {
		die('Erreur de connexion : ' . $e->getMessage()); 
	}
}


function envoyer_message($message){
	if (isset($_SESSION['id'])) {
		if(isset($_POST['message']) AND !empty($_POST['message'])){
	/* On teste si le message ne contient qu'un ou plusieurs points et
	qu'un ou plusieurs espaces, ou s'il est vide.
	^ -> début de la chaine - $ -> fin de la chaine [-. ] -> espace, rien ou point
	+ -> une ou plusieurs fois
	Si c'est le cas, alors on envoie pas le message */
			if(!preg_match("#^[-. ]+$#", $_POST['message'])) {
			$query = $db->prepare("SELECT * FROM conversation WHERE id_conversation = :user ORDER BY Date DESC LIMIT 0,1"); $query->execute(array('user' => $_SESSION['id'] ));
	$count = $query->rowCount(); $data = $query->fetch();
	// Vérification de la similitude if($count != 0)
	similar_text($data['message_text'], $_POST['message'], $percent);
	if($percent < 80) {// Vérification de la date du dernier message.
		if(time()-5 >= $data['message_time']) { // YES ! ON PEUT CONTINUER ! Ouiiiii.
		$insert = $db->prepare('INSERT INTO conversation (id_conversation, convers, Date, id_message)VALUES(:id, :user, :time, :text)');
	$insert->execute(array('id' => '','user' => $_SESSION['id'], 'time' => time(),'text' => $_POST['message']));
	echo true;
	} else
	echo 'Votre dernier message est trop récent. Baissez le
	rythme :D'; 
	}else
	echo 'Votre dernier message est trés similaire.'; 
	}else
	echo 'Votre message est vide.'; 
	}else
	echo 'Votre message est vide.'; 
	}else
	echo 'Vous devez être connecté.'; 

	// A placer à l'intérieur du if(time()-5 >= $data['message_time'])
}

/* faire un guide d'utilisation...README
info sur ruby

frenchscreenncast  csrf
  scaffolding.
  stackoverflow, railscats.
*/
 ?>
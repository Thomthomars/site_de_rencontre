function insertLogin(login) { var $message = $("#message");
$message.val($message.val() + login + '> ').focus(); }

var reloadTime = 1000; var scrollBar = false;
function recup_messages() {
// On lance la requête ajax $.getJSON('phpscripts/get-message.php?
dateConnexion='+$("#dateConnexion").val(), function(data) { /* On vérifie que error vaut 0, ce
qui signifie qu'il n'y aucune erreur */
if(data['error'] == '0') {
// On intialise les variables pour le scroll jusqu'en bas // Pour voir les derniers messages
var container = $('#text');
var content = $('#messages_content'); var height = content.height()-500;
var toBottom;
// Si avant l'affichage des messages, on se trouve en bas,
// alors on met toBottom a true afin de rester en bas
// Il faut tester avant affichage car après, le message a déjàété
// affiché et c'est aps facile de se remettre en bas :D if(container[0].scrollTop == height)
toBottom = true; else
toBottom = false;
$("#annonce").html('<span class="info"><b>'+data['annonce']+'</b></span><br /><br />');
$("#text").html(data['messages']);
// On met à jour les variables de scroll // Après avoir affiché les messages content = $('#messages_content');
height = content.height()-500;
// Si toBottom vaut true, alors on reste en bas
if(toBottom == true)
container[0].scrollTop = content.height();
// Lors de la première actualisation, on descend
if(scrollBar != true) { container[0].scrollTop = content.height(); scrollBar = true;
}
} else if(data['error'] == 'unlog') {
/* Si error vaut unlog, alors l'utilisateur connecté n'a pas de compte. Il faut le rediriger vers la page de connexion */
$("#annonce").html(''); $("#text").html('');
$(location).attr('href',"chat.php"); }
}); }

function envoyer_Message() {
// On lance la requête ajax
// type: POST > nous envoyons le message
// On encode le message pour faire passer les caractères spéciaux comme +
var message = encodeURIComponent($("#message").val()); $.ajax({
type: "POST",
url: "phpscripts/post-message.php", data: "message="+message,
success: function(msg){
// Si la réponse est true, tout s'est bien passé, // Si non, on a une erreur et on l'affiche
if(msg == true) {
// On vide la zone de texte
$("#message").val('');
$("#responsePost").slideUp("slow").html(''); } else
$("#responsePost").html(msg).slideDown("slow");
// on resélectionne la zone de texte, en cas d'utilisation du bouton "Envoyer"
$("#message").focus(); },
error: function(msg){
// On alerte d'une erreur
alert('Erreur'); }
}); }

// Au chargement de la page, on effectue cette fonction
$(document).ready(function() {
// On vérifie que la zone de texte existe
// Servira pour la redirection en cas de suppression de compte // Pour ne pas rediriger quand on est sur la page de connexion 
if(document.getElementById('message')) {
	// actualisation des messages
window.setInterval(getMessages, reloadTime); // on sélectionne la zone de texte 
$("#message").focus();
} });

function getOnlineUsers() {
// On lance la requête ajax $.getJSON('phpscripts/get-online.php', function(data) {
// Si data['error'] renvoi 0, alors ça veut dire que personne n'est en ligne
// ce qui n'est pas normal d'ailleurs
if(data['error'] == '0') {
var online = '', i = 1, image, text; // On parcours le tableau inscrit dans // la colonne [list] du tableau JSON for (var id in data['list']) {
// On met dans la variable text le statut en toute lettre // Et dans la variable image le lien de l'image 
if(data["list"][id]["status"] == 'busy') {
text = 'Occup&eacute;';
image = 'busy';
} else if(data["list"][id]["status"] == 'inactive') {
text = 'Absent';
image = 'inactive'; } else {
text = 'En ligne';
image = 'active'; }
// On affiche d'abord le lien pour insérer le pseudo dans la zone de texte
online += '<a href="#post" onclick="insertLogin(\''+data['list'][id]["login"]+'\')" title="'+text+'">';
// Ensuite on affiche l'image
online += '<img src="status-'+image+'.png" /> '; // Enfin on affiche le pseudo
online += data['list'][id]["login"]+'</a>';
// Si i vaut 1, ça veut dire qu'on a affiché un membre // et qu'on doit aller à la ligne
if(i == 1) {
i = 0;
online += '<br>'; }
i++; }
$("#users").html(online);
} else if(data['error'] == '1')
$("#users").html('<span style="color:gray;">Aucun utilisateur connect&eacute;.</span>');
}); }
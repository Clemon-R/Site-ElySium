<?php
	$titre = "ElySium"; //Nom du serveur
	$youtube = "http://www.youtube.com/user/97430raphael";//Lien de la chaine youtube de votre serveur
	$facebook = "https://www.facebook.com/legendary.fr";//Lien de la page facebook de votre serveur
	$rpgcode = "36374"; //Votre code rpg
	$min_youtube = "hW6UhZ7x1zs"; //Code video youtube
	$vote_normal = 25; //Points de vote pour les non V.I.P
	$vote_vip = 50; //Points de vote pour les V.I.P
	$code_normal = 200; //Points achat pour les non V.I.P
	$code_vip = 400; //Points achat pour les V.I.P
	
	//BDD
	$hote = 'mysql2.alwaysdata.com'; // Adresse de la bdd
	$bdd = 'legendary_onemu'; // Nom de la bdd
	$utilisateur = 'legendary'; // utilisateur de la bdd, par défault root
	$pass = 'gezfzegtzegzeg'; // Mot de passe la bdd
	
	//etat du serveur
	$server = '91.236.239.60'; //Ip du serveur
	$port = '444'; //port du serveur
	
	
	//Ne toucher plus le bas !
	
$connec = @fsockopen($server,$port); // Ouvre une connection
if(!$connec) // Si la connection a planté, on retourne faux
{
	$connec = false;
}else{
fclose($connec); // Sinon, c'est bon
$connec = true;
}

try
{
	$bdd = new PDO("mysql:host=$hote;dbname=$bdd", "$utilisateur", "$pass");
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
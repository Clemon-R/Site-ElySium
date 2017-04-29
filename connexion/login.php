<?php
$login = false;
if (isset($_POST['submit_login']) && !isset($_SESSION['login'])){
	$compte = new Compte($bdd);
	$infos = $compte->ConnexionCompte($_POST['login'],$_POST['password']);
	if ($infos != null){
		$_SESSION['login'] = $infos['account'];
		$_SESSION['guid'] = $infos['guid'];
		$login = true;
	}else{ $erreur = "Nom de compte ou Mot de passe incorrecte !"; }
}
?>
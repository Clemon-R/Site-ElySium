<div class="barre"><p>Mot de passe oublié</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
		<?php
		if (isset($_POST['valide']))
		{
			if (!isset($_SESSION['login'])){
				$compte = new Compte($bdd);
				$a = $compte->ndcCompte($_POST['login']);
				if ($a == null){
					erreur("Se nom de compte n'existe pas.");
					return;
				}
			}
			$to=$compte->email;
			$subject="Mot de passe oublié";
			$header="Serveur ElySium";
			
			$message="Merci de vous être inscrit sur le Serveur ElySium \r\n";
			$message.="\r\n";
			$message.="Cet Email contient vos données ElySium et le lien pour activer votre compte ElySium afin de pouvoir profiter des services d'ElySium\r\n";
			$message.="\r\n";
			$message.="Voici Les données de Votre compte ElySium Qui sont a conserver !\r\n";
			$message.="Nom de compte: ".$compte->account." \r\n";
			$message.="Mot de passe: ".$compte->pass." \r\n";
			$message.="L'Email lié au compte: ".$compte->email." \r\n";
			$message.="Question secrete: ".$compte->question." \r\n";
			$message.="Reponse secrete: ".$compte->reponse." \r\n";
			$message.="\r\n";
			$message.="Bon jeu sur ElySium !\r\n";
			$message.="\r\n";		
			$message.="L'équipe de ElySium \r\n";

			mail($to,$subject,$message,$header);
			valide("Un email a été envoier a l'email lié au compte.");
		}else{
		?>
		<center>Veuillez entrer votre nom de compte.
		<form style="margin-bottom: 0px;" action="" method="POST">
			<input type="text" name="login" value="" placeholder="EX: test123" required/></br>
			<input type="submit" name="valide" value="Valider"/>
		</form></center>
		<?php } ?>
	</div>
</div>
<div class="bas"></div>
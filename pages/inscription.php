<div class="barre"><p>S'inscrire sur <?php echo $titre; ?></p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
		<?php
		if (isset($_POST['valide']))
		{
		$new_inscript = new Compte($bdd);
			if ($_SESSION['captcha'] == $_POST['captcha'])
			{
				if ($_POST['pass'] == $_POST['pass_conf'])
				{
					if ($_POST['reponse'] == $_POST['reponse_conf'])
					{
						if ($_POST['reponse'] != $_POST['question'])
						{
							if ($new_inscript->VerifieCompteExist($_POST['username'],$_POST['pseudo']) == 0){
								$new_inscript->AddCompte($_POST['username'],$_POST['pass'],$_POST['pseudo'],$_POST['email'],$_POST['question'],$_POST['reponse']);
								valide("Votre compte a bien était créer !</br>Vous pouvez vous connecté.");
							}elseif ($new_inscript->VerifieCompteExist($_POST['username'],$_POST['pseudo']) == 2){
								erreur("Pseudo déjà utiliser !");
							}elseif ($new_inscript->VerifieCompteExist($_POST['username'],$_POST['pseudo']) == 1){
								erreur("Nom de compte déjà utiliser !");
							}
						}else{ erreur("La réponse et la question ne doivent pas êtres pareil !"); }
					}else{ erreur("Les deux réponse ne corresponde pas !"); }
				}else{ erreur("Les deux mot de passe ne corresponde pas !"); }
			}else{ erreur("Le captcha et incorrècte !"); }
		}else{
		?>
		<form style="margin-bottom: 0px;" action="" method="POST"> 
			<fieldset>
			<legend align="top"><b>Informations utilisateur</b></legend>
				<table style="width: 90%;">
					<tr>
					  <td>Nom de Compte</td><td><img src="<?php echo base_url(); ?>theme/officiel/img/icon/16x16/user.png"/><input placeholder="EX : AllBadBoy" name="username" type="text"  required/></td>
					</tr>
					<tr>
						<td colspan="2" class="description"><font color="grey"><em>Entrez ici le Nom De Compte que vous souhaitez utiliser pour vous connecter en jeu et sur le site.</em></font>
						<br />
						<br/>
						</td>
					</tr>
					<tr>
					  <td>Pseudo</td><td><img src="<?php echo base_url(); ?>theme/officiel/img/icon/16x16/user_green.png"/><input placeholder="EX : BadBoy" name="pseudo" type="text" required/></td>
					</tr>
					<tr><td colspan="2" class="description"><font color="grey"><em>Entrez ici le pseudo qui sera affiché en jeu et sur le site.</em></font><br /><br/></td></tr>

					<tr>
					  <td>Votre Adresse E-mail</td><td><img src="<?php echo base_url(); ?>theme/officiel/img/icon/16x16/email.png"/><input placeholder="EX : Sarco123@jevaisvousniker.fr" name="email" type="email" required/></td>
					</tr>
					<tr><td colspan="2" class="description"><font color="grey"><em>Un Email vous sera envoyé afin de valider votre inscription. 	    
					<br/>/!\ L'adresse Mail servira pour n'inporte quel changement d'information du compte afin d'augmenter la sécurité des comptes/!\ </em></font>
					</td></tr>
				</table>
			</fieldset>
			<br/>
			<fieldset>
			<legend align="top"><b>Authentification</b></legend>
			<table style="width: 90%;">
				<tr>
					<td>Mot de passe</td><td><img src="<?php echo base_url(); ?>theme/officiel/img/icon/16x16/key.png"/><input placeholder="EX : Julfou" name="pass" type="password" required/></td>
				</tr>
				<tr>
					<td>Mot de passe (retappez votre mot de passe)</td><td><img src="<?php echo base_url(); ?>theme/officiel/img/icon/16x16/key.png"/><input placeholder="EX : Julfou" name="pass_conf" type="password"  required/></td>
				</tr>
				<tr><td colspan="2" class="description"><font color="grey"><em>Entrez ici le mot de passe que vous souhaitez utiliser pour vous connecter en jeu et sur le site.</em></font>
				</td></tr>
			</table>
			</fieldset>
			<br/>
			<fieldset>
			<legend align="top"><b>Question et Réponse secrète</b></legend>
			<table style="width: 90%;">
				<tr>
					<td>Question secrète</td><td><img src="<?php echo base_url(); ?>theme/officiel/img/icon/16x16/question.png"/><input placeholder="EX : Qui a gagner a la loterie?" name="question" type="texte" required/></td>
				</tr>
				<tr>
					<td>Reponse secrète</td><td><img src="<?php echo base_url(); ?>theme/officiel/img/icon/16x16/question.png"/><input placeholder="EX : Moi!" name="reponse" type="texte" required/></td>
				</tr>
				<tr>
					<td>Réponse secrète(Retapez votre Réponse secrète)</td><td><img src="<?php echo base_url(); ?>theme/officiel/img/icon/16x16/question.png"/><input placeholder="EX : Moi!" name="reponse_conf" type="texte" required /></td>
				</tr>
				<tr><td colspan="2" class="description"><font color="grey"><em>Entrez ici Votre question et votre Réponse secrète.</em></font>
				</td></tr>
			</table>
			</fieldset>
			<br/>
			<fieldset>
			<legend align="top"><b>Sécurité</b></legend>
				<center>
				<img src="<?php echo base_url(); ?>fonction/captcha.php" alt="Captcha" id="captcha" /><img src="<?php echo base_url(); ?>theme/officiel/img/icon/16x16/reload.png" alt="Recharger l'image" title="Recharger l'image" style="cursor:pointer;position:relative;top:-7px;" onclick="document.images.captcha.src='<?php echo base_url(); ?>fonction/captcha.php?id='+Math.round(Math.random(0)*1000)" /></br>
				<input type="text" name="captcha" placeholder="13/13/13"/>
				</center>
			</fieldset>
			</br>
			<fieldset>
			<table style="width: 90%;">
				<tr>
					<center><td>Vous approuver avoir lu le <a href="index.php?page=cgu">r&egrave;glement</a> et vous engage à le respecter une foit inscript.</td></td></center>
				</tr>
			</table>
			</fieldset>
			<br/>
			<center><input name="valide" type="submit" value="Je M'inscris !"/></center>
	</form>
	<?php } ?>
	</div>
</div>
<div class="bas"></div>
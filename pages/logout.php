<div class="barre"><p>Déconnexion sur <?php echo $titre; ?></p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
	<?php
	if ($logout == true) {
		valide("Vous avez bien était déconnecté !");
	}else{
		erreur("Aucune information reçu !");
	}
	?>
	</div>
</div>
<div class="bas"></div>
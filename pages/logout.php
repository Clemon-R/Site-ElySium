<div class="barre"><p>D�connexion sur <?php echo $titre; ?></p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
	<?php
	if ($logout == true) {
		valide("Vous avez bien �tait d�connect� !");
	}else{
		erreur("Aucune information re�u !");
	}
	?>
	</div>
</div>
<div class="bas"></div>
<div class="barre"><p>Acheter des points</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
		<?php 
		if (isset($_SESSION['login']))
		{
			if ($compte->vip == 1)
			{
			$points = $Code_vip;
			}else{
			$points = $Code_normal;
			}
		
		?>
			Vous allez gagner <?php echo $points; ?> Points !
			<div id="starpass_124854"></div>
			<script type="text/javascript" src="http://script.starpass.fr/script.php?idd=124854&amp;verif_en_php=1&amp;datas=">
			</script>
			<noscript>Veuillez activer le Javascript de votre navigateur s'il vous pla&icirc;t.<br />
			<a href="http://www.starpass.fr/">Micro Paiement StarPass</a>
			</noscript>
		<?php 
		}else{ erreur("vous devez etre connecté !"); } 
		?>
	</div>
</div>
<div class="bas"></div>
<div class="barre"><p>Voter & Gagner</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
	<?php
	if (isset($_SESSION['login'])){
		if ($compte->vip == 1)
		{
			$compte->Vote($_SERVER['REMOTE_ADDR'],$rpgcode,$vote_vip);
		}else{
			$compte->Vote($_SERVER['REMOTE_ADDR'],$rpgcode,$vote_normal);
		}
	}else{
	?>
	<center>Vous n'êtes pas connecté mais vous pouvez voter quand même sans gagner de points par contre.</br>
	<a href="http://www.rpg-paradize.com/?page=vote&vote=<?php echo $rpgcode; ?>">Cliquez ici</a></center>
	<?php } ?>
	</div>
</div>
<div class="bas"></div>
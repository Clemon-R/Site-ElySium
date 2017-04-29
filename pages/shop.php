<div class="barre"><p>Boutique</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
<?php
$margin = "-25";
if (isset($_POST['panoplie'])){
$margin = "0";
}
?>
	<div style="margin-left: <?php echo $margin; ?>px;" class="contenu">
			<?php
			if (isset($_SESSION['login']))
			{
			?>
				<table>
						<tr>
							<td><center><a href="index.php?page=boutiqueitemjp"><img src="theme/officiel/img/store/itemsjp.png" /></a></center></td>
							<td><center><a href="index.php?page=boutique&type=8"><img src="theme/officiel/img/store/dofus.png" /></a></center></td>
							<td><center><a href="index.php?page=boutique&type=7"><img src="theme/officiel/img/store/famillier.png" /></a></center></td>
						</tr>
						<tr>
							<td><center><a href="index.php?page=boutique&type=10"><img src="theme/officiel/img/store/bouclier.png" /></a></center></td>
							<td><center><a href="index.php?page=shoparmes"><img src="theme/officiel/img/store/armes.png" /></a></center></td>
							<td><center><a href="index.php?page=boutique&type=11"><img src="theme/officiel/img/store/montures.png" /></a></center></td>
						</tr>
						<tr>
							<td><center><a href="index.php?page=boutique&type=9"><img src="theme/officiel/img/store/autres.png" /></a></center></td>
							<td><center><a href="index.php?page=shopservice"><img src="theme/officiel/img/store/service.png" /></a></center></td>
							<td><center><a href="index.php?page=vip"><img src="theme/officiel/img/store/vip.png" /></a></center></td>
						</tr>
						<tr>
							<td><center><a href="index.php?page=shopjeton"><img src="theme/officiel/img/store/jeton.png" /></a></center></td>
						</tr>
					</table>
			<?php
			}else{ erreur("Vous devez être connecté !"); } 
			?>
	</div>
</div>
<div class="bas"></div>
<div class="barre"><p>Boutique a Service</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div style="margin-left: <?php echo $margin; ?>px;" class="contenu">
					<?php
					if (isset($_SESSION['login']))
					{
					?>
					<table>
						<tr>
							<td><center><a href="index.php?page=changname"><img src="theme/officiel/img/store/name.png" /></a></center></td>
							<td><center><a href="index.php?page=changsexe"><img src="theme/officiel/img/store/sexe.png" /></a></center></td>
							<td><center><a href="index.php?page=changcouleur"><img src="theme/officiel/img/store/color.png" /></a></center></td>
						</tr>
						<tr>
							<td><center><a href="index.php?page=achattitre"><img src="theme/officiel/img/store/titre.png" /></a></center></td>
							<td><center><a href="index.php?page=achattag"><img src="theme/officiel/img/store/tag.png" /></a></center></td>
						</tr>
					</table>
					<?php 
					}else{ erreur("Vous devez être connecté !"); }
					?>
	</div>
</div>
<div class="bas"></div>
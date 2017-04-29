<div class="barre"><p>Boutique</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
					<?php
					if (isset($_SESSION['login']))
					{
					?>
					<table>
						<tr>
							<td><center><a href="index.php?page=boutique&type=12"><img src="theme/officiel/img/store/hache.png" /></a></center></td>
							<td><center><a href="index.php?page=boutique&type=13"><img src="theme/officiel/img/store/pelle.png" /></a></center></td>
						</tr>
						<tr>
							<td><center><a href="index.php?page=boutique&type=14"><img src="theme/officiel/img/store/marteau.png" /></a></center></td>
							<td><center><a href="index.php?page=boutique&type=15"><img src="theme/officiel/img/store/baguette.png" /></a></center></td>
						</tr>
						<tr>
							<td><center><a href="index.php?page=boutique&type=16"><img src="theme/officiel/img/store/arc.png" /></a></center></td>
							<td><center><a href="index.php?page=boutique&type=17"><img src="theme/officiel/img/store/baton.png" /></a></center></td>
						</tr>
						<tr>
							<td><center><a href="index.php?page=boutique&type=18"><img src="theme/officiel/img/store/dagues.png" /></a></center></td>
							<td><center><a href="index.php?page=boutique&type=19"><img src="theme/officiel/img/store/epee.png" /></a></center></td>
						</tr>
					</table>
					<?php 
					}else{ erreur("Vous devez être connecté !"); }
					?>
	</div>
</div>
<div class="bas"></div>
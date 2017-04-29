<div class="barre"><p>Boutique a Jeton</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div style="margin-left: <?php echo $margin; ?>px;" class="contenu">
				<center>
				<?php
				if (isset($_SESSION['login']))
				{

				?>
				<fieldset>
					<legend style="font-family: Quintero;font-weight: bold;color: red;font-size: 18px;">Information</legend>
				<center>
				<legend style="color: red"><b>Vous avez <?php echo $row['jeton']; ?> jeton</br>
				</br>
				Les Jetons sont offert par les animateurs aux gagants d'event.				
				</br>
				 1 Event gagné = 1 Jeton offert. Sauf Event exeptionnel.				
				 </br>
				 C'est en faite la récompense d'un event gagné !
				</legend>
				</center>
				</fieldset>
				</br>
				</br>
				<table class="data">
							<tr>
								<th>Selection</th>
								<th>Item</th>
							</tr>
							<tr>
								<td><center><a href="index.php?page=jetonitemjp" title="1 Item Jet Parfait"><input type="submit" value="Choisir"/></a></center></td>
								<td>1 Item Jet Parfait</td>
							</tr>
							<tr>
								<td><center><a href="index.php?page=jetondivers" title="1 Objet Divers"><input type="submit" value="Choisir"/></a></center></td>
								<td>Divers</td>
							</tr>
						</table>
				<?php 
				}else{ echo "Vous devez être connecté !"; } ?>
				</center>
	</div>
</div>
<div class="bas"></div>
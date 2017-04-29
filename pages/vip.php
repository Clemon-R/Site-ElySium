<div class="barre"><p>Devenir V.I.P !</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
		<?php 
		if (isset($_SESSION['login']))
		{
			if ($compte->vip == 1){
				erreur("Vous êtes déjà V.I.P !");
				return;
			}
		?>
			<fieldset style="margin-bottom: 0px;">
			<center>
				<b>L'accès VIP coûte 1 starpass !</b>
				<br />
				<br />
				Pour tout problème lors de l'achat contacter le <a href="index.php?page=contactsupport">Support</a>
			</center>
			</fieldset>
			<br />
					<table class="data">
					<tr>
						<th>Avantages</th>
						<th><font color=red>Non V.I.P</font></th>
						<th><font color=green>V.I.P</font></th>
					</tr>
					<tr style="text-align: center;">
					  <th>Point Par vote</th>
					  <td><font color=red><?php echo $vote_normal; ?></font></td>
					  <td><font color=green><?php echo $vote_vip; ?></font></td>
					</tr>
					<tr style="text-align: center;">
						<th>Point Par Code Starpass</th>
						<td><font color=red><?php echo $code_normal; ?></font></td>
						<td><font color=green><?php echo $code_vip; ?></font></td>
					</tr>
					<tr style="text-align: center;">
					  <th>Titre V.I.P Gratuit [Bientot]</th>
					  <td><font color=red>Non</font></td>
					  <td><font color=green>Oui</font></td>
					</tr>
					<tr style="text-align: center;">
					  <th>TAG [V.I.P] Gratuit [Bientot]</th>
					  <td><font color=red>Non</font></td>
					  <td><font color=green>Oui</font></td>
					</tr>
					<tr style="text-align: center;">
					  <th>Accès île V.I.P</th>
					  <td><font color=red>Non</font></td>
					  <td><font color=green>Oui</font></td>
					</tr>
					<tr style="text-align: center;">
					  <th>Commande .vipcommandes</th>
					  <td><font color=red>Non</font></td>
					  <td><font color=green>Oui</font></td>
					</tr>
					<tr style="text-align: center;">
					  <th>Morph Gratuite (Commande .morph id)</th>
					  <td><font color=red>Non</font></td>
					  <td><font color=green>Oui</font></td>
					</tr>
					<tr style="text-align: center;">
					  <th>Size Gratuite</th>
					  <td><font color=red>Non</font></td>
					  <td><font color=green>Oui</font></td>
					</tr>
				</table>
			<br />
			<br />
				<div id="starpass_164440"></div>
				<script type="text/javascript" src="http://script.starpass.fr/script.php?idd=164440&amp;verif_en_php=1&amp;datas=">
				</script>
				<noscript>Veuillez activer le Javascript de votre navigateur s'il vous pla&icirc;t.<br />
				<a href="http://www.starpass.fr/">Micro Paiement StarPass</a>
				</noscript>
		<?php 
		}else{ erreur("vous devez etre connecté !"); } 
		?>
	</div>
</div>
<div style="margin-top: -20px;" class="bas"></div>
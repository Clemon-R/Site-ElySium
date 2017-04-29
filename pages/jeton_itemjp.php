<div class="barre"><p>Boutique a Jeton</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div style="margin-left: <?php echo $margin; ?>px;" class="contenu">
				<center>
				<?php
				if (isset($_SESSION['login']))
				{
					if (!isset($_POST['valide_cat']) && !isset($_POST['valide_item']))
					{
					?>
					<form style="margin-bottom: 0px;" action="" method="POST">
					<table class="data">
						<tr>
							<th>Selection</th>
							<th>Catégorie</th>
						</tr>
						<tr>
							<th><input type="radio" name="type" value="40002"/></th>
							<td>Item 2.XX</td>
						</tr>
						<tr>
							<th><input type="radio" name="type" value="30000"/></th>
							<td>Chapeaux</td>
						</tr>
						<tr>
							<th><input type="radio" name="type" value="30001"/></th>
							<td>Cape</td>
						</tr>
						<tr>
							<th><input type="radio" name="type" value="30002"/></th>
							<td>Ceinture</td>
						</tr>
						<tr>
							<th><input type="radio" name="type" value="30003"/></th>
							<td>Bottes</td>
						</tr>
						<tr>
							<th><input type="radio" name="type" value="30004"/></th>
							<td>Amulette</td>
						</tr>
						<tr>
							<th><input type="radio" name="type" value="30005"/></th>
							<td>Anneau</td>
						</tr>
						<tr>
							<th><input type="radio" name="type" value="30007"/></th>
							<td>Famillier</td>
						</tr>
						<tr>
							<th><input type="radio" name="type" value="30008"/></th>
							<td>Dofus</td>
						</tr>
					</table>
					</br>
					<input type="submit" name="valide_cat" value="Valider"/>
					</form>
					<?php
					}elseif (isset($_POST['valide_cat']))
					{
						if (isset($_POST['type']))
						{
						$pnj = $bdd->query("SELECT * FROM npc_template WHERE id='".$_POST['type']."';")->fetch();
						$item = explode(",", $pnj['ventes']);
						$a = count($item);
						$z = 0;
						?>
						<form style="margin-bottom: 0px;" action="" method="POST">
							<table class="data">
								<tr>
									<th>Choisi le Personnage qui recevra l'item:</th>
								</tr>
							</table>
							<table class="data">
								<tr style="text-align: center;">
									<td>Choix</td>
									<td>Nom</td>
									<td>Classe / Sexe</td>
									<td>Niveau</td>
								</tr>
							<?php $perso = $bdd->query("SELECT * FROM personnages WHERE account='".$compte->guid ."';");
							$perso2 = false;
							while ($perso1 = $perso->fetch()) {
							$class = getImgClass($perso1['class'],$perso1['sexe']);
							$perso2 = true;
							 ?>
								<tr>
									<th><input type="radio" name="perso" value="<?php echo $perso1['guid']; ?>"/></th>
									<th><?php echo $perso1['name']; ?></th>
									<th><img style="border-radius: 10px;" src="theme/officiel/img/class/<?php echo $class; ?>.png"></th>
									<th><?php echo $perso1['level']; ?></th>
								</tr>
							<?php } ?>
							</table>
							<?php
							if ($perso2 == false)
							{
							?>
							<table class="data">
								<tr>
									<center><th>Aucun Personnage Créé</th></center>
								</tr>
							</table>
							<?php } ?>
							</br>
							</br>
							<table class="data">
								<tr>
									<th>Selection</th>
									<th>Item</th>
									<th>Level</th>
									<th>Stats</th>
									<th>Prix</th>
								</tr>
								<?php
								while ($z < $a)
								{
								$infos = $bdd->query("SELECT * FROM item_template WHERE id='".$item[$z]."';")->fetch();
								?>
								<tr>
									<th><input type="radio" name="type" value="<?php echo $infos['id']; ?>"/></th>
									<td><?php echo $infos['name']; ?></td>
									<td><?php echo $infos['level']; ?></td>
									<td><?php echo decryptStats($infos['statsTemplate']);?></td>
									<td>5</td>
								</tr>
								<?php
								$z++;
								} 
								?>
							</table>
							</br>
							<input type="submit" name="valide_item" value="Acheter"/>
						</form>
						<?php
						}else{ erreur("Vous n'avez pas sélectionné de catégorie</center>"); }
					}elseif (isset($_POST['valide_item']))
					{
						if (isset($_POST['type']) && isset($_POST['perso']))
						{
							$prix = 5;
							$jeton = $compte->jeton - $prix;
							if ($compte->jeton >= $prix)
							{
								$date = date('d/m/Y à H:i:s', time());
								$bdd->query("UPDATE accounts SET jeton='$jeton' WHERE account='".$_SESSION['login']."';") or die("Une erreur c'est produite ! Code 1");
								$bdd->query("INSERT INTO live_action(PlayerID,Action,Nombre) VALUES('".$_POST['perso']."','21','".$_POST['type']."');") or die("Une erreur c'est produite ! Code2");
								$bdd->query("INSERT INTO historique_achat (ID,item,itemid,prix,date,account,perso,ip) VALUES ('','Boutique a JETON','".$_POST['type']."','".$prix."','".$date."', '".$row['account']."', '".$_POST['perso']."', '".$_SERVER['REMOTE_ADDR']."');") or die("Une erreur c'est produite ! Code 3");
								echo '<meta http-equiv="refresh" content="3; index.php?page=accueil">';
								valide("<center>L'opération c'est bien déroulée. Vous recevrez votre commande dans 10 minutes Maximum. Vous allez être redirigé !</center>");
							}else{ erreur("Tu n'a pas assez de jeton !</center>"); }
						}else{ erreur("Tout les champs ne sont pas remplies !</center>"); }
					}else{ erreur("Vous n'avez pas sélectionné de catégorie</center>"); }
				}else{ erreur("Vous devez être connecté !</center>"); }
				?>
				</center>
	</div>
</div>
<div class="bas"></div>
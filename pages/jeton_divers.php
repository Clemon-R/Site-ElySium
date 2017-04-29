<div class="barre"><p>Boutique a Jeton</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div style="margin-left: <?php echo $margin; ?>px;" class="contenu">
				<center>
				<?php
				if (isset($_SESSION['login']))
				{
					if (isset($_POST['valide_item']))
					{
						if (isset($_POST['type']))
						{
							if (isset($_POST['perso']))
							{
								$itemchoix = $_POST['type'];
								$prix = $bdd->query("SELECT * FROM boutiquejeton WHERE itemid='".$itemchoix."';") or die("Une erreur c'est produite ! Code 2");
								$prix1 = $prix->fetch() or die("Une erreur c'est produite ! Code 3");
								$prix2 = $row['jeton'] - $prix1['prix'];
								if ($row['jeton'] > $prix1['prix'] or $row['jeton'] == $prix1['prix'])
								{
									$date = date('d/m/Y à H:i:s', time());
									$bdd->query("UPDATE accounts SET jeton='".$prix2."' WHERE account='".$_SESSION['login']."';") or die("Une erreur c'est produite ! Code 1");
									$bdd->query("INSERT INTO live_action(PlayerID,Action,Nombre) VALUES('".$_POST['perso']."','21','".$_POST['type']."');") or die("Une erreur c'est produite ! Code 2");
									$bdd->query("INSERT INTO historique_achat (ID,item,itemid,prix,date,account,perso,ip) VALUES ('','Boutique a JETON','".$_POST['type']."','".$prix1['prix']."','".$date."', '".$row['account']."', '".$_POST['perso']."', '".$_SERVER['REMOTE_ADDR']."');") or die("Une erreur c'est produite ! Code 3");
									echo '<meta http-equiv="refresh" content="3; index.php?page=accueil">';
									valide ("<center>L'opération c'est bien déroulée. Vous recevrez votre commande dans 10 minutes Maximum. Vous allez être redirigé !");
								}else{ erreur("Tu n'a pas assez de Jeton !"); }
							}else{ erreur("Vous avez oublié de séléctionner un personnage !"); }
						}else{ erreur("Vous avez oublié de séléctionner un article !"); }
					}else{
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
							while ($perso1 = $perso->fetch()) {
							$class = getImgClass($perso1['class'],$perso1['sexe']);
							$perso2 = $bdd->query("SELECT * FROM personnages WHERE account='".$compte->guid ."';")->rowCount();
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
							if ($perso2 == NULL)
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
									<th>Prix</th>
								</tr>
							<?php
							$item = $bdd->query("SELECT * FROM boutiquejeton;") or die("Une erreur c'est produite !");
							while ($item1 = $item->fetch())
							{
							$itemt = $bdd->query("SELECT * FROM item_template WHERE id='".$item1['itemid']."';");
							while ($itemt1 = $itemt->fetch())
							{
							?>
								<tr>
									<th><input type="radio" name="type" value="<?php echo $item1['itemid']; ?>"/></th>
									<th><?php echo $itemt1['name']; ?></th>
									<th><?php echo $item1['prix']; ?></th>
								</tr>
							<?php }} ?>
							</table>
							</br>
							<input type="submit" name="valide_item" value="Acheter"/>
						</form>
				<?php
						}
				}else{ erreur("Vous devez être connecté !"); }
				?>
				</center>
	</div>
</div>
<div class="bas"></div>
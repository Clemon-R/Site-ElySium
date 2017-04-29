<div class="barre"><p>Boutique Item jet parfait !</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
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
							<center><input type="submit" name="valide_cat" value="Valider"/></center>
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
									<th>Choisi un Personnage :</th>
								</tr>
							</table>
							<table class="data">
								<tr style="text-align: center;">
									<th>Choix</th>
									<th>Nom</th>
									<th>Classe / Sexe</th>
									<th>Niveau</th>
								</tr>
							<?php 
							$perso = $bdd->query("SELECT * FROM personnages WHERE account='".$compte->guid ."';");
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
							<?php } 
							?>
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
									<th><input type="radio" name="item" value="<?php echo $infos['id']; ?>"/></th>
									<th><?php echo $infos['name']; ?></th>
									<th><?php echo $infos['level']; ?></th>
									<th><?php echo decryptStats($infos['statsTemplate']);?></th>
									<th>50</th>
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
						}else { erreur("Vous n'avez pas sélectionné de catégorie"); }
					}elseif (isset($_POST['valide_item']))
					{
						if (isset($_POST['perso']))
						{
							if (isset($_POST['item']))
							{
								if ($compte->logged == 1)
								{
									$personnage = $_POST['perso'];
									$prix = 50;
									$points = $compte->points - $prix;
									$perso = $bdd->query("SELECT * FROM personnages WHERE guid='$personnage';")->fetch() or die("Une erreur c'est produite ! Code 1");
									$date = date('d/m/Y à H:i:s', time());
									if ($compte->points >=)
									{
										$bdd->query("UPDATE accounts SET points='$points' WHERE account='".$_SESSION['login']."';") or die("Une erreur c'est produite ! Code 2");
										$bdd->query("INSERT INTO live_action (ID,PlayerID,Action,Nombre) VALUES ('','".$personnage."','21','".$_POST['item']."');") or die("Une erreur c'est produite ! Code 3");
										$bdd->query("INSERT INTO historique_achat (ID,item,itemid,prix,date,account,perso,ip) VALUES ('','Boutique Item JP','".$_POST['item']."','".$prix."','".$date."', '".$compte->account ."', '".$perso['name']."', '".$_SERVER['REMOTE_ADDR']."');") or die("Une erreur c'est produite ! Code 4");
										echo '<meta http-equiv="refresh" content="5; index.php?page=accueil">';
										valide("L'opération c'est bien déroulée.</br> Vous recevrez votre commande dans 10 minutes Maximum.</br> Vous allez être redirigé !");
									}else{ erreur("Tu n'a pas assez de point !"); }
								}else{ erreur("Vous devez êtres connecté du jeu !"); }
							}else{ erreur("Vous n'avez pas sélétionné d'item"); }
						}else{ erreur("Vous n'avez pas sélétionné de personnage"); }
					}
				}else{ erreur("Vous devez être connecté !"); }
				?>
		</center>
	</div>
</div>
<div class="bas"></div>
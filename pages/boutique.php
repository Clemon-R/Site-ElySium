<div class="barre"><p>Boutique</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
		<center>
				<?php
				if (isset($_SESSION['login']))
				{
					if (!is_numeric($_GET['type']))
					{
						erreur("Information reçu incorrecte !");
						return;
					}
					if (isset($_GET['type']))
					{
					$type = $_GET['type'];
						if (isset($_POST['acheter']))
						{
							if ($compte->logged == 1)
							{
								if (isset($_POST['perso']))
								{
									if (isset($_POST['item']))
									{
											$itemchoix = $_POST['item'];
											$prix1 = $bdd->query("SELECT * FROM boutique WHERE itemid='$itemchoix';")->fetch() or die("Une erreur c'est produite ! Code 0");
											$prix2 = $compte->points - $prix1['prix'];
										if ($compte->points >= $prix1['prix'])
										{
											$bdd->query("UPDATE accounts SET points='".$prix2."' WHERE account='".$_SESSION['login']."';") or die("Une erreur c'est produite ! Code 1");
											$bdd->query("INSERT INTO live_action (ID,PlayerID,Action,Nombre) VALUES ('','".$_POST['perso']."','21','".$itemchoix."');") or die("Une erreur c'est produite ! Code 2");
											$persochoix = $bdd->query("SELECT * FROM personnages WHERE guid='".$_POST['perso']."';")->fetch() or die("Une erreur c'est produite ! Code 4");
											$date = date('d/m/Y à H:i:s', time());
											$bdd->query("INSERT INTO historique_achat (ID,item,itemid,prix,date,account,perso,ip) VALUES ('','Boutique','".$itemchoix."','".$prix1['prix']."','".$date."', '".$compte->account ."', '".$persochoix['name']."', '".$_SERVER['REMOTE_ADDR']."');") or die("Une erreur c'est produite ! Code 3");
											echo '<meta http-equiv="refresh" content="3; index.php?page=accueil">';
											valide("L'opération c'est bien déroulée.</br> Vous recevrez votre commande dans 10 minutes Maximum.</br> Vous allez être redirigé !");
										}else{ erreur("Tu n'a pas assez de point !"); }
									}else{ erreur("Vous n'avez pas sélétionné d'article"); }
								}else{ erreur("Vous n'avez pas sélétionné de personnage"); }
							}else{ erreur("Vous devez êtres connecté en jeu !"); }
						}else{
						?>
						<form style="margin-bottom: 0px;" method="post" action="">
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
						$perso = $bdd->query("SELECT * FROM personnages WHERE account='".$compte->guid ."';")->rowCount();
						if ($perso > 0){
							$perso = $bdd->query("SELECT * FROM personnages WHERE account='".$compte->guid ."';");
						}
						$perso2 = false;
						while ($perso1 = $perso->fetch()) {
						$perso2 = true;
						$class = getImgClass($perso1['class'],$perso1['sexe']);
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
										<th width =5%>Selection</th>
										<th width =35%>Item</th>
										<th width =20%>Img</th>
										<th width =5%>Level</th>
										<th width =35%>Stats</th>
										<th width =5%>Prix</th>
								</tr>
						<?php
						$item = $bdd->query("SELECT * FROM boutique WHERE type='".$type."';")->rowCount();
						if ($item > 0){
							$item = $bdd->query("SELECT * FROM boutique WHERE type='".$type."';");
						}
						$item2 = false;
						while ($item1 = $item->fetch())
						{
							$itemt = $bdd->query("SELECT * FROM item_template WHERE id='".$item1['itemid']."';")->fetch();
							$item2 = true;
							?>
								<tr>
									<th><input type="radio" name="item" value="<?php echo $item1['itemid']; ?>"/></th>
									<th><?php echo $itemt1['name']; ?></th>
									<th><img src="theme/officiel/img/boutique/<?php echo $item1['img']; ?>.png" alt="" width="100" height="100" style="float:left;" /></th>
									<th><?php echo $itemt1['level']; ?></th>
									<th><?php echo decryptStats($itemt1['statsTemplate']);?></th>
									<th><?php echo $item1['prix']; ?> Points</th>
								</tr>	
							<?php 
						} ?>
						</table>
						<?php
						if ($item2 == false){
						?>
						<table class="data">
							<tr>
									<center><th>Aucun Item dans cette catégorie</th></center>
							</tr>
						</table>
						<?php
						}
						?>
						</br>
						</br>
						<center><input type="submit" name="acheter" value="Acheter"/></center>
						</form>
						<?php
						}
					}else{ erreur("Type d'élément cherché non trouvé!"); }
				}else{ erreur("Vous devez être connecté !"); } ?>
		</center>
	</div>
</div>
<div class="bas"></div>
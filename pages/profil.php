<div class="barre"><p>profil</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
		<?php
		if (isset($_SESSION['login']))
		{
		$date = explode("~", $compte->lastConnectionDate);
		?>
			<table class="data">
				<th>Mon Profil & Mes Informations</th>
			</table>
			<table width="90%" align="center" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td><h1><b>Mon Profil</b></h1></td>
					<td rowspan="20" style="border-left:1px solid #366a80" width="30px"></td>
					<td><h1><b><center>Informations</center></b></h1></td>
				<tr>
					<td>Mon Nom de Compte :</td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td><input type="text" value="<?php echo $compte->account;?>" size="25" disabled="disabled"></td>
					<td>Rang :</td>
					<td>
					<?php if($compte->level == 5) { echo '<i><b><font color=red>Créateur</font></b></i>'; } ?>
					<?php if($compte->level == 4) { echo '<i><b><font color=red>Community Manager</font></b></i>'; } ?>
					<?php if($compte->level == 3) { echo '<i><b><font color=green>Modérateur</font></b></i>'; } ?>
					<?php if($compte->level == 2) { echo '<i><b><font color=green>Modérateur</font></b></i>'; } ?>
					<?php if($compte->level == 1) { echo '<i><b><font color=yellow>Animateur</font></b></i>'; } ?>
					<?php if($compte->level == 0) { echo '<i><b><font color=grey>Joueur</font></b></i>'; } ?>
					</td>
				</tr>
				<tr>
					<td>Mon Mot de Passe : <a href="index.php?page=perte1">Oublié</a></td>
					<td>Statut Sur Le Serveur :</td> 	
					<td><?php if($compte->logged == 1) { echo '<i><b><font color=green>Connect&eacute;(e)</font></b></i>'; } else { echo "<i><b><font color=red>Deconnect&eacute;(e)</font></b></i>"; } ?>			</tr>
				</tr>
				<tr>
					<td><input type="password" value="12345678" size="25" disabled="disabled"></td>
				</tr>
				<tr>
					<td>Mon Pseudo :</td>
				</tr>
				<tr>
					<td><input type="text" value="<?php echo $compte->pseudo;?>" size="25" disabled="disabled"></td>
				</tr>
				<tr>
					<td>Mon Adresse Mail :</td>
					<td>Derniére connexion : </td>
					<td><?php echo $date[3]."H".$date[4]." ".$date[2]."/".$date[1]."/".$date[0];?></td>
				</tr>
				<tr>
					<td><input type="text" value="<?php echo $compte->email;?>" size="25" disabled="disabled"></td>
					<td>L'ip de la derniére connexion : </td>
					<td><?php echo $compte->lastIP; ?></td>
				</tr>
				</tr>
					<td>Ma Question secréte :</td>
				</tr>
				<tr>
					<td><input type="text" value="<?php echo $compte->question;?>" size="25" disabled="disabled"></td>
					<td>Mon Nombre de vote : </td>
					<td><center><?php echo $compte->vote; ?></center></td>
				</tr>
				<tr>
					<td>Ma réponse secréte : <a href="index.php?page=perte1">Oublié</a></td>
					<td>Mes Points :</td>
					<td><center><?php echo $compte->points;?> Points</center></td>
				</tr>
				<tr>
					<td> </td>
					<td>Statut V.I.P :</td>
					<td><center><?php if ($compte->vip == 1) { ?><font color='green'>Oui</font> <?php } else { ?><font color='red'>Non</font><?php } ?></center></td>
				</tr>
				<tr>
					<td><input type="password" value="12345678" size="25" disabled="disabled"></td>
				</tr>
			</table>
			</br>
			</br>
			</br>
			<?php 
			$numero = 1;
			$perso2 = $bdd->query("SELECT * FROM personnages WHERE account='".$compte->guid ."';");
			?> 
			<table class="data">
				<th>Mes Personnages :</th>
			</table>
			<table class="data">
				<tr style="text-align: center;">
				<td>N°</td>
				<td>Nom</td>
				<td>Classe / Sexe</td>
				<td>Niveau</td>
				<td>Guilde</td>
				<td>Alignement</td>
				</tr>
				<?php
				while ($perso = $perso2->fetch())
				{
				$guilde = $bdd->query("SELECT * FROM guild_members WHERE name='".$perso['name']."';")->rowCount();
				$perso1 = $bdd->query("SELECT * FROM personnages WHERE account='".$compte->guid ."';")->rowCount();
				if ($guilde != 0)
				{
					$guilde = $bdd->query("SELECT * FROM guild_members WHERE name='".$perso['name']."';")->fetch();
					$guilde = $bdd->query("SELECT * FROM guilds WHERE id='".$guilde['guild']."';")->fetch();
				}else
				{
					$guilde = "Aucune";
				}
				$class = getImgClass($perso['class'],$perso['sexe']);
				?>
				<tr>
				<th><?php echo $numero; ?></th>
				<th><a href="index.php?page=armurerie&perso=<?php echo $perso['guid']; ?>"><?php echo $perso['name']; ?></a></th>
				<th><img style="border-radius: 10px;" src="theme/officiel/img/class/<?php echo $class; ?>.png"></th>
				<th><?php echo $perso['level']; ?></th>
				<th><a><?php echo $guilde['name']; ?></a></th>
				<th><?php
				if ($perso['alignement'] == 1)
				{ ?>
				<img style="border-radius: 10px;" src="theme/officiel/img/profil/bontarien.png">
				<?php }elseif ($perso['alignement'] == 2) 
				{ ?>
				<img style="border-radius: 10px;" src="theme/officiel/img/profil/brakmarien.png">
				<?php }elseif ($perso['alignement'] == 3) 
				{ ?>
				<img style="border-radius: 10px;" src="theme/officiel/img/profil/mercenaire.png">
				<?php }else
				{ ?>
				<img style="border-radius: 10px;" src="theme/officiel/img/profil/neutre.png">
				<?php } ?>
				</th>
				</tr>
				<?php 
				$numero++;
				}
				if ($perso1 == NULL)
				{
				?>
				<tr>
				<center><td>Aucun Personnage</td></center>
				</tr>
				<?php } ?>
			</table>
			</br>
		<?php
		}else{	echo "<center>Vous devez être connecté pour pouvoir acceder a votre profil !</center>";
		}
		?>
	</div>
</div>
<div class="bas"></div>
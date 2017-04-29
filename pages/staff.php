<div class="barre"><p>Staff en ligne sur <?php echo $titre; ?></p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
		<?php
			$staff = $bdd->query("SELECT * FROM accounts WHERE level>'0' ORDER BY level DESC;") or die("Une erreur c'est produite !");
			while ($staff1 = $staff->fetch())
			{
				switch($staff1['level'])
				{
				case 5:
					$rang = "Créateur du serveur";
					$infos = "Rôle de Gestion compléte et d'amélioration du serveur";
					$color = "red";
					break;
				case 4:
					$rang = "Community Manager";
					$infos = "Met en place les demandes et envies de joueurs. Répond aux demandes et s'occupe de la relation Staff-joueur";
					$color = "red";
					break;
				case 3:
					$rang = "Moderateur";
					$infos = "Surveille le Jeu. Fait appliquer le réglement et répond aux demandes des joueurs";
					$color = "blue";
					break;
				case 2:
					$rang = "Animateur";
					$infos = "Animateur du serveur, S'occupe d'organiser des events et de distraire les joueurs pendant leur temps de jeu";
					$color = "green";
					break;
				case 1:
					$rang = "Animateur en Test";
					$infos = "Animateur du serveur, S'occupe d'organiser des events et de distraire les joueurs pendant leur temps de jeu";
					$color = "green";
					break;
				default:
					$rang = "";
					$infos = "";
					$color = "";
				}
				$connect = explode("~", $staff1['lastConnectionDate']);
			?>
			<fieldset>
			<img src="theme/officiel/img/avatars/<?php if (file_exists('theme/officiel/img/avatars/'.$staff1['pseudo'].'.png')){ echo $staff1['pseudo']; }else{ echo "inconnue"; }?>.png" alt="" width="100" height="100" style="float:left;" />
				<legend style="color: <?php echo $color;?>;font-size: 18px;"><b><?php echo $staff1['pseudo']; ?></b></legend>
				&nbsp;<i><center><font color="#8B0000"><b>Rang :</b></font> <?php echo $rang; ?></i></br>
				</br>
				&nbsp;<i><font color="#8B0000"><b>Information :</b></font> <?php echo $rang; ?>, <?php echo $infos; ?>.</i></br>
				</br>
				&nbsp;<i><font color="#8B0000">Dernière connexion a</font> <?php echo $connect[3]."H".$connect[4]." le ".$connect[2]."/".$connect[1]."/".$connect[0]; ?></i></center>
			</fieldset>
			<?php } ?>
	</div>
</div>
<div class="bas"></div>
<div class="barre"><p>Information sur le Serveur</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
	<?php
	$vote1 = $bdd->query("SELECT * FROM accounts;")->rowCount();
	$perso1 = $bdd->query("SELECT * FROM personnages;")->rowCount();
	$compte1 = $bdd->query("SELECT * FROM accounts WHERE logged = 1;")->rowCount();
	$banni1 = $bdd->query("SELECT * FROM accounts WHERE banned = 1;")->rowCount();
	$vip1 = $bdd->query("SELECT * FROM accounts WHERE vip = 1;")->rowCount();
	?>
	<table class="data">
		<td><center><b>Caractéristiques du Serveur :</b></center></td>
		<tr>
		<th><b>Niveau De Départ : </b> 200</th>
		</tr>
		<tr>
		<th><b>Niveau Maximum : </b> 500</th>
		</tr>
		<tr>
		<th><b>Kamas De Départ : </b> 20.000.000</th>
		</tr>
	</table>
	</br>
	</br>
	</br>
	<table class="data">
		<td><center><b>Statistiques du Serveur :</b></center></td>
		<tr>
		<th><b>Comptes <?php echo $titre; ?> : </b> <?php echo $vote1; ?></th>
		</tr>
		<tr>
		<th><b>Comptes connecté : </b> <?php echo $compte1; ?></th>
		</tr>
		<tr>
		<th><b>Comptes Banni : </b> <?php echo $banni1; ?></th>
		</tr>
		<tr>
		<th><b>Comptes V.I.P : </b> <?php echo $vip1; ?></th>
		</tr>
	</table>
	</br>
	</br>
	<table class="data">
		<td><center><b>Statistiques des personnages :</b></center></td>
		<tr>
		<th><b>Personnages <?php echo $titre; ?> : </b> <?php echo $perso1; ?></th>
		</tr>
		<tr>	
		<th><b>Nombre de femelle: </b> <?php echo getNombreDeX($bdd,"sexe",1); ?></th>
		</tr>
		<tr>
		<th><b>Nombre de mâle: </b> <?php echo getNombreDeX($bdd,"sexe",1); ?></th>
		</tr>
		<tr>
		<th><b>Nombre de Féca: </b>	<?php echo getNombreDeX($bdd,"class",1); ?> </th>
		</tr>
		<tr>
		<th><b>Nombre de Osamodas: </b>	<?php echo getNombreDeX($bdd,"class",2); ?> </th>
		</tr>
		<tr>
		<th><b>Nombre de Enutrof: </b><?php echo getNombreDeX($bdd,"class",3); ?> </th>
		</tr>
		<tr>
		<th><b>Nombre de Sram: </b>	<?php echo getNombreDeX($bdd,"class",4); ?> </th>
		</tr>
		<tr>
		<th><b>Nombre de Xélor: </b> <?php echo getNombreDeX($bdd,"class",5); ?> </th>
		</tr>
		<tr>
		<th><b>Nombre de Ecaflip: </b> <?php echo getNombreDeX($bdd,"class",6); ?> </th>
		</tr>
		<tr>
		<th><b>Nombre de Eniripsa: </b>	<?php echo getNombreDeX($bdd,"class",7); ?> </th>
		</tr>
		<tr>
		<th><b>Nombre de Iop: </b> <?php echo getNombreDeX($bdd,"class",8); ?> </th>
		</tr>
		<tr>
		<th><b>Nombre de Crâ: </b><?php echo getNombreDeX($bdd,"class",9); ?> </th>
		</tr>
		<tr>
		<th><b>Nombre de Sadida: </b>	<?php echo getNombreDeX($bdd,"class",10); ?> </th>
		</tr>
		<tr>
		<th><b>Nombre de Sacrieur: </b>	<?php echo getNombreDeX($bdd,"class",11); ?> </th>
		</tr>
		<tr>
		<th><b>Nombre de Pandawa: </b> <?php echo getNombreDeX($bdd,"class",12); ?> </th>
		</tr>
		<tr>
		<th><b>Nombre de Zobal: </b> <?php echo getNombreDeX($bdd,"class",13); ?> </th>
		</tr>
	</table>
	</br>
	</br>
	</br>
	<table class="data">
		<td><center><b>Statistiques des Alignement :</b></center></td>
		<tr>
		<th><b>Nombre de Neutre: </b> <?php echo getNombreDeX($bdd,"alignement",0); ?></th>
		</tr>
		<tr>	
		<th><b>Nombre de Bontarien: </b> <?php echo getNombreDeX($bdd,"alignement",1); ?></th>
		</tr>
		<tr>
		<th><b>Nombre de Brakmarien: </b> <?php echo getNombreDeX($bdd,"alignement",2); ?></th>
		</tr>
		<tr>
		<th><b>Nombre de Sérianne: </b>	<?php echo getNombreDeX($bdd,"alignement",3); ?> </th>
		</tr>
	</table>
	</br>
	</br>
	</br>
	<table class="data">
		<td><center><b>RPG-paradize :</b></center></td>
		<tr>
			<th><b>Place : </b> <?php $syr = file_get_contents('http://www.rpg-paradize.com/site-elysium+Serveur+FUN+Zobal++items+2.02.62.9-'.$rpgcode.''); if (preg_match('#Position ([0-9]+)#', $syr, $Pos)) { echo $Pos[1]; }  ?></th>
		</tr>
		<tr>
			<th><b>Nombre de Vote Pour le Serveur : </b> <?php $srr = file_get_contents('http://www.rpg-paradize.com/site-elysium+Serveur+FUN+Zobal++items+2.02.62.9-'.$rpgcode.''); if (preg_match('#Vote : ([0-9]+)#', $srr, $vote)) { echo $vote[1]; }  ?></th>
		</tr>
		<tr>
			<th><b>Nombre de Clic : </b> <?php $str = file_get_contents('http://www.rpg-paradize.com/site-elysium+Serveur+FUN+Zobal++items+2.02.62.9-'.$rpgcode.''); 
			if (preg_match('#Clic Sortant : ([0-9]+)#', $str, $clics)) {
			echo $clics[1]; 
			}  ?></th>
		</tr>
	</table>
	</div>
</div>
<div class="bas"></div>
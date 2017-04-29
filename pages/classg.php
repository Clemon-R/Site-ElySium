<div class="barre"><p>Top Guilds</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
		<?php
		$top = $bdd->query("SELECT * FROM guilds ORDER BY xp DESC LIMIT 0, 50;");
		$position = 1;
		?>
		<table class="data">
		<tr>
			<th width="8"><b><center>Place</center></b></th>
			<th width="190"><b><center>Nom de la guilde</center></b></th>
			<th width="190"><b><center>Niveau</center></b></th>
			<th width="50"><b><center>Membre</center></b></th>
		</tr>
		<?php
		while ($reponse1 = $top->fetch())
		{
		$membre = $bdd->query("SELECT * FROM guild_members WHERE guild='".$reponse1['id']."';")->rowCount();
		?>
		<tr style="text-align: center;">
			<?php
			if ($position == 1) 
			{ echo "<td><img src='theme/officiel/img/position/".$position.".png' /></td>"; 
			}elseif ($position == 2) 
			{ echo "<td><img src='theme/officiel/img/position/".$position.".png' /></td>"; 
			}elseif ($position == 3) 
			{ echo "<td><img src='theme/officiel/img/position/".$position.".png' /></td>"; 
			}else{ echo "<td>".$position."</td>"; }
			?>
			<td><a><?php echo $reponse1['name']; ?></a></td>
		  <td><?php echo $reponse1['lvl']; ?></td>
		  <td><?php echo $membre; ?></td>
		</tr>
		<?php $position++; 
		}
		?>
				   </table>
		<?php
		if ($top->rowCount() == 0)
		{
		?>
		<table class="data">
			<tr>
				<center><th>Aucun Guilde Créé</th></center>
			</tr>
		</table>
		<?php } ?>
	</div>
</div>
<div class="bas"></div>
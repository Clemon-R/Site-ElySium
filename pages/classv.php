<div class="barre"><p>Accueil</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
		<?php
		$top = $bdd->query("SELECT * FROM accounts ORDER BY vote DESC LIMIT 0, 50;");
		$position = 1;
		?>
		<table class="data">
		<tr>
		  <th>Place</th>
		  <th>Pseudo</th>
		  <th>Nombre de votes</th>
		</tr>
		<?php
		while ($reponse1 = $top->fetch())
		{
		if ($reponse1['level'] == 0)
		{
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
		  <td><?php echo $reponse1['pseudo']; ?></td>
		  <td><?php echo $reponse1['vote']; ?></td>
		</tr>
		<?php $position++; } }?>
		</table>
	</div>
</div>
<div class="bas"></div>
<div class="barre"><p>Top Joueurs</p></div>
<center><img src="<?php echo base_url(); ?>theme/officiel/img/hr.png"/></center>
<div class="haut"></div>
<div class="fond">
	<div class="contenu">
	<table class="data">
	    <tr>
	      <th>Place</th>
	      <th>Nom du joueur</th>
	      <th>Classe/sexe</th>
	      <th>Niveau</th>
		  <th>Alignement</th>
		  <th>Honneur</th>
	    </tr>
		<?php
		$top = $bdd->query("SELECT * FROM personnages ORDER BY xp DESC LIMIT 0, 50;");
		while ($reponse1 = $top->fetch())
		{
		$compte = new Compte($bdd,0);
		if ($compte->GetInfosCompte($reponse1['account'],"level") == 0)
		{
		$position++;	
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
		  <td><img style="border-radius: 10px;" src="theme/officiel/img/class/<?php echo getImgClass($reponse1['class'],$reponse1['sexe']); ?>.png"></td>
	      <td><?php echo $reponse1['level']; ?></td>
		  <td><img style="border-radius: 10px;" src="theme/officiel/img/alignement/<?php echo getImgAlign($reponse1['alignement']); ?>.png"></td>
	      <td><?php echo $reponse1['honor']; ?></td>
	    </tr>
		<?php } } ?>
	   </table>
	  	</div>
</div>
<div class="bas"></div>
		<div id="haut"/> <!--Fond transparent-->
		<div id="barre_haut"><!--Barre du haut-->
			<?php 
			if (isset($_SESSION['login'])){ ?>
			<div class="infos_place">
				Salut, <?php echo $compte->pseudo; ?> vous avez <?php echo $compte->points; ?> points boutique.
				<a style="margin-left: 10px;" class="lien" href="index.php?page=profil">[Profil]</a>
			</div>
			<form action="index.php?page=deconnexion" method="POST"><input value="" type="submit" name="submit_logout" class="log_l"/></form>
			<?php
			}else{
			?>
			<div class="lien_place">
				<a class="lien" href="index.php?page=perte1"><img src="<?php echo base_url(); ?>theme/officiel/img/icon/16x16/key.png"/>Mot de passe oublié?</a>  <a class="lien" href="index.php?page=inscription"><img src="<?php echo base_url(); ?>theme/officiel/img/icon/16x16/user.png"/>Inscription</a>
			</div>
			<form action="index.php?page=connexion" method="POST">
				<div class="log_place">
					<input value="" placeholder="Nom de Compte" type="text"  name="login" class="log" required />
					<input value="" placeholder="Mot de Passe" type="password"  name="password" class="log" required />
				</div>
				<input value="" type="submit" name="submit_login" class="log_v"/>
			</form>
			<?php } ?>
		</div>
		<div id="logo"></div><!--Logo-->
		<div class="fond2">
			<a href="<?php echo base_url(); ?>upload/ElySium.exe"><div class="btn_tel"></div></a>
			<a href="<?php echo base_url(); ?>index.php?page=shop"><div class="btn_bou"></div></a>
			<a href="<?php echo base_url(); ?>index.php?page=jouer"><div class="btn_jouer"></div></a>
		</div>
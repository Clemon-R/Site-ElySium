						<div id="menu"><!--Menu-->
							<center><a href="<?php echo base_url(); ?>index.php?page=vote"><div class="lien_vote"></div></a></center>
							<div class="titre_generale"><?php echo $titre; ?></div>
							<div class="all">
								<a href="<?php echo base_url(); ?>index.php?page=accueil"><div class="lien">Acceuil</div></a>
								<a href="<?php echo base_url(); ?>index.php?page=equipe"><div class="lien">Staff ElySium</div></a>
								<a href="<?php echo base_url(); ?>index.php?page=rejoindre"><div class="lien">Nous Rejoindre</div></a>
							</div>
							<div class="titre_generale">Communautee</div>
							<div class="all">
								<?php if (isset($_SESSION['login'])){ ?> 
								<a href="../forum/"><div class="lien">Forum</div></a>
								<?php } ?>
								<a href="<?php echo base_url(); ?>index.php?page=information"><div class="lien">Informations</div></a>
								<a href="<?php echo base_url(); ?>index.php?page=video"><div class="lien">Video du moment</div></a>
								<a href="<?php echo base_url(); ?>index.php?page=top_voteur"><div class="lien">Top "Voteur"</div></a>
								<a href="<?php echo base_url(); ?>index.php?page=top_joueurs"><div class="lien">Top "Joueurs"</div></a>
								<a href="<?php echo base_url(); ?>index.php?page=top_guilds"><div class="lien">Top "Guildes"</div></a>
							</div>
							<div class="titre_generale">Mon Compte</div>
							<div class="all">
								<?php if (isset($_SESSION['login'])){ ?> 
								<a href="<?php echo base_url(); ?>index.php?page=profil"><div class="lien">Profil</div></a>
								<a href="<?php echo base_url(); ?>index.php?page=shop"><div class="lien">Boutique</div></a>
								<a href="<?php echo base_url(); ?>index.php?page=vip"><div class="lien">Devenir V.I.P</div></a>
								<a href="<?php echo base_url(); ?>index.php?page=vote"><div class="lien">Voter & Gagner des points</div></a>
								<a href="<?php echo base_url(); ?>index.php?page=points"><div class="lien">Acheter des points</div></a>
								<?php }else{ ?>
								<a href="<?php echo base_url(); ?>index.php?page=inscription"><div class="lien">Creer un compte</div></a>
								<?php } ?>
							</div>
							<div class="titre_generale">Support</div>
							<div class="all">
								<a href="<?php echo base_url(); ?>index.php?page=cgu"><div class="lien">C.G.U</div></a>
							<?php if (isset($_SESSION['login'])){ ?> 
								<a href="<?php echo base_url(); ?>index.php?page=contactsupport"><div class="lien">Support</div></a>
							<?php } ?>
							</div>
						</div>
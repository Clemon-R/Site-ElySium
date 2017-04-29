						<div id="module">
							<div class="infos">
								<div class="haut"></div>
								<div class="fond">
									<div class="text">
									<?php
									$nbr_joueur = $bdd->query("SELECT * FROM accounts;")->rowCount();
									$nbr_joueur_co = $bdd->query("SELECT * FROM accounts WHERE logged='1';")->rowCount();
									$pourcentage = ($nbr_joueur_co/200)*100;
									?>
									<font style="font-family: syntax5;">Serveur <?php if ($connec == true) { ?> <font color="#4d9840">En Ligne</font> <?php }else{ ?> <font color="red">Hors Ligne</font> <?php } ?></font><br>
									<br>
									<font style="font-family: syntax5;">Caractéristiques </font><br>
									<font style="font-family: syntax5;font-size: 12px;">&middot;&nbsp;&nbsp; Niveau de départ: 200 <br>
									&middot;&nbsp;&nbsp; Niveau maximal: 500 <br>
									&middot;&nbsp;&nbsp; Kamas de départ: 20M <br>					
									<br></font>
									<font style="font-family: syntax1;">Nombre de connecté</font>
										<div class="pb">
											<div class="pourcentage" style="width: <?php echo $pourcentage; ?>%;"></div><div class="text"><?php echo $nbr_joueur_co; ?>/200</div>
										</div>
									<br>
									<script type="text/javascript" src="http://www.abcompteur.com/cpt/?code=4/25/13218/6/1&ID=696679"></script><noscript><a href="http://www.abcompteur.com/">ABCompteur : compteur gratuit</a></noscript>									</div> 
								</div>
								<div class="bas"></div>
							</div>
							<div class="staff">
								<div class="haut"></div>
								<div class="fond">
									<div class="text">
									<?php
									$verif = false;
									$liste = $bdd->query("SELECT * FROM accounts WHERE logged='1';");
									while ($staff = $liste->fetch())
									{
										if ($staff['level'] > 0)
										{
										$verif = true;
										$color = "white";
										$rang = "aucun";
											if ($staff['level'] == 1)
											{
												$color = "#1cac19";
												$rang = "[Animateur en Test]";
											}elseif ($staff['level'] == 2)
											{
												$color = "1cac19";
												$rang = "[Animateur]";
											}elseif ($staff['level'] == 3)
											{
												$color = "blue";
												$rang = "[Modérateur]";
											}elseif ($staff['level'] == 4)
											{
												$color = "red";
												$rang = "[Community Manager]";
											}elseif ($staff['level'] == 5)
											{
												$color = "red";
												$rang = "[Créateur]";
											}
										echo "<font title='".$rang."' color='".$color."'>".$rang." ".$staff['pseudo']."</font></br>";
										}
									}
									if ($verif == false)
									{
										echo "Aucun membre du staff";
									}
									?>
									</div>
								</div>
								<div class="bas"></div>
							</div>
						</div>
						<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $facebook; ?>&amp;width=250&amp;height=258&amp;show_faces=true&amp;colorscheme=dark&amp;stream=false&amp;show_border=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:258px;" allowTransparency="true"></iframe>
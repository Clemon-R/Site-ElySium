<a href="anti_aspi.php"></a>
<?php 
require "config.php"; 
session_start();
require "fonction/anti_dos.php";
require "fonction/fonction.php";
require "connexion/login.php";
require "connexion/logout.php";
require "connexion/infos.php";
?>
<html>
<?php
$cache = 'cache/externe_infos.html';
$expire = time()-(60*60*2); // valable une heure
  
if(file_exists($cache) && filemtime($cache) > $expire)
{
	readfile($cache);
}
else
{
	ob_start(); // ouverture du tampon
	require "extension/infos_page.php"; ?>
<body>
	<div id="zone">
		<?php 
		$page = ob_get_contents(); // copie du contenu du tampon dans une chaîne
		ob_end_clean(); // effacement du contenu du tampon et arrêt de son fonctionnement
		file_put_contents($cache, $page) ; // on écrit la chaîne précédemment récupérée ($page) dans un fichier ($cache) 
		echo $page ; // on affiche notre page :D 
		}
		require "extension/haut.php";
		$cache = 'cache/core.html';		
		if(file_exists($cache) && filemtime($cache) > $expire)
		{
			readfile($cache);
		}
		else
		{
			ob_start(); // ouverture du tampon
		?>
			<div id="contenu">
			<div class="haut"></div>
				<div class="fond">
					<div id="droite">
						<?php
						$page = ob_get_contents(); // copie du contenu du tampon dans une chaîne
						ob_end_clean(); // effacement du contenu du tampon et arrêt de son fonctionnement
						file_put_contents($cache, $page) ; // on écrit la chaîne précédemment récupérée ($page) dans un fichier ($cache) 
						echo $page ; // on affiche notre page :D 
						}
						require "extension/menu.php"; 
						require "extension/module.php";
						require "extension/lien_externe.php"; ?>
					</div>
					<div id="page">
					<?php
					$pages = "404";
					if (empty($_GET['page'])) { $_GET['page'] = 'accueil'; }
					switch ($_GET['page'])
					{
					case 'accueil':
						$pages = "accueil";
						break;
						
					case 'jouer':
						$pages = "rejoindre";
						break;
						
					case 'rejoindre':
						$pages = "rejoindre";
						break;
						
					case 'inscription':
						$pages = "inscription";
						break;
						
					case 'cgu':
						$pages = "cgu";
						break;
						
					case 'equipe':
						$pages = "staff";
						break;
						
					case 'connexion':
						$pages = "login";
						break;
						
					case 'deconnexion':
						$pages = "logout";
						break;
						
					case 'information':
						$pages = "infos";
						break;
						
					case 'video':
						$pages = "video";
						break;
						
					case 'top_voteur':
						$pages = "classv";
						break;
						
					case 'top_joueurs':
						$pages = "classp";
						break;
					
					case 'top_guilds':
						$pages = "classg";
						break;
						
					case 'vote':
						$pages = "vote";
						break;
						
					case 'boutique':
						$pages = "boutique";
						break;
						
					case 'shop':
						$pages = "shop";
						break;
						
					case 'profil': 
						$pages = "profil";
						break;
						
					case 'points':
						$pages = "points";
						break;
						
					case 'hfbfkfgkffngoghgkfyzhffhfgkghhbbfkdjsgzyzilzh':
						$pages = "points-valide";
						break;
						
					case 'vip':
						$pages = "vip";
						break;
						
					case 'gclcrhcrvnjvrejnvrhtvrzkjmtrbhtbrgcrucuithuitfr':
						$pages = "vip-valide";
						break;
						
					case 'perte1':
						$pages = "mdp_oublie";
						break;
						
					default:
						$pages = "404";
						break;
						
					case 'contactsupport':
						$pages = "support";
						break;
						
					case 'contactsupportmess':
						$pages = "supportmess";
						break;

					case 'boutiqueitemjp':
						$pages = "boutiqueitemjp";
						break;

					case 'shoparmes':
						$pages = "shop_armes";
						break;

					case 'shopservice':
						$pages = "shop_service";
						break;

					case 'shopjeton':
						$pages = "shop_jeton";
						break;

					case 'jetonitemjp':
						$pages = "jeton_itemjp";
						break;

					case 'jetondivers':
						$pages = "jeton_divers";
						break;
					}
					if (!file_exists('pages/' . $pages . '.php')) $pages = '404';
					$contenu = 'pages/'.$pages.'.php';
					
					$cache = 'cache/'.$pages.'.html';
					$expire = time()-(60*30); // valable une heure
					  
					if(file_exists($cache) && filemtime($cache) > $expire)
					{
						readfile($cache);
					}
					else
					{
						if ($pages == "points" or $pages == "classg" or $pages == "classp" or $pages == "staff" or $pages == "rejoindre" or $pages == "cgu" or $pages == "accueil" or $pages == "infos" or $pages == "video" or $pages == "classv"){
						ob_start(); // ouverture du tampon
						include $contenu; 
						$page = ob_get_contents(); // copie du contenu du tampon dans une chaîne
						ob_end_clean(); // effacement du contenu du tampon et arrêt de son fonctionnement
						file_put_contents($cache, $page) ; // on écrit la chaîne précédemment récupérée ($page) dans un fichier ($cache) 
						echo $page ; // on affiche notre page :D 
						}else{
							include $contenu; 
						}
					}
					?>
					</div>
				</div>
			<div class="bas"></div>
			</div>
			<footer>
				<center>Copyright &copy; Design et Code by Clemon & Xxdarckxx- Tout droit réservè <?php echo date("Y"); ?></center>
			</footer>
	</div>
</body>
</html>
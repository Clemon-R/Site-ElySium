<?php
function CompletDate(){
	switch (date("n"))
	{
	case 1:
	$mois = "Janvier";
	break;
	case 2:
	$mois = "Février";
	break;
	case 3:
	$mois = "Mars";
	break;
	case 4:
	$mois = "Avril";
	break;
	case 5:
	$mois = "Mai";
	break;
	case 6:
	$mois = "Juin";
	break;
	case 7:
	$mois = "Juillet";
	break;
	case 8:
	$mois = "Août";
	break;
	case 9:
	$mois = "Septembre";
	break;
	case 10:
	$mois = "Octobre";
	break;
	case 11:
	$mois = "Novembre";
	break;
	case 12:
	$mois = "Décembre";
	break;
	}
	switch (date("D"))
	{
	case "Mon":
	$jour = "Lundi";
	break;
	case "Tue":
	$jour = "Mardi";
	break;
	case "Wed":
	$jour = "Mercredi";
	break;
	case "Thu":
	$jour = "Jeudi";
	break;
	case "Fri":
	$jour = "Vendredi";
	break;
	case "Sat":
	$jour = "Samedi";
	break;
	case "Sun":
	$jour = "Dimanche";
	break;
	}
	$date = $jour." ".date("j")." ".$mois." ".date("Y");
return $date;
}
function Heure(){
return date("H").":".date("i");
}
function base_url(){
  $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
  $protocol = $protocol . "://" . $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
  $a = explode("/", $protocol);
  $nbr = count($a);
  $protocol = str_replace("/".$a[$nbr-1], "", $protocol);
  return $protocol."/";
}
function syntax($message){
return preg_match("#^[a-zA-Z0-9]+$#i", $message);
}
function secu($var){
    return mysql_real_escape_string(htmlspecialchars($var));
}
function GetNumbreLigne($table){
$a = 0;
$a = $bdd->query("SELECT * FROM $table;")->rowCount();
return $a;
}
function GetPerso($id){
$a = null;
$verif = $bdd->query("SELECT * FROM personnages WHERE guid='$id';")->rowCount();
	if ($verif == 1)
	{
		$a = $bdd->query("SELECT * FROM personnages WHERE guid='$id';")->fetch();
	}
return $a;
}
function GetInfosPerso($id, $colone){
$a = null;
$verif = $bdd->query("SELECT * FROM personnages WHERE guid='$id';")->rowCount();
	if ($verif == 1)
	{
		$retour = $bdd->query("SELECT * FROM personnages WHERE guid='$id';")->fetch();
	}
return $retour[''.$colone.''];
}
function valide($text) {
$a = null;
$a = "<center><font color='green'>$text</font></center>";
echo $a;
}
function erreur($text) {
$a = null;
$a = "<center><font color='red'>$text</font></center>";
echo $a;
}
class Compte
{
	protected $bdd;
	protected $id;
	protected $compte = null;

	public function __construct() {
        $args = func_get_args();
        /*for( $i=0, $n=count($args); $i<$n; $i++ )
		{
            $this->add($args[$i]);
		}*/
		$this->connexion($args[0]);
		$this->add($args[1]);
    }
	public function add($id)
	{
		try
		{
			if (is_numeric($id)){
				$this->id = $id;
				$verif = $this->bdd->query("SELECT * FROM accounts WHERE guid='$id';")->rowCount();
				if ($verif == 1)
				{
					$this->compte = $this->bdd->query("SELECT * FROM accounts WHERE guid='$id';")->fetch();
				}
			}
		} catch (PDOException $e){
			echo 'PDO Exception Caught.<br />';
			echo 'Error with the database: <br />';
			echo '<pre>';
			echo 'Error: ' . $e->getMessage() . '<br />';
			echo 'Code: ' . $e->getCode() . '<br />';
			echo 'File: ' . $e->getFile() . '<br />';
			echo 'Line: ' . $e->getLine() . '<br />';
			echo 'Trace: ' . $e->getTraceAsString();
			echo '</pre>';
			exit;
		}
	}
	public function connexion($connexion) {
		$this->bdd = $connexion;
    }
	public function __get($infos) {
		try
		{
			if ($infos == "points" or $infos == "vip" or $infos == "level" or $infos == "jeton"){
			$id = $this->id;
				$verif = $this->bdd->query("SELECT * FROM accounts WHERE guid='$id';")->rowCount();
					if ($verif == 1)
					{
						$this->compte = $this->bdd->query("SELECT * FROM accounts WHERE guid='$id';")->fetch();
					}
			}
			return $this->compte[$infos];
		} catch (PDOException $e){
			echo 'PDO Exception Caught.<br />';
			echo 'Error with the database: <br />';
			echo '<pre>';
			echo 'Error: ' . $e->getMessage() . '<br />';
			echo 'Code: ' . $e->getCode() . '<br />';
			echo 'File: ' . $e->getFile() . '<br />';
			echo 'Line: ' . $e->getLine() . '<br />';
			echo 'Trace: ' . $e->getTraceAsString();
			echo '</pre>';
			exit;
		}
	}
	public function ndcCompte($user){
		try
		{
			$a = null;
			$name = substr($this->bdd->quote($user), 1, -1);
			$requete = $this->bdd->query("SELECT * FROM accounts WHERE account='$name';");
				if ($requete->rowCount() == 1){
					$this->compte = $requete->fetch();
					$a = true;
				}
			return $a;
		} catch (PDOException $e){
			echo 'PDO Exception Caught.<br />';
			echo 'Error with the database: <br />';
			echo '<pre>';
			echo 'Error: ' . $e->getMessage() . '<br />';
			echo 'Code: ' . $e->getCode() . '<br />';
			echo 'File: ' . $e->getFile() . '<br />';
			echo 'Line: ' . $e->getLine() . '<br />';
			echo 'Trace: ' . $e->getTraceAsString();
			echo '</pre>';
			exit;
		}
	}
	public function AddCompte($name,$pass,$pseudo,$email,$question,$reponse) {
		try
		{
			$name = substr($this->bdd->quote($name), 1, -1);
			$pass = substr($this->bdd->quote($pass), 1, -1);
			$pseudo = substr($this->bdd->quote($pseudo), 1, -1);
			$email = substr($this->bdd->quote($email), 1, -1);
			$question = substr($this->bdd->quote($question), 1, -1);
			$reponse = substr($this->bdd->quote($reponse), 1, -1);
			$stmt = $this->bdd->prepare("INSERT INTO accounts(account, pass, pseudo, email, question, reponse) VALUES (:name, :pass, :pseudo, :email, :question, :reponse);");
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':pass', $pass);
			$stmt->bindParam(':pseudo', $pseudo);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':question', $question);
			$stmt->bindParam(':reponse', $reponse);
			$stmt->execute();
		} catch (PDOException $e){
			echo 'PDO Exception Caught.<br />';
			echo 'Error with the database: <br />';
			echo '<pre>';
			echo 'Error: ' . $e->getMessage() . '<br />';
			echo 'Code: ' . $e->getCode() . '<br />';
			echo 'File: ' . $e->getFile() . '<br />';
			echo 'Line: ' . $e->getLine() . '<br />';
			echo 'Trace: ' . $e->getTraceAsString();
			echo '</pre>';
			exit;
		}
	}
	public function VerifieCompteExist($name,$pseudo) {
		try
		{
			$name = substr($this->bdd->quote($name), 1, -1);
			$pseudo = substr($this->bdd->quote($pseudo), 1, -1);
			$verif = $this->bdd->query("SELECT * FROM accounts WHERE account='$name';")->rowCount();
			$verif1 = $this->bdd->query("SELECT * FROM accounts WHERE pseudo='$pseudo';")->rowCount();
			if ($verif >= 1){
				return 1;
			}elseif ($verif1 >= 1){
				return 2;
			}elseif ($verif1 == 0 and $verif == 0){
				return 0;
			}
		} catch (PDOException $e){
			echo 'PDO Exception Caught.<br />';
			echo 'Error with the database: <br />';
			echo '<pre>';
			echo 'Error: ' . $e->getMessage() . '<br />';
			echo 'Code: ' . $e->getCode() . '<br />';
			echo 'File: ' . $e->getFile() . '<br />';
			echo 'Line: ' . $e->getLine() . '<br />';
			echo 'Trace: ' . $e->getTraceAsString();
			echo '</pre>';
			exit;
		}
	}
	public function GetInfosCompte($id, $colone){
		try
		{
			$retour = null;
			$colone = substr($this->bdd->quote($colone), 1, -1);
			if (is_numeric($id)){
			$verif = $this->bdd->query("SELECT * FROM accounts WHERE guid='$id';")->rowCount();
				if ($verif == 1)
				{
					$retour = $this->bdd->query("SELECT * FROM accounts WHERE guid='$id';")->fetch();
				}
			}else{
			$verif = $this->bdd->query("SELECT * FROM accounts WHERE account='$id';")->rowCount();
				if ($verif == 1)
				{
					$retour = $this->bdd->query("SELECT * FROM accounts WHERE account='$id';")->fetch();
				}
			}
			return $retour[$colone];
		} catch (PDOException $e){
			echo 'PDO Exception Caught.<br />';
			echo 'Error with the database: <br />';
			echo '<pre>';
			echo 'Error: ' . $e->getMessage() . '<br />';
			echo 'Code: ' . $e->getCode() . '<br />';
			echo 'File: ' . $e->getFile() . '<br />';
			echo 'Line: ' . $e->getLine() . '<br />';
			echo 'Trace: ' . $e->getTraceAsString();
			echo '</pre>';
			exit;
		}
	}
	public function ConnexionCompte($name,$pass){
		try
		{
			$retour = null;
			$name = substr($this->bdd->quote($name), 1, -1);
			$pass = substr($this->bdd->quote($pass), 1, -1);
			$verif = $this->bdd->query("SELECT * FROM accounts WHERE account='$name' and pass='$pass';")->rowCount();
				if ($verif == 1)
				{
					$retour = $this->bdd->query("SELECT * FROM accounts WHERE account='$name' and pass='$pass';")->fetch();
					$this->id = $retour['guid'];
				}
			return $retour;
		} catch (PDOException $e){
			echo 'PDO Exception Caught.<br />';
			echo 'Error with the database: <br />';
			echo '<pre>';
			echo 'Error: ' . $e->getMessage() . '<br />';
			echo 'Code: ' . $e->getCode() . '<br />';
			echo 'File: ' . $e->getFile() . '<br />';
			echo 'Line: ' . $e->getLine() . '<br />';
			echo 'Trace: ' . $e->getTraceAsString();
			echo '</pre>';
			exit;
		}
	}
	public function Vote($ip,$rpgcode,$points){
		try
		{
			$id = $this->id;
			$verif = $this->bdd->query("SELECT * FROM vote_ip WHERE ip='$ip';")->rowCount();
				if ($verif == 0){
					$this->bdd->query("INSERT INTO vote_ip(ip,vote) VALUES ('$ip', '0');");
				}
					$infos = $this->bdd->query("SELECT * FROM vote_ip WHERE ip='$ip';")->fetch();
					if ($infos['vote'] < time() && $this->compte['heurevote'] < time()){
						$vote = $this->compte['vote'] + 1;
						$heur = time() + (60*60*2);
						$points = $this->compte['points']+$points;
						$this->bdd->query("UPDATE accounts SET vote='$vote',heurevote='$heur',points='$points' WHERE guid='$id';");
						$this->bdd->query("UPDATE vote_ip SET vote='$heur' WHERE ip='$ip';");
						valide("Merci d'avoir Voté pour ElySium, vous avez maintenant $points Points !");
						echo"<script type='text/javascript'>window.location.replace('http://www.rpg-paradize.com/?page=vote&vote=$rpgcode');</script>";
					}else{
						erreur("Vous ne pouvez pas encore voter ! Vous avez voté il y a moins de 2 Heures !");
					}
		} catch (PDOException $e){
			echo 'PDO Exception Caught.<br />';
			echo 'Error with the database: <br />';
			echo '<pre>';
			echo 'Error: ' . $e->getMessage() . '<br />';
			echo 'Code: ' . $e->getCode() . '<br />';
			echo 'File: ' . $e->getFile() . '<br />';
			echo 'Line: ' . $e->getLine() . '<br />';
			echo 'Trace: ' . $e->getTraceAsString();
			echo '</pre>';
			exit;
		}
	}
}
function getNombreDeX($bdd,$colone,$classid){
	try
	{
	$a =  $bdd->query("SELECT * FROM personnages WHERE $colone='$classid';")->rowCount();
	return $a;
	} catch (PDOException $e){
	echo 'PDO Exception Caught.<br />';
	echo 'Error with the database: <br />';
	echo '<pre>';
	echo 'Error: ' . $e->getMessage() . '<br />';
	echo 'Code: ' . $e->getCode() . '<br />';
	echo 'File: ' . $e->getFile() . '<br />';
	echo 'Line: ' . $e->getLine() . '<br />';
	echo 'Trace: ' . $e->getTraceAsString();
	echo '</pre>';
	exit;
	}
}
function getImgClass($class,$sexe){
$a = "Inconnu";
if ($class == 1 && $sexe == 0)
{
	$a = "feca_m";
}elseif ($class == 1 && $sexe == 1)
{
	$a = "feca_f";
}elseif ($class == 2 && $sexe == 0)
{
	$a = "osamodas_m";
}elseif ($class == 2 && $sexe == 1)
{
	$a = "osamodas_f";
}elseif ($class == 3 && $sexe == 0)
{
	$a = "enutrof_m";
}elseif ($class == 3 && $sexe == 1)
{
	$a = "enutrof_f";
}elseif ($class == 4 && $sexe == 0)
{
	$a = "sram_m";
}elseif ($class == 4 && $sexe == 1)
{
	$a = "sram_f";
}elseif ($class == 5 && $sexe == 0)
{
	$a = "xelor_m";
}elseif ($class == 5 && $sexe == 1)
{
	$a = "xelor_f";
}elseif ($class == 6 && $sexe == 0)
{
	$a = "ecaflip_m";
}elseif ($class == 6 && $sexe == 1)
{
	$a = "ecaflip_f";
}elseif ($class == 7 && $sexe == 0)
{
	$a = "eniripsa_m";
}elseif ($class == 7 && $sexe == 1)
{
	$a = "eniripsa_f";
}elseif ($class == 8 && $sexe == 0)
{
	$a = "iop_m";
}elseif ($class == 8 && $sexe == 1)
{
	$a = "iop_f";
}elseif ($class == 9 && $sexe == 0)
{
	$a = "cra_m";
}elseif ($class == 9 && $sexe == 1)
{
	$a = "cra_f";
}elseif ($class == 10 && $sexe == 0)
{
	$a = "sadida_m";
}elseif ($class == 10 && $sexe == 1)
{
	$a = "sadida_f";
}elseif ($class == 11 && $sexe == 0)
{
	$a = "sacrieur_m";
}elseif ($class == 11 && $sexe == 1)
{
	$a = "sacrieur_f";
}elseif ($class == 12 && $sexe == 0)
{
	$a = "pandawa_m";
}elseif ($class == 12 && $sexe == 1)
{
	$a = "pandawa_f";
}elseif ($class == 13 && $sexe == 0)
{
	$a = "zob_m";
}elseif ($class == 13 && $sexe == 1)
{
	$a = "zob_f";
}
return $a;
}
function getImgAlign($id){
$a = "neutre";
if ($id == 1)
{
	$a = "bontarien";
}elseif ($id == 2) 
{
	$a = "brakmarien";
}elseif ($id == 3) 
{ 
	$a = "mercenaire";
}	
return $a;
}
function converType($type, $a,$b){
$t = hexdec($type);
$liste = "";
$valeur = "";
$c = explode("d",$a);
$verif = $c[1]+$b;
$verif1 = $b+$c[0];
if ($verif == $verif1)
{
	$valeur = $verif;
}else{
	$valeur = $verif1." à ".$verif;
}
switch ($t)
{
case 78:
$liste = "+".$valeur." Point(s) de mouvement(s)";
return $liste;
case 91:
$liste = "Vol de vie : ".$valeur." (Eau)";
return $liste;
case 92:
$liste = "Vol de vie : ".$valeur." (Terre)";
return $liste;
case 93:
$liste = "Vol de vie : ".$valeur." (Air)";
return $liste;
case 94:
$liste = "Vol de vie : ".$valeur." (Feu)";
return $liste;
case 95:
$liste = "Vol de vie : ".$valeur." (Neutre)";
return $liste;
case 96:
$liste = "Dommages : ".$valeur." (Eau)";
return $liste;
case 97:
$liste = "Dommages : ".$valeur." (Terre)";
return $liste;
case 98:
$liste = "Dommages : ".$valeur." (Air)";
return $liste;
case 99:
$liste = "Dommages : ".$valeur." (Feu)";
return $liste;
case 100:
$liste = "Dommages : ".$valeur." (Neutre)";
return $liste;
case 101:
$liste = "Retrait ".$valeur." Points d'actions";
return $liste;
case 110:
$liste = "+".$valeur." Vitalité";
return $liste;
case 111:
$liste = "+".$valeur." Point(s) d'action(s)";
return $liste;
case 112:
$liste = "+".$valeur." Dommages";
return $liste;
case 114:
$liste = $valeur." Dommage * 2";
return $liste;
case 115:
$liste = "+".$valeur." Coup Critiques";
return $liste;
case 116:
$liste = "-".$valeur." Portée";
return $liste;
case 117:
$liste = "+".$valeur." Portée";
return $liste;
case 118:
$liste = "+".$valeur." Force";
return $liste;
case 119:
$liste = "+".$valeur." Agilité";
return $liste;
case 120:
$liste = "+".$valeur." Points d'actions";
return $liste;
case 122:
$liste = "+".$valeur." Echec Critiques";
return $liste;
case 123:
$liste = "+".$valeur." Chance";
return $liste;
case 124:
$liste = "+".$valeur." Sagesse";
return $liste;
case 125:
$liste = "+".$valeur." Vitalité";
return $liste;
case 126:
$liste = "+".$valeur." Intelligence";
return $liste;
case 127:
$liste = "-".$valeur." Point(s) de mouvement(s)";
return $liste;
case 128:
$liste = "+".$valeur." Point(s) de mouvement(s)";
return $liste;
case 138:
$liste = "+".$valeur." Puissance";
return $liste;
case 145:
$liste = "-".$valeur." Dommage(s)";
return $liste;
case 152:
$liste = "-".$valeur." Chance";
return $liste;
case 153:
$liste = "-".$valeur." Vitalité";
return $liste;
case 154:
$liste = "-".$valeur." Agilité";
return $liste;
case 155:
$liste = "-".$valeur." Intelligence";
return $liste;
case 156:
$liste = "-".$valeur." Sagesse";
return $liste;
case 157:
$liste = "-".$valeur." Force";
return $liste;
case 158:
$liste = "+".$valeur." Pods";
return $liste;
case 159:
$liste = "-".$valeur." Pods";
return $liste;
case 160:
$liste = "+".$valeur." % d'esquiver la perte de PA";
return $liste;
case 161:
$liste = "+".$valeur." % d'esquiver la perte de PM";
return $liste;
case 162:
$liste = "-".$valeur." % d'esquiver la perte de PA";
return $liste;
case 163:
$liste = "-".$valeur." % d'esquiver la perte de Pm";
return $liste;
case 168:
$liste = "-".$valeur." PA";
return $liste;
case 169:
$liste = "-".$valeur." PM";
return $liste;
case 171:
$liste = "-".$valeur." Coup Critiques";
return $liste;
case 174:
$liste = "+".$valeur." Initiative";
return $liste;
case 175:
$liste = "-".$valeur." Initiative";
return $liste;
case 176:
$liste = "+".$valeur." Prospection";
return $liste;
case 177:
$liste = "-".$valeur." Prospection";
return $liste;
case 178:
$liste = "+".$valeur." Soin";
return $liste;
case 179:
$liste = "-".$valeur." Soin";
return $liste;
case 182:
$liste = "+".$valeur." Créature(s) Invocable(s)";
return $liste;
case 210:
$liste = "+".$valeur." % Résistance Force";
return $liste;
case 211:
$liste = "+".$valeur." % Résistance Chance";
return $liste;
case 212:
$liste = "+".$valeur." % Résistance Agilité";
return $liste;
case 213:
$liste = "+".$valeur." % Résistance Intelligence";
return $liste;
case 214:
$liste = "+".$valeur." % Résistance Neutre";
return $liste;
case 215:
$liste = "-".$valeur." % Résistance Force";
return $liste;
case 216:
$liste = "-".$valeur." % Résistance Chance";
return $liste;
case 217:
$liste = "-".$valeur." % Résistance Agilité";
return $liste;
case 218:
$liste = "-".$valeur." % Résistance Intelligence";
return $liste;
case 219:
$liste = "-".$valeur." % Résistance Neutre";
return $liste;
case 220:
$liste = $valeur." Renvoie Dommages";
return $liste;
case 225:
$liste = "+".$valeur." Dommages au piéges";
return $liste;
case 226:
$liste = "+".$valeur." Puissance (Pièges)";
return $liste;
case 240:
$liste = "+".$valeur." Résistances Force";
return $liste;
case 241:
$liste = "+".$valeur." Résistances Chance";
return $liste;
case 242:
$liste = "+".$valeur." Résistances Agilité";
return $liste;
case 243:
$liste = "+".$valeur." Résistances Intelligence";
return $liste;
case 244:
$liste = "+".$valeur." Résistances Neutre";
return $liste;
case 245:
$liste = "-".$valeur." Résistances Force";
return $liste;
case 246:
$liste = "-".$valeur." Résistances Chance";
return $liste;
case 247:
$liste = "-".$valeur." Résistances Agilité";
return $liste;
case 248:
$liste = "-".$valeur." Résistances Intelligence";
return $liste;
case 249:
$liste = "-".$valeur." Résistances Neutre";
return $liste;
default:
$liste = $valeur." Inconnu";
}
return $liste; 
}
function decryptStats($stat)
{
$liste_type = "";
	if ($stat != "")
	{
	$stats = explode(",", $stat);
	$a = 0;
		while ($a < count($stats))
		{
		$infos = explode("#",$stats[$a]);
		$type = $infos[0];
		$val = explode("+",$infos[4]);
		$liste_type = $liste_type.converType($type,$val[0],$val[1])."</br>";
		$a++;
		}
	}
	return $liste_type;
}
?>
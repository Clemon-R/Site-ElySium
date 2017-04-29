<?php
if (isset($_SESSION['login'])){
$compte = new Compte($bdd,$_SESSION['guid']);
}
?>
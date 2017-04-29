<?php
    $fichier=".htaccess";
    $fp=fopen("../$fichier","a");
    //Votre adresse IP de connexion à Internet
    $ip_simple = $_SERVER['REMOTE_ADDR'];
    fputs($fp," deny from $ip_simple\n");
    fclose($fp);
?>
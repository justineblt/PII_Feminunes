<?php

try
{
    $bdd= new PDO ("mysql:host=localhost;dbname=tacos_quiz;charset=utf8","admin", "laurajustine", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    // On teste si une entrée de la bdd contient ce pseudo/
    
}

catch (Exception $e) 
{
	die('Erreur fatale : '.$e->getMessage());
}

?>
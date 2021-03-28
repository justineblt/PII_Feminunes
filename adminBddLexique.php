
<?php
session_start();
include ('tryandcatch.php');

//Insertion dans la BDD d'un mot du lexique
$requete = $bdd->prepare("INSERT INTO lexique(mot, definition) VALUES (:lemot, :ladefinition)");
$lmot = $_POST['motdef'];
$ldef = $_POST['def'];

$requete -> bindValue('lemot',$lmot, PDO::PARAM_STR);
$requete -> bindValue('ladefinition',$ldef, PDO::PARAM_STR);

$requete->execute();

header('Location:reussiteAdmin.php');

?>
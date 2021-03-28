<?php 
session_start();
include ('tryandcatch.php');

//Insertion dans la BDD d'un article 
$requete2 = $bdd->prepare("INSERT INTO article(titre, nompage, theme, couverture, contenu) VALUES (:letitre, :lenompage, :letheme, :lacouverture, :lecontenu)");
$ltitre = $_POST['titre'];
$lnompage = $_POST['nompage'];
$ltheme = $_POST['theme'];
$lcouv = $_POST['imgcouv'];
$lcontenu = $_POST['contenu'];


$requete2 -> bindValue('letitre',$ltitre, PDO::PARAM_STR);
$requete2 -> bindValue('lenompage',$lnompage, PDO::PARAM_STR);
$requete2 -> bindValue('letheme',$ltheme, PDO::PARAM_STR);
$requete2 -> bindValue('lacouverture',$lcouv, PDO::PARAM_STR);
$requete2 -> bindValue('lecontenu',$lcontenu, PDO::PARAM_STR);

$requete2->execute();

header('Location:reussiteAdmin.php');
?>
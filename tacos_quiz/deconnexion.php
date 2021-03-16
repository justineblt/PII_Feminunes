<?
session_start();
session_unset(); //efface les variable session
session_destroy();//détruit la session
$_SESSION=null; //pour être bien sur
header('Location:Accueil.php')

?>

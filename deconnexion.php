<?php
session_start();
session_unset(); //efface les variable session
session_destroy();//détruit la session
header('Location:accueil.php');
exit();
?>
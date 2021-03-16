<?php
// require("session.class.php");


require_once 'tryandcatch.php';

if (!empty($_POST['login']) and !empty($_POST['mdp']))
	{ 
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $requete = $bdd->prepare("SELECT * FROM admin WHERE login=? AND mdp=?");
        $requete->execute(array($login, $mdp));
        if ($requete->rowCount() ==1 )
        {
            $_SESSION['login']=$login;
            header('Location:modeadmin.php');	
            exit();
        }

        else 
        {
            // msg_erreur('Erreur','Veuillez réessayer.');
        $showmodalerror=true;
        
        }
    }



?>
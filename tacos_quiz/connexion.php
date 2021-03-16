<?php 
session_start();
require("session.class.php");
$Session = new Session();

include ('trycatch.php');

if (empty($_POST['login']) or empty($_POST['mdp']))
	{ 
    $Session->setFlash('Veuillez remplir tous les champs.');
	header('Location:Identification.php');	
    exit();
    }
else {
    if ($_POST['login']&&$_POST['mdp']) //reste a rediriger selon joueur ou administrateur mais easy ça 
		{
            $requete = $bdd -> prepare("SELECT COUNT(*) FROM utilisateur WHERE Login=? and Mdp=?");
            $requete->execute( array($_POST['login'],
            $_POST['mdp']));
            $nombre = $requete->fetchColumn(); // Compte le nombre de fois ou dans la table Login et mdp correspondent
            if ($nombre==1)
            {
                $_SESSION['login']=$_POST['login'];
                $_SESSION['mdp']=$_POST['mdp'];
                $requete2 = $bdd -> prepare("SELECT Type_Utili FROM utilisateur WHERE Login=? and Mdp=?");
                $requete2->execute( array($_POST['login'],
                $_POST['mdp']));
                $donnee = $requete2->fetch();
                if ($donnee['Type_Utili']=='A') //avec la session permet de gérer en fonction de joueur/administrateur
                    {
                        $_SESSION['TypeUtili']='Admin';
                    }
                    else
                    {
                        $_SESSION['TypeUtili']='Joueur';
                    }
                header('Location: LesQuizs.php');
                exit();// exit après redirection, on a redirigé l'utilisateur donc pas besoin de lire le code en dessous.
            }
            else 
            {
                $Session->setFlash('Utilisateur non reconnu. Veuillez vous inscrire avant.');
                header('Location:Identification.php');	
            } 
        }
	}
?>
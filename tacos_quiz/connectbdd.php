

<?php 

require("session.class.php");
$Session = new Session();


include ('trycatch.php');


if (empty($_POST['login']) or empty($_POST['mdp']) or ($_POST['TypeUt']=="Type d'utilisateur"))
	{ $Session->setFlash('Veuillez remplir tous les champs.');
	header('Location:Inscription.php');	
	exit();}
else {
		if ($_POST['TypeUt']=="Joueur")
		{
			$req = $bdd->prepare('INSERT INTO utilisateur(Login, Mdp, Type_Utili) VALUES(?, ?, "J")');
			$req->execute(array(
			$_POST['login'], 
			$_POST['mdp']
			));
			$_SESSION['login']=$_POST['login'];
			$_SESSION['mdp']=$_POST['mdp'];
			$_SESSION['TypeUtili']='Joueur';

			header('Location: LesQuizs.php');
  			exit();
		}
		else if ($_POST['TypeUt']=="Administrateur")
		{
			$req = $bdd->prepare('INSERT INTO utilisateur(Login, Mdp, Type_Utili) VALUES(?, ?, "A")');
			$req->execute(array(
			$_POST['login'], 
			$_POST['mdp']
			));
			$_SESSION['login']=$_POST['login'];
			$_SESSION['mdp']=$_POST['mdp'];
			$_SESSION['TypeUtili']='Admin';
			header('Location: LesQuizs.php');
  			exit();
		}	
	}
?>
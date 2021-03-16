<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="Style.css"> 
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
</head>
  
<body>


<?php
if($_SESSION['TypeUtili']=='Joueur')
{
  include ('MenuJoueur.php');
}
else
{
  include ('MenuAdmin.php');
}
include ('trycatch.php');
$_SESSION['num_questionnaire'];
$_SESSION['login'];
$_SESSION['mdp'];

$requete = $bdd -> prepare("SELECT Num_Utili FROM utilisateur WHERE Login=? and Mdp=?");
$requete->execute( array($_SESSION['login'],$_SESSION['mdp']));
$donnees1=$requete->fetch();
          
$requete2 = $bdd->prepare('INSERT INTO partie(Num_Utili, Num_Questionnaire, Nb_Points, Temps) VALUES(?, ?,?, "0")');
$requete2->execute(array(
			$donnees1['Num_Utili'], 
      $_SESSION['num_questionnaire'],
      $_GET['score'],
			));

$requete3 = $bdd -> prepare("SELECT MAX(Nb_Points) as max FROM partie WHERE Num_Utili=?");
$requete3->execute( array($donnees1['Num_Utili']));
$donnees2=$requete3->fetch();

 ?>


 <section class="body">   
 
<a href="Accueil2.php"><img class="tacosquiz" src="Images/tacosquiz.png"></a> 
 
    <section class="conteneur1">

<div id="conteneur">
	<div class="colonne1"> <img class="moutarde" src="Images/moutarde.png"> </div>
    <div class="colonne2bis"> <h2> QUIZ <? echo $_SESSION['titre'];?></h2></div>
	<div class="colonne3"> <img class="ketchup" src="Images/ketchup.png"> </div>
</div>
<hr/>
<h3> Fin de partie ! </h3>


<section class="conteneur2"> 
<br/>
<p class="resultat"> Résultats </p>
<br/>
<div class="ligne">
           <div class="preinfos"> Points : </div><div class="texteinfos"> <?php echo $_GET['score']; ?> / 100  </div><hr/>
           <div class="preinfos"> Temps : </div> <div class="texteinfos">02 : 18 s</div>
</div>


</section>

<div class="finpartiecolonne">
   
    <img src="Images/sadtacos.png" height="30%" width="30%">
 
    <div id="colf1">
    <h2> Oh non, </h2> <p> Tu as eu moins de 80% de bonnes réponses. Essaie encore !<br/>
    <p> Score à battre : <?php echo $donnees2['max']; ?> / 100, qui est ta meilleure performance toutes parties confondues.</p>

    </div>
</div>
<hr/>

<form action="LesQuizs.html" method="post">
 
  <br/>
  <input type="submit" value="Rejouer" class="boutonjouer"/>
      </form>


</section>
<br/>
<br/> 

  
<section class="footer">

<div class='aide'>
<a href="Video.php">
Besoin d'aide? Par ici le mode d'emploi... </a>
</div>

<br/>
<br/>

Créé par Justine Bulteau et Laura Scolan 

<br/>

<br/> 
<br/> 
<br/>

</section>
   
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>

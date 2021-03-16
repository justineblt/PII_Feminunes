<!DOCTYPE html>
<html>

<head>   
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="Style.css">  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
</head>
  
<body>


<?php
session_start();
if($_SESSION['TypeUtili']=='Joueur')
{
  include ('MenuJoueur.php');
}
else
{
  include ('MenuAdmin.php');
}
?>

 <section class="body">   
 
<a href="Accueil2.php"><img class="tacosquiz" src="Images/tacosquiz.png"></a> 
 
    <section class="conteneur1">

<div id="conteneur">
	<div class="colonne1"> <img class="moutarde" src="Images/moutarde.png"> </div>
	<div class="colonne2"> <h2> C'est parti! </h2> </div>
	<div class="colonne3"> <img class="ketchup" src="Images/ketchup.png"> </div>
</div>
<hr/>
<br/>

<?php
$theme = $_GET['quiz']; // Avec cette ligne, on récupère le thème qui a été selectionné sur la page précédente (Page de choix du quiz). L'info est transmise via l'URL. 
if ($theme == 'En construction...') //Si un quiz en construction est sélectionné, on revient sur la page quiz. Bien tenté petit filou :D 
{
  header('Location:LesQuizs.php');
}
?>

<div id="conteneur">
         <div class="colonne1"> <a href="LesQuestions.php?info=F<?php echo $theme?>"> <button type="button" class="boutonautre" name="niveau"> Facile </button> </a> </div> 
         <div class="colonne2"> <a href="LesQuestions.php?info=M<?php echo $theme?>"> <button type="submit" class="boutonautre"name="niveau"> Moyen </button> </a> </div>
         <div class="colonne2"> <a href="LesQuestions.php?info=D<?php echo $theme?>"> <button type="submit" class="boutonautre" name="niveau"> Difficile </button> </a> </div>
    
</div>
      </section>

<br/>
<br/> 
  </section>
  
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

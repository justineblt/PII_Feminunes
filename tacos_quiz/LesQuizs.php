<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="Style.css">   
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

 ?>

 <section class="body">   
 
<a href="Accueil2.php"><img class="tacosquiz" src="Images/tacosquiz.png"></a> 
 
    <section class="conteneur1">

<div id="conteneur">
	<div class="colonne1"> <img class="moutarde" src="Images/moutarde.png"> </div>
	<div class="colonne2"> <h1> Les Quizs </h1> </div>
  <div class="colonne3"> <img class="ketchup" src="Images/ketchup.png"> </div>
</div>
<hr/>
<br/>

<?php
include ('trycatch.php');

$nombre = $bdd -> prepare("SELECT theme FROM questionnaire GROUP BY theme");
$nombre->execute(); // le numéro de question dans la bdd vaut k + 1, car les indices de tableau commencent à 0 et non à 1. 
while ($donnees2 = $nombre->fetch())
{
  $theme[]= $donnees2['theme']; // je récupère tous les thèmes dans un tableau pour plus tard pouvoir ajouter les questionnaires.

}

?>

<div class="contenant">
  <div class="ligne">
    <div class="iconequiz"> 
    <a href="ChoixNiveau.php?quiz=tacosquiz">
      <h3 class="titre">  The Tacos quiz!  </h3> 
      <img class="theme" src="Images/themes/tacosquiz.jpg" width="300" height="200"/> </a>
    </div>
    <div class="iconequiz"> 
    <a href="ChoixNiveau.php?quiz=rues">
      <h3 class="titre"> Les Rues célèbres </h3> 
      <img class="theme" src="Images/themes/rues.jpg" width="300" height="200"/> </a>
    </div>
    <div class="iconequiz"> 
    <a href="ChoixNiveau.php?quiz=disney">
      <h3 class="titre"> Disney </h3> 
      <img class="theme" src="Images/themes/disney.jpg" width="300" height="200"/> </a>
    </div>
  </div>
    
  <div class="ligne">
    <div class="iconequiz"> 
    <a href="ChoixNiveau.php?quiz=blob">
      <h3 class="titre"> Blob </h3> 
      <img class="theme" src="Images/themes/blob.jpeg" width="300" height="200"/> </a>
    </div>
    <div class="iconequiz"> 
    <a href="ChoixNiveau.php?quiz=ecohabitat">
      <h3 class="titre"> Ecohabitat </h3> 
      <img class="theme" src="Images/themes/ecohabitat.jpg" width="300" height="200"/> </a>
    </div>
    <div class="iconequiz"> 
    <a href="ChoixNiveau.php?quiz=suffragette">
      <h3 class="titre"> Suffragettes </h3> 
      <img class="theme" src="Images/themes/suffragettes.jpg" width="300" height="200"/> </a>
    </div>
  </div>
</div>

<?php if (count($theme)>=7)
    {
      ?>  <div id="accordion" class="panel-group">
      <div class="panel panel-default">
      <div id="headingOne" class="panel-heading">
      <p class="panel-title"><a class="ajouter_question" href="#collapseOne" data-toggle="collapse" data-parent="#accordion"> <input type="submit" value="+" class="boutontheme"/> <br/>  <b> </b></a></p>
  </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">

      <div class="ligne">
    <div class="iconequiz"> 
    <a href="ChoixNiveau.php?quiz=<?php if (count($theme)>=7) { echo $theme[6];} else { echo ('En construction...');} ?>">
      <h3 class="titre"> <?php if (count($theme)>=7) { echo $theme[6];} else { echo ('En construction...');} ?> </h3> 
      <img class="theme" src="Images/themes/tacosquiz.jpg" width="300" height="200"/> </a>
    </div>
    <div class="iconequiz"> 
    <a href="ChoixNiveau.php?quiz=<?php if (count($theme)>=8) { echo $theme[7];} else { echo ('En construction...');} ?>">
      <h3 class="titre"> <?php if (count($theme)>=8) { echo $theme[7];} else { echo ('En construction...');} ?> </h3> 
      <img class="theme" src="Images/themes/tacosquiz.jpg" width="300" height="200"/> </a>
    </div>
    <div class="iconequiz"> 
    <a href="ChoixNiveau.php?quiz=<?php if (count($theme)>=9) { echo $theme[8];} else { echo ('En construction...');} ?>">
      <h3 class="titre"> <?php if (count($theme)>=9) { echo $theme[8];} else { echo ('En construction...');} ?> </h3> 
      <img class="theme" src="Images/themes/tacosquiz.jpg" width="300" height="200"/> </a>
    </div>
  </div>
</div>
        <br/>
        <?php if (count($theme)>=10)
    {
      ?>  <div id="accordion" class="panel-group">
      <div class="panel panel-default">
      <div id="headingTwo" class="panel-heading">
      <p class="panel-title"><a class="ajouter_question" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion"> <input type="submit" value="+" class="boutontheme"/> <br/>  <b> </b></a></p>
  </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">

      <div class="ligne">
    <div class="iconequiz"> 
    <a href="ChoixNiveau.php?quiz=<?php if (count($theme)>=10) { echo $theme[9];} else { echo ('En construction...');} ?>">
      <h3 class="titre"> <?php if (count($theme)>=10) { echo $theme[9];} else { echo ('En construction...');} ?> </h3> 
      <img class="theme" src="Images/themes/tacosquiz.jpg" width="300" height="200"/> </a>
    </div>
    <div class="iconequiz"> 
    <a href="ChoixNiveau.php?quiz=<?php if (count($theme)>=11) { echo $theme[10];} else { echo ('En construction...');} ?>">
      <h3 class="titre"> <?php if (count($theme)>=11) { echo $theme[10];} else { echo ('En construction...');} ?> </h3> 
      <img class="theme" src="Images/themes/tacosquiz.jpg" width="300" height="200"/> </a>
    </div>
    <div class="iconequiz"> 
    <a href="ChoixNiveau.php?quiz=<?php if (count($theme)>=12) { echo $theme[11];} else { echo ('En construction...');} ?>">
      <h3 class="titre"> <?php if (count($theme)>=12) { echo $theme[11];} else { echo ('En construction...');} ?> </h3> 
      <img class="theme" src="Images/themes/tacosquiz.jpg" width="300" height="200"/> </a>
    </div>
  </div>
</div>
        <br/>

        </div>
        </div>
        </div>
        </div> <?php
    }
?>
        </div>
        </div>
        </div>
        </div> <?php
    }
?>


       
        

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

<?php
require("session.class.php");
$Session = new Session();
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

//--------------SUPPRESSION D'UNE QUESTION--------------
if (isset($_POST['questi'])) 
{
   
    $req = $bdd->prepare('DELETE FROM questions WHERE Num_Question = "'.$_POST['questi'].'"');
    $req2 = $bdd->prepare('DELETE FROM reponses WHERE Num_Question = "'.$_POST['questi'].'"');
    $req2->execute();
	$req->execute();
  
}
//--------------FIN SUPPRESSION D'UNE QUESTION--------------





?>


 <section class="body">   
 
 <a href="Accueil2.php"><img class="tacosquiz" src="Images/tacosquiz.png"></a>
 
 
    <section class="conteneur1">

<div id="conteneur">
	<div class="colonne1"> <img class="moutarde" src="Images/moutarde.png"> </div>
	<div class="colonne2"> <h2> Bien joué, votre action a été prise en compte ! </h2> </div>
	<div class="colonne3"> <img class="ketchup" src="Images/ketchup.png"> </div>
	
</div>
<hr/>

<br/>
        <a href="Gestion.php">
            <button type="button" class="boutonjouer">  Retourner au menu gestion  </button>
        </a>
		<br/>
<img class="gif" src="Images/tete.gif">
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


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
<?php $Session->flash();?>

<?php
include ('Boutonconnexion.php'); ?>


 <section class="body">   
 
<a href="Accueil.php"><img class="tacosquiz" src="Images/tacosquiz.png"></a> 
 
    <section class="conteneur1">

	<img class="happytacos" src="Images/happytacos.png"> 
	<h2 class="inscription"> Connexion </h2> 

<hr/>



<form action="connexion.php" method="post">

<section class="conteneur2"> 
<br/>
    <div>
        <label class ="barretexte" for="login"> Login : </label>
        <input type="text" name="login"> </div>

       <div class="listederoulante"> 
       
    </div>
   


<hr/>

    <div>
        <label class="barretexte" for="mdp"> Mot de passe : </label>
        <input type="password" name="mdp"> </div>
    
</section>

<br/>
<br/>
       
            <button type="submit" class="boutonjouer">  GO !  </button>
            </form>

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

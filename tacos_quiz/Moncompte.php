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
include ('trycatch.php');


$requete = $bdd->query('SELECT MAX(Nb_Points) as bestscore FROM partie, utilisateur WHERE partie.Num_Utili=utilisateur.Num_Utili');
$points = $requete->fetch();

//malheureusement la variable temps n'a pas pu être codée
$requete2 = $bdd->query('SELECT MIN(Temps) as besttemps FROM partie, utilisateur WHERE partie.Num_Utili=utilisateur.Num_Utili');
$temps = $requete2->fetch();
//tristesse

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
    
        <img src="Images/happytacos.png" height="15%" width="15%">
        <div class="moncompte"><h1>Mon compte</h1></div>
    
       
        </div>


</div>
<div class="infos">
    <div class="ligne">
        <img src="Images/ketchup.png" height="05%" width="05%">
        <h4>Informations personnelles</h4><br></div>

        
        <div class="ligne">
            <div class="preinfos"> Login : </div><div class="texteinfos"><?php echo $_SESSION['login']; ?></div><hr/>
            <div class="preinfos"> Mot de passe : </div><div class="texteinfos"><?php echo $_SESSION['mdp']; ?></div>
        </div>

        <hr/>
        <div class="ligne">
                <img src="Images/moutarde.png" height="05%" width="05%">
                <h4>Statistiques joueur</h4><br></div>
        
                
                <div class="ligne">
                    <div class="preinfos"> Best score : </div><div class="texteinfos"><?php echo $points['bestscore']; ?> points</div><hr/>
                    <div class="preinfos"> Best temps : </div><div class="texteinfos"> pas encore disponible...</div>
                </div>
                
    </div> 
        
</div>
<br/>
        
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

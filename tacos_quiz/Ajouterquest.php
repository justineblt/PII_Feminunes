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
<?php $Session->flash();
if($_SESSION['TypeUtili']=='Joueur')
{
  include ('MenuJoueur.php');
}
else
{
  include ('MenuAdmin.php');
}
include ('trycatch.php');


?>

 <section class="body">   
 
<a href="Accueil2.php"><img class="tacosquiz" src="Images/tacosquiz.png"></a> 
 
    <section class="conteneur1">

<div id="conteneur">
	<div class="colonne1"> <img class="moutarde" src="Images/moutarde.png"> </div>
	<div class="colonne2"> <h2> Ajouter une question </h2> </div>
	<div class="colonne3"> <img class="ketchup" src="Images/ketchup.png"> </div>
</div>
<hr/>



<section class="conteneur2"> 
<br/>

      <form action="Ajouterquest2.php" method="post">
      
        <label class ="barretexte" for="question"> <b> Question : </b> </label>
          <input type="text" name="question" size="80">
           <br/>
         <br/> <br/>
         
    <label class ="barretexte" for="theme"> <b> Thème associé</b> </label>

<select name="theme">
<?php 
      $requete = $bdd->query('SELECT * FROM questionnaire WHERE Difficulte="F"');
      while($ligne = $requete->fetch())
      {?>
        <option value=<?php echo $ligne['Num_Questionnaire'];?>><?php echo $ligne['theme'];?> </option>
        <?php   
      } 
    
      ?>
   </select>
<br/>
   <label class ="barretexte" for="theme"> <b> Réponse : </b> </label>
  <br/>

  <section class="colonnes">		
      <div class="col1"> <img class="tacoscreerquest" src="Images/happytacos.png" alt="YESSSS">  </div> 
      <div class="col2"> <input type="radio" name=typerep value="q_ouverte"> Ouverte <br/> 
        <textarea name="reponse" rows="2" cols="20" placeholder="Saisir la réponse"></textarea>
        </div>

      <div class="col3">  <input type="radio" name="typerep" value="q_qcm"> QCM <br/> 
        <input type="text" name="rep1" size="10" placeholder="Réponse 1"> <select name="valeur1"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep2" size="10"placeholder="Réponse 2"> <select name="valeur2"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep3" size="10" placeholder="Réponse 3"> <select name="valeur3"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep4" size="10" placeholder="Réponse 4"><select name="valeur4"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
      </div>
      
      <div class="col4">  <input type="radio" name="typerep" value="q_unique"> Choix unique <br/> 
      <input type="text" name="rep5" size="10" placeholder="Réponse 1"> <select name="valeur5"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep6" size="10"placeholder="Réponse 2"> <select name="valeur6"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep7" size="10" placeholder="Réponse 3"> <select name="valeur7"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep8" size="10" placeholder="Réponse 4"><select name="valeur8"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>
      </div>
    
    </section><br/>
    <hr/>
<br/>


 
  <input type="submit" value="Envoyer" class="boutonjouer"/>
      </form>

</section>
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

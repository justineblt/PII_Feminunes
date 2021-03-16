<?php
session_start();
?>


<!DOCTYPE html>
<html>

<head>
        
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="Style.css">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 


  <script type='text/javascript'> //permet de créer la liste des questions en fonction du thème choisi
 
            function getXhr(){
                                var xhr = null; 
                if(window.XMLHttpRequest) // Firefox et autres
                   xhr = new XMLHttpRequest(); 
                else if(window.ActiveXObject){ // Internet Explorer 
                   try {
                            xhr = new ActiveXObject("Msxml2.XMLHTTP");
                        } catch (e) {
                            xhr = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                }
                else { // XMLHttpRequest non supporté par le navigateur 
                   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest."); 
                   xhr = false; 
                } 
                                return xhr;
            }
 
            //Méthode qui sera appelée sur le clic du bouton
            
            function go(){
                var xhr = getXhr();
                // On définit ce qu'on va faire quand on aura la réponse
                xhr.onreadystatechange = function(){
                    // On ne fait quelque chose que si on a tout reçu et que le serveur est OK
                    if(xhr.readyState == 4 && xhr.status == 200){
                        leselect = xhr.responseText;
                        // On se sert de innerHTML pour rajouter les options à la liste
                        document.getElementById('questions').innerHTML = leselect;
                    }
                }
 
                // Ici on va voir comment faire du post
                xhr.open("POST","supprquest.php",true);
                // ne pas oublier ça pour le post
                xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                // ne pas oublier de poster les arguments
                // ici, le numéro du questionnaire
                sel = document.getElementById('questionnaire');
                idauteur = sel.options[sel.selectedIndex].value;
                xhr.send("Num_Question="+Num_Questionnaire);

               
            }
        </script>
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

include('trycatch.php');
?>


 <section class="body">   
 
<a href="Accueil2.php"><img class="tacosquiz" src="Images/tacosquiz.png"></a> 
 
    <section class="conteneur1">

<div id="conteneur">
	<div class="colonne1"> <img class="moutarde" src="Images/moutarde.png"> </div>
	<div class="colonne2"> <h2> Supprimer une question </h2> </div>
	<div class="colonne3"> <img class="ketchup" src="Images/ketchup.png"> </div>
</div>
<hr/>



<section class="conteneur2"> 
<br/>
    

      <form action="reussite.php" method="post">
      <div class="supprquest">

       
      

        <label class ="textsuppr" for="theme"> <h3> Thème : </h3> </label> 
        <select name="themes" id="themes" onchange='go()'>
        <option value='-1'> - Choix du thème - </option>
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
<br/>


         <label class ="textsuppr" for="question"> <h3> Question à supprimer : </h3> </label> 
        <select name="questi">
           <option value='-1'>- Choix de la question -</option>

           <?php 
          $requete2 = $bdd->query('SELECT * FROM questions'); // INNER JOIN questionnaire ON questions.Num_Questionnaire=questionnaire.Num_Questionnaire WHERE Theme=??????
          while($ligne2 = $requete2->fetch())
          {?>
            <option value=<?php echo $ligne2['Num_Question'];?>><?php echo $ligne2['Quest'];?> </option>
            <?php   
          } 
          
          ?>
          
       </select>

</div>
        <br/>

 
    <hr/>


  <br/>

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
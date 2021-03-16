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
	<div class="colonne2"> <h2> Créer un questionnaire </h2> </div>
	<div class="colonne3"> <img class="ketchup" src="Images/ketchup.png"> </div>
</div>
<hr/>
<br/>


<section class="conteneur2"> 
<br/>
<div class="messageimportant">Vous devez absolument remplir les 10 questions pour ajouter un questionnaire !</div><br><br>
      <form action="Creerquest2.php" method="post">
      
        <label class ="barretexte" for="theme"><h4> <b> Thème : </b> </h4></label>
          <input type="text" name="nv_theme" size="40"> 
         <b> Niveau :</b>
          <select name="niveau"> <option value="Facile">Facile</option> <option value="Moyen">Moyen</option> <option value="Difficile">Difficile</option></select><hr/>
        
        <label class ="barretexte" for="question"> <b> Question : </b> </label>
          <input type="text" name="question1" size="80"> </div>
        <br/>
        <label class ="barretexte" for="theme"> <b> Réponse : </b> </label>
  <br/>

  <section class="colonnes">		
      <div class="col1"> <img class="tacoscreerquest" src="Images/happytacos.png" alt="YESSSS">  </div> 
      <div class="col2"> <input type="radio" name="typerep_1" value="q_ouverte"> Ouverte <br/> 
        <textarea name="reponse1" rows="2" cols="20" placeholder="Saisir la réponse"></textarea></div>

      <div class="col3">  <input type="radio" name="typerep_1" value="q_qcm"> QCM <br/> 
        <input type="text" name="rep_1" size="10" placeholder="Réponse 1"> <select name="valeur1"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_2" size="10"placeholder="Réponse 2"> <select name="valeur2"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_3" size="10" placeholder="Réponse 3"> <select name="valeur3"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_4" size="10" placeholder="Réponse 4"><select name="valeur4"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>

      <div class="col4">  <input type="radio" name="typerep_1" value="q_unique"> Choix unique <br/> 
      <input type="text" name="rep_5" size="10" placeholder="Réponse 1"> <select name="valeur5"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_6" size="10"placeholder="Réponse 2"> <select name="valeur6"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_7" size="10" placeholder="Réponse 3"> <select name="valeur7"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_8" size="10" placeholder="Réponse 4"><select name="valeur8"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div></div>
    
    </section><hr/>
  <br/>

  <div id="accordion" class="panel-group">
      <div class="panel panel-default">
      <div id="headingOne" class="panel-heading">
      <p class="panel-title"><a class="ajouter_question" href="#collapseOne" data-toggle="collapse" data-parent="#accordion"> <input type="submit" value="+" class="boutonajout"/> <br/>  <b> Ajouter une question </b></a></p>
  </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">

      <label class ="barretexte" for="question"> <b> Question : </b> </label>
          <input type="text" name="question2" size="80"> </div>
        <br/>
        <label class ="barretexte" for="theme"> <b> Réponse : </b> </label>
  <br/>

  <section class="colonnes">		
      <div class="col1"> <img class="tacoscreerquest" src="Images/happytacos.png" alt="YESSSS">  </div> 
      <div class="col2"> <input type="radio" name="typerep_2" value="q_ouverte"> Ouverte <br/> 
        <textarea name="reponse2" rows="2" cols="20" placeholder="Saisir la réponse"></textarea></div>

      <div class="col3">  <input type="radio" name="typerep_2" value="q_qcm"> QCM <br/> 
        <input type="text" name="rep_1_2" size="10" placeholder="Réponse 1"> <select name="valeur1_2"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_2_2" size="10"placeholder="Réponse 2"> <select name="valeur2_2"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_3_2" size="10" placeholder="Réponse 3"> <select name="valeur3_2"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_4_2'" size="10" placeholder="Réponse 4"><select name="valeur4_2"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>

      <div class="col4">  <input type="radio" name="typerep_2" value="q_unique"> Choix unique <br/> 
      <input type="text" name="rep_5_2" size="10" placeholder="Réponse 1"> <select name="valeur5_2"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_6_2" size="10"placeholder="Réponse 2"> <select name="valeur6_2"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_7_2" size="10" placeholder="Réponse 3"> <select name="valeur7_2"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_8_2" size="10" placeholder="Réponse 4"><select name="valeur8_2"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>
    
    </section><hr/>

          
          <p class="panel-title"><a href="#collapseTwo" class="ajouter_question" data-toggle="collapse" data-parent="#accordion"> <input type="submit" value="+" class="boutonajout"/> <br/>  <b> Ajouter une question </b></a></p>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">

      <label class ="barretexte" for="question"> <b> Question : </b> </label>
          <input type="text" name="question3" size="80"> </div>
        <br/>
        <label class ="barretexte" for="theme"> <b> Réponse : </b> </label>
  <br/>

  <section class="colonnes">		
      <div class="col1"> <img class="tacoscreerquest" src="Images/happytacos.png" alt="YESSSS">  </div> 
      <div class="col2"> <input type="radio" name="typerep_3" value="q_ouverte"> Ouverte <br/> 
        <textarea name="reponse3" rows="2" cols="20" placeholder="Saisir la réponse"></textarea></div>

      <div class="col3">  <input type="radio" name="typerep_3" value="q_qcm"> QCM <br/> 
        <input type="text" name="rep_1_3" size="10" placeholder="Réponse 1"> <select name="valeur1_3"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_2_3" size="10"placeholder="Réponse 2"> <select name="valeur2_3"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_3_3" size="10" placeholder="Réponse 3"> <select name="valeur3_3"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_4_3" size="10" placeholder="Réponse 4"><select name="valeur4_3"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>

      <div class="col4">  <input type="radio" name="typerep_3" value="q_unique"> Choix unique <br/> 
      <input type="text" name="rep_5_3" size="10" placeholder="Réponse 1"> <select name="valeur5_3"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_6_3" size="10"placeholder="Réponse 2"> <select name="valeur6_3"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_7_3" size="10" placeholder="Réponse 3"> <select name="valeur7_3"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_8_3" size="10" placeholder="Réponse 4"><select name="valeur8_3"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>
    
    </section><hr/>


          <p class="panel-title"><a class="ajouter_question" href="#collapseThree" data-toggle="collapse" data-parent="#accordion"> <input type="submit" value="+" class="boutonajout"/> <br/>  <b> Ajouter une question </b></a></p>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">

      <label class ="barretexte" for="question"> <b> Question : </b> </label>
          <input type="text" name="question4" size="80"> </div>
        <br/>
        <label class ="barretexte" for="theme"> <b> Réponse : </b> </label>
  <br/>

  <section class="colonnes">		
      <div class="col1"> <img class="tacoscreerquest" src="Images/happytacos.png" alt="YESSSS">  </div> 
      <div class="col2"> <input type="radio" name="typerep_4" value="q_ouverte"> Ouverte <br/> 
        <textarea name="reponse4" rows="2" cols="20" placeholder="Saisir la réponse"></textarea></div>

      <div class="col3">  <input type="radio" name="typerep_4" value="q_qcm"> QCM <br/> 
        <input type="text" name="rep_1_4" size="10" placeholder="Réponse 1"> <select name="valeur1_4"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_2_4" size="10"placeholder="Réponse 2"> <select name="valeur2_4"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_3_4" size="10" placeholder="Réponse 3"> <select name="valeur3_4"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_4_4" size="10" placeholder="Réponse 4"><select name="valeur4_4"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>

      <div class="col4">  <input type="radio" name="typerep_4" value="q_unique"> Choix unique <br/> 
      <input type="text" name="rep_5_4" size="10" placeholder="Réponse 1"> <select name="valeur5_4"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_6_4" size="10"placeholder="Réponse 2"> <select name="valeur6_4"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_7_4" size="10" placeholder="Réponse 3"> <select name="valeur7_4"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_8_4" size="10" placeholder="Réponse 4"><select name="valeur8_4"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>
    
    </section><hr/>

          <p class="panel-title"><a class="ajouter_question" href="#collapseFour" data-toggle="collapse" data-parent="#accordion"> <input type="submit" value="+" class="boutonajout"/> <br/>  <b> Ajouter une question </b></a></p>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">

      <label class ="barretexte" for="question"> <b> Question : </b> </label>
          <input type="text" name="question5" size="80"> </div>
        <br/>
        <label class ="barretexte" for="theme"> <b> Réponse : </b> </label>
  <br/>

  <section class="colonnes">		
      <div class="col1"> <img class="tacoscreerquest" src="Images/happytacos.png" alt="YESSSS">  </div> 
      <div class="col2"> <input type="radio" name="typerep_5" value="q_ouverte"> Ouverte <br/> 
        <textarea name="reponse5" rows="2" cols="20" placeholder="Saisir la réponse"></textarea></div>

      <div class="col3">  <input type="radio" name="typerep_5" value="q_qcm"> QCM <br/> 
        <input type="text" name="rep_1_5" size="10" placeholder="Réponse 1"> <select name="valeur1_5"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_2_5" size="10"placeholder="Réponse 2"> <select name="valeur2_5"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_3_5" size="10" placeholder="Réponse 3"> <select name="valeur3_5"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_4_5" size="10" placeholder="Réponse 4"><select name="valeur4_5"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>

      <div class="col4">  <input type="radio" name="typerep_5" value="q_unique"> Choix unique <br/> 
      <input type="text" name="rep_5_5" size="10" placeholder="Réponse 1"> <select name="valeur5_5"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_6_5" size="10"placeholder="Réponse 2"> <select name="valeur6_5"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_7_5" size="10" placeholder="Réponse 3"> <select name="valeur7_5"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_8_5" size="10" placeholder="Réponse 4"><select name="valeur8_5"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>
    
    </section><hr/>


          <p class="panel-title"><a class="ajouter_question" href="#collapseFive" data-toggle="collapse" data-parent="#accordion"> <input type="submit" value="+" class="boutonajout"/> <br/>  <b> Ajouter une question </b></a></p>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body">

      <label class ="barretexte" for="question"> <b> Question : </b> </label>
          <input type="text" name="question6" size="80"> </div>
        <br/>
        <label class ="barretexte" for="theme"> <b> Réponse : </b> </label>
  <br/>

  <section class="colonnes">		
      <div class="col1"> <img class="tacoscreerquest" src="Images/happytacos.png" alt="YESSSS">  </div> 
      <div class="col2"> <input type="radio" name="typerep_6" value="q_ouverte"> Ouverte <br/> 
        <textarea name="reponse6" rows="2" cols="20" placeholder="Saisir la réponse"></textarea></div>

      <div class="col3">  <input type="radio" name="typerep_6" value="q_qcm"> QCM <br/> 
        <input type="text" name="rep_1_6" size="10" placeholder="Réponse 1"> <select name="valeur1_6"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_2_6" size="10"placeholder="Réponse 2"> <select name="valeur2_6"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_3_6" size="10" placeholder="Réponse 3"> <select name="valeur3_6"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_4_6" size="10" placeholder="Réponse 4"><select name="valeur4_6"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>

      <div class="col4">  <input type="radio" name="typerep_6" value="q_unique"> Choix unique <br/> 
      <input type="text" name="rep_5_6" size="10" placeholder="Réponse 1"> <select name="valeur5_6"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_6_6" size="10"placeholder="Réponse 2"> <select name="valeur6_6"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_7_6" size="10" placeholder="Réponse 3"> <select name="valeur7_6"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_8_6" size="10" placeholder="Réponse 4"><select name="valeur8_6"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>
    
    </section><hr/>

          <p class="panel-title"><a class="ajouter_question" href="#collapseSix" data-toggle="collapse" data-parent="#accordion"> <input type="submit" value="+" class="boutonajout"/> <br/>  <b> Ajouter une question </b></a></p>
    <div id="collapseSix" class="panel-collapse collapse">
      <div class="panel-body">

      <label class ="barretexte" for="question"> <b> Question : </b> </label>
          <input type="text" name="question7" size="80"> </div>
        <br/>
        <label class ="barretexte" for="theme"> <b> Réponse : </b> </label>
  <br/>

  <section class="colonnes">		
      <div class="col1"> <img class="tacoscreerquest" src="Images/happytacos.png" alt="YESSSS">  </div> 
      <div class="col2"> <input type="radio" name="typerep_7" value="q_ouverte"> Ouverte <br/> 
        <textarea name="reponse7" rows="2" cols="20" placeholder="Saisir la réponse"></textarea></div>

      <div class="col3">  <input type="radio" name="typerep_7" value="q_qcm"> QCM <br/> 
        <input type="text" name="rep_1_7" size="10" placeholder="Réponse 1"> <select name="valeur1_7"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_2_7" size="10"placeholder="Réponse 2"> <select name="valeur2_7"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_3_7" size="10" placeholder="Réponse 3"> <select name="valeur3_7"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_4_7" size="10" placeholder="Réponse 4"><select name="valeur4_7"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>

      <div class="col4">  <input type="radio" name="typerep_7" value="q_unique"> Choix unique <br/> 
      <input type="text" name="rep_5_7" size="10" placeholder="Réponse 1"> <select name="valeur5_7"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_6_7" size="10"placeholder="Réponse 2"> <select name="valeur6_7"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_7_7" size="10" placeholder="Réponse 3"> <select name="valeur7_7"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_8_7" size="10" placeholder="Réponse 4"><select name="valeur8_7"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>
    
    </section><hr/>

          <p class="panel-title"><a class="ajouter_question" href="#collapseSeven" data-toggle="collapse" data-parent="#accordion"> <input type="submit" value="+" class="boutonajout"/> <br/>  <b> Ajouter une question </b></a></p>
    <div id="collapseSeven" class="panel-collapse collapse">
      <div class="panel-body">

      <label class ="barretexte" for="question"> <b> Question : </b> </label>
          <input type="text" name="question8" size="80"> </div>
        <br/>
        <label class ="barretexte" for="theme"> <b> Réponse : </b> </label>
  <br/>

  <section class="colonnes">		
      <div class="col1"> <img class="tacoscreerquest" src="Images/happytacos.png" alt="YESSSS">  </div> 
      <div class="col2"> <input type="radio" name="typerep_8" value="q_ouverte"> Ouverte <br/> 
        <textarea name="reponse8" rows="2" cols="20" placeholder="Saisir la réponse"></textarea></div>

      <div class="col3">  <input type="radio" name="typerep_8" value="q_qcm"> QCM <br/> 
        <input type="text" name="rep_1_8" size="10" placeholder="Réponse 1"> <select name="valeur1_8"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_2_8" size="10"placeholder="Réponse 2"> <select name="valeur2_8"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_3_8" size="10" placeholder="Réponse 3"> <select name="valeur3_8"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_4_8" size="10" placeholder="Réponse 4"><select name="valeur4_8"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>

      <div class="col4">  <input type="radio" name="typerep_8" value="q_unique"> Choix unique <br/> 
      <input type="text" name="rep_5_8" size="10" placeholder="Réponse 1"> <select name="valeur5_8"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_6_8" size="10"placeholder="Réponse 2"> <select name="valeur6_8"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_7_8" size="10" placeholder="Réponse 3"> <select name="valeur7_8"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_8_8" size="10" placeholder="Réponse 4"><select name="valeur8_8"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>
    
    </section><hr/>

    <p class="panel-title"><a class="ajouter_question" href="#collapseEight" data-toggle="collapse" data-parent="#accordion"> <input type="submit" value="+" class="boutonajout"/> <br/>  <b> Ajouter une question </b></a></p>
    <div id="collapseEight" class="panel-collapse collapse">
      <div class="panel-body">

      <label class ="barretexte" for="question"> <b> Question : </b> </label>
          <input type="text" name="question9" size="80"> </div>
        <br/>
        <label class ="barretexte" for="theme"> <b> Réponse : </b> </label>
  <br/>

  <section class="colonnes">		
      <div class="col1"> <img class="tacoscreerquest" src="Images/happytacos.png" alt="YESSSS">  </div> 
      <div class="col2"> <input type="radio" name="typerep_9" value="q_ouverte"> Ouverte <br/> 
        <textarea name="reponse9" rows="2" cols="20" placeholder="Saisir la réponse"></textarea></div>

      <div class="col3">  <input type="radio" name="typerep_9" value="q_qcm"> QCM <br/> 
        <input type="text" name="rep_1_9" size="10" placeholder="Réponse 1"> <select name="valeur1_9"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_2_9" size="10"placeholder="Réponse 2"> <select name="valeur2_9"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_3_9" size="10" placeholder="Réponse 3"> <select name="valeur3_9"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_4_9" size="10" placeholder="Réponse 4"><select name="valeur4_9"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>

      <div class="col4">  <input type="radio" name="typerep_9" value="q_unique"> Choix unique <br/> 
      <input type="text" name="rep_5_9" size="10" placeholder="Réponse 1"> <select name="valeur5_9"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_6_9" size="10"placeholder="Réponse 2"> <select name="valeur6_9"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_7_9" size="10" placeholder="Réponse 3"> <select name="valeur7_9"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_8_9" size="10" placeholder="Réponse 4"><select name="valeur8_9"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>
    
    </section><hr/>

    <p class="panel-title"><a class="ajouter_question" href="#collapseNine" data-toggle="collapse" data-parent="#accordion"> <input type="submit" value="+" class="boutonajout"/> <br/>  <b> Ajouter une question </b></a></p>
    <div id="collapseNine" class="panel-collapse collapse">
      <div class="panel-body">

      <label class ="barretexte" for="question"> <b> Question : </b> </label>
          <input type="text" name="question10" size="80"> </div>
        <br/>
        <label class ="barretexte" for="theme"> <b> Réponse : </b> </label>
  <br/>

  <section class="colonnes">		
      <div class="col1"> <img class="tacoscreerquest" src="Images/happytacos.png" alt="YESSSS">  </div> 
      <div class="col2"> <input type="radio" name="typerep_10" value="q_ouverte"> Ouverte <br/> 
        <textarea name="reponse10" rows="2" cols="20" placeholder="Saisir la réponse"></textarea></div>

      <div class="col3">  <input type="radio" name="typerep_10" value="q_qcm"> QCM <br/> 
        <input type="text" name="rep_1_10" size="10" placeholder="Réponse 1"> <select name="valeur1_10"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_2_10" size="10"placeholder="Réponse 2"> <select name="valeur2_10"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_3_10" size="10" placeholder="Réponse 3"> <select name="valeur3_10"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_4_10" size="10" placeholder="Réponse 4"><select name="valeur4_10"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>

      <div class="col4">  <input type="radio" name="typerep_10" value="q_unique"> Choix unique <br/> 
      <input type="text" name="rep_5_10" size="10" placeholder="Réponse 1"> <select name="valeur5_10"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_6_10" size="10"placeholder="Réponse 2"> <select name="valeur6_10"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_7_10" size="10" placeholder="Réponse 3"> <select name="valeur7_10"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        <input type="text" name="rep_8_10" size="10" placeholder="Réponse 4"><select name="valeur8_10"> <option value="F">Faux</option> <option value="V">Vrai</option></select><br/> 
        </div>
    
    </section><hr/>


        

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>  
  </div>
</div>

</div>

</div>

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

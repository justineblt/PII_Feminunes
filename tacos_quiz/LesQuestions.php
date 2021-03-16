<!DOCTYPE html>
<html>
	<head>
		<title> Tacos Quiz </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="Style.css"/> 
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


include ('trycatch.php'); 

$info = $_GET['info']; //on récupère les infos transmises via l'URL, du type Fblol pour Facile Blob par exemple
$niveau = $info[0]; //c'est le niveau, soit F si on suit l'exemple du dessus
$theme = substr($info,1); //c'est le thème, soit blob.
$titre = ucwords($theme); //ucwords met la premiere lettre en Majuscule, pour le titre du quiz. Sert dans le h2
$_SESSION['titre']=$titre;
?>





<section class="body">   

 
 <a href="Accueil2.php"><img class="tacosquiz" src="Images/tacosquiz.png"></a>
 
 
    <section class="conteneur1">

<div id="conteneur">
	<div class="colonne1"> <img class="moutarde" src="Images/moutarde.png"> </div>
	<div class="colonne2"> <h2> QUIZ <?php echo $titre; ?> </h2> </div>
	<div class="colonne3"> <img class="ketchup" src="Images/ketchup.png"> </div>
	
</div>


<hr/>
<br/>

<div class="bloctv">
<figure>
  <img src="Images/TV.png" alt="Télé d'Alain" width="900" height="608" />
 

  <figcaption> 
  <div id='quiz'></div>
        <br/>
  </figcaption>
  
</figure>

</div>

<div class='button' id='next'> Question Suivante > </div>
<br/>
<!-- <button class='' id='next'>Next</a></button>
    		<button class='' id='prev'>Prev</a></button>
    		<button class='' id='start'> Start Over</a></button> -->

<br/><hr/>


    		

<img src="Images/happytacos.png" alt="youpi" width="25%" />




      </section>

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



		

<?php 



$requete = $bdd -> prepare('SELECT * from questionnaire WHERE theme=? AND Difficulte=?'); //Sélectionne dans la BDD les lignes ou thème et difficulté correspondent à $niveau et $theme. 
$requete->execute( array($theme,$niveau));
$donnees = $requete->fetch();
$num_questionnaire = $donnees['Num_Questionnaire']; 
$_SESSION['num_questionnaire']=$num_questionnaire;

//Déclaration de toutes les variables utiles dans le php.
//c'est sous forme de matrice car pour une question qcm, il faut regrouper toutes les propositions de réponse en les associant à un numéro de question. C'est donc un tableau multidimensionnel.

$matricereponse=array(); //on fait un tableau qui regroupera les réponses à chaque question. 
$matricevaleur = array(); ////on fait un tableau qui regroupera les valeurs des réponses (soit réponse juste ou réponse fausse) à chaque question. 

// Détermine les questions associés au bon numéro de questionnaire.
$resultat = $bdd -> prepare('SELECT * FROM questions WHERE Num_Questionnaire=?');
$resultat->execute( array($num_questionnaire));


while ($donnees1 = $resultat->fetch()) //trim pour enlever les espaces indésirables avant et après
{
  $question[]= trim($donnees1['Quest']); // dans un tableau question, on met toutes les questions du questionnaire n°Num_Questionnaire

  $numquestion[]= trim($donnees1['Num_Question']); //tableau qui regroupe tous les numéros de questions
  
  $typequestion[]= trim($donnees1['Type_Quest']); // tableau qui regroupe tous les types de questions (ouverte, qcm) 
}

//La boucle for s'adapte en fonction des numéros de questions. Si c'est le questionnaire 2 les questions commencent au numéro 11, numéro 11 recupérer grâce à à $numquestion[0];
for ($k=0; $k<10; $k++)
{
  
  $premiernumero=0;
  if ($typequestion[$k]=='qcm') // si c'est un qcm, il faut récupérer toutes les propositions de réponses associées à la question numéro $k.
  {
        //1ère étape : une requête qui compte le nombre de réponse pour la question numéro $k.
        $nombre = $bdd -> prepare("SELECT COUNT(Num_Reponse) FROM reponses WHERE Num_Question=?");
        $nombre->execute( array($numquestion[$k])); // le numéro de question dans la bdd vaut k + 1, car les indices de tableau commencent à 0 et non à 1. 
        $donnees2 = $nombre->fetchColumn(); // C'est le nombre de proposition.


        //il faut : une deuxième rêquete pour savoir à quelle numéro de réponse (Num_Reponse) commence les réponses à cette question.
        $reponse2 = $bdd -> prepare("SELECT Num_Reponse FROM reponses WHERE Num_Question=?");
        $reponse2->execute( array($numquestion[$k]));
        $donnees3 = $reponse2->fetch(); //Donne le n° de départ des réponses pour cette checkbox. Voir consitution de la BDD
        $premiernumero =  $donnees3['Num_Reponse'];


        /*On a maintenant toutes les infos pour faire la boucle for 
        Cette boucle commence à i=0 et s'arrête quand i est < nombre de proposition soit $donnees2 */ 
        for ($i=0; $i<$donnees2; $i++) 
          {
            $reponse3 = $bdd -> prepare("SELECT * FROM reponses WHERE Num_Reponse=?");
            $reponse3->execute( array($premiernumero));
            while ($donnees4 = $reponse3->fetch())
            {
              $matricereponse[$k][]=trim($donnees4['Rep']); //On remplit la matrice d'indice k, avec un tableau des propositions de réponses.
              $matricevaleur[$k][]=trim($donnees4['Valeur']); // On remplit la matrice d'indice k, avec un tableau des valeurs (La proposition est la bonne réponse, la proposition est une fausse réponse).
            
            }
            $premiernumero=$premiernumero+1;
          }
          
          

  }
  else
  {
  //si c'est une question ouverte, on prend la réponse et met là dans la matrice des réponses et des valeurs à la bonne position.
        $reponse3 = $bdd -> prepare("SELECT * FROM reponses WHERE Num_Question=?");
        $reponse3->execute(array($numquestion[$k]));
        while ($donnees4 = $reponse3->fetch())
          {
            $matricereponse[$k][]=trim($donnees4['Rep']);
            $matricevaleur[$k][]=trim($donnees4['Valeur']);
          }
  }
}




?>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

//On passe le tableau des types (ouverte, qcm...) de php à javascript
tablquestion = <?php echo json_encode ($question); ?>; //
if (tablquestion.length<10)
{
    alert('Ce questionnaire est encore en construction.... Il ne possède pas encore ces 10 questions. Reviens plus tard!!! ');
    document.location.href=("LesQuizs.php");
}
  else{ (function() {
    var questions = [{
      question: "<?php echo $question[0];?>",
    }, {
      question: "<?php echo $question[1]; ?>",
    }, {
      question: "<?php echo $question[2] ;?>",
    }, {
      question: "<?php echo $question[3] ;?>",
    }, {
      question: "<?php echo $question[4] ;?>",
    }, {
      question: "<?php echo $question[5] ;?>",
    }, {
      question: "<?php echo $question[6] ;?>",
    }, {
      question: "<?php echo $question[7] ;?>",
    },  {
      question: "<?php echo $question[8] ;?>",
    }, {
      question: "<?php echo $question[9];?>",
    }];
    
   

    var questionCounter = 0; //Compteur du nombre de question
    var selections = []; //Tableau qui permet de passer de question en question, quand l'utilisateur a répondu à la question i, selections[i] vaut 1. 
    var quiz = $('#quiz'); //Div qui contient la zone de Quiz. C'est cette zone qui est mise à jour quand on enchaîne les questions.
    var reponseutilisateur = []; // Tableau qui regroupe les réponses de l'utilisateur.
    var tabl=[]; //Tableau qui contient les propositions de réponses pour chaque question. Fonctionne avec la fonction proposition().
    var tableausolution = []; //Tableau qui contient toutes les solutions. Fonctionne avec la fonction solu()
    var numCorrect = 0; //Variable du score
    //Ici il faut transmettre toutes les données utiles de php à Javascript!

    

    //On passe le tableau des types (ouverte, qcm...) de php à javascript
    numquestion = <?php echo json_encode ($numquestion); ?>; 

    //On passe le tableau des types (ouverte, qcm...) de php à javascript
    typequestion = <?php echo json_encode ($typequestion); ?>; 
    
    //On passe la matrice des réponses et des valeurs vrai/faux de php à javascript
    matricereponse = <?php echo json_encode ($matricereponse); ?>;
    matricevaleur = <?php echo json_encode ($matricevaleur); ?>;
        
    

    //On provoque le premier clique sur le bouton suivant, sinon on commencera jamais à jouer.
    displayNext(); 

    // Clique détecté sur le bouton 'next'.
    $('#next').on('click', function (e) {

      // On suspend tous les actions pendant l'animation du questionnaire. 
      if(quiz.is(':animated')) {        
        return false;
      }

      if (typequestion[questionCounter]=="qcm")
      {

      choose(); // Va faire la fonction choose() pour qcm.
      }
      else
      {

      choose2();
      }
      
      // S'il n'y a pas de selections via l'utilisateur on bloque ici le changement de question et on demande à l'utilisateur de donner une réponse.
      if (isNaN(selections[questionCounter])) {
        alert('Veuillez indiquer une réponse!');
      } else { //Sinon on augmente le compteur questionCounter de 1 et on appelle la fonction displayNext();
        questionCounter++;
        displayNext();
      }
    });
    
    //Anime les boutons selon passage de la souris.
    $('.button').on('mouseenter', function () {
      $(this).addClass('active');
    });
    $('.button').on('mouseleave', function () {
      $(this).removeClass('active');
    });
    
    

    //Cette fonction est appelée uniquement si on a affaire à une question de type qcm, elle permet de récupérer toutes les propositions.
    function proposition() {
      tabl = []; //Vide le tableau s'il était déjà remplis par une question précédente.
      for (var ind=0; ind<(matricereponse[questionCounter].length); ind++)
        {
          tabl.push(matricereponse[questionCounter][ind]); //push : ajoute dans le tableau.
        }
    }


    // Creer et retourne la division qui contient les questions et les propositions de réponses
    function createQuestionElement(index) {
      var Element = $('<div>', {
        id: 'question'
      });
      
      // index = c'est le numéro de question, l'index pour savoir ou on est dans le tableau
      var header = $('<h2 class="numquestion">Question ' + (index + 1) + ':</h2><br/>');
      Element.append(header);
      
      var question = $('<div class="affichagequestion">').append(questions[index].question);
      Element.append(question);
      
      if (typequestion[questionCounter]==='qcm'){
      var radioButtons = createRadios(index);
      Element.append(radioButtons);
      }
      else {
      var barretexte = createText(index);
      Element.append(barretexte);
      }
      return Element;
    }
    
    //Créer la liste des choix sous forme de bouton radio
    function createRadios(index) {
      proposition(); //Il est appelé que pour les qcms. Récupère le tabl[] des propositions associées à cette question.
      var radioList = $('<ul>');
      var item;
      var input = '';
      for (var i = 0; i <tabl.length; i++) {
        item = $('<li>');
        input = ' <br/>  <input type="radio" name="answer" value=' + tabl[i] + ' />';
        input += tabl[i]; //Dans chaque input, c'est la valeur tabl[i] qui s'affiche.
        item.append(input);
        radioList.append(item);
      }
      index=questionCounter;
      return radioList;
    }


    //Créer une barre de texte pour les questions ouvertes
    function createText(index) {
      var input = '';
      input = '<br/> <input type="text" name="answer" id="answer" />';
      return input;
    }

    
    // Lit la sélection de l'utilisateur et la met dans le tableau des réponses de l'utilisateur. 
    function choose() {
      selections[questionCounter] = 1;
      var valeur = document.querySelector('input[name="answer"]:checked').value;
      reponseutilisateur[questionCounter]=valeur;
    }

    //Lit la réponse ouverte de l'utilisateur et la met dans le tableau des réponses de l'utilisateur.
    function choose2()
    {
      var verif = $("#answer").val();

      if (verif != '') //Si c'est different du vide, donc que l'utilisateur à répondu : on donne 1 à selections counter pour que les questions s'enchainent.
      {
        selections[questionCounter] = 1;
        reponseutilisateur[questionCounter]=verif;
      }
      else
      {
        selections[questionCounter] = +$('input[name="answer"]:checked').val(); //sinon rest NAN.
      }
    }
    
    // Fonction passage à la question suivante.
    function displayNext() {
      quiz.fadeOut(function() {
        $('#question').remove();
        if(questionCounter < 10){//Si le compteur des questions est inférieur à 10 c'est que c'est pas fini.
          var nextQuestion = createQuestionElement(questionCounter);
          quiz.append(nextQuestion).fadeIn();
          if (!(isNaN(selections[questionCounter]))) {
            $('input[value='+selections[questionCounter]+']').prop('checked', true);
          }
        
        }else { //Sinon c'est qu'on a vu toutes les questions donc on peut afficher le score.
          var scoreElem = Score(); 
          quiz.append(scoreElem).fadeIn();
          $('#next').hide();
        }
      });
    }


    // Fonction qui créer le tableau des solutions. 
    function solu() {
      for (var $indice=0; $indice<10; $indice++)
      {
        if (typequestion[$indice]==="ouverte")
          {
            tableausolution[$indice]= matricereponse[$indice][0];
          }
        else 
          {
            for (var $k=0;$k<(matricereponse[$indice].length);$k++)
            {
              if (matricevaleur[$indice][$k]==="V")
              {
                tableausolution[$indice]=matricereponse[$indice][$k];
              }
              
            }
          }
      }
    }

    //Fonction pour rediriger selon le score.
    function RedirectionJavascript(){
      if (numCorrect>=80) //Si le joueur a eu plus de 80 points, on redirige vers la page gagnante.
      {
      document.location.href=("finpartiegagnante.php?score="+numCorrect); 
      }
      else
      {
      document.location.href=("finpartieperdante.php?score="+numCorrect);
      }
    }    

    // Fonction qui comptabilise le score à la fin en comparant toutes les réponses de l'utilisateur au tableau des solutions.
    function Score() {
      var score = $('<p>',{id: 'question'});
      solu();
      
      for (var i = 0; i < tableausolution.length; i++) {
          if (reponseutilisateur[i] === tableausolution[i]) 
          {
          numCorrect=numCorrect + 10 ;          
          }
        }

        alert('Score : ' + numCorrect + ' / 100 '); //MEttre des headers pour rédiriger selon le score
        RedirectionJavascript();
        return score;
        }
      })()};
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    	</body>
</html>
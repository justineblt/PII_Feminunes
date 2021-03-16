<?php
require("session.class.php");
$Session = new Session();
include ('trycatch.php');

//--------------CREATION DUN QUESTIONNAIRE--------------



if (empty($_POST['question1']) or empty($_POST['question2']) or empty($_POST['question3']) or empty($_POST['question4']) or empty($_POST['question5']) or empty($_POST['question6']) or empty($_POST['question7']) or empty($_POST['question8']) or empty($_POST['question9']) or empty($_POST['question10']))
{
    $Session->setFlash('Veuillez remplir tous les champs.');
    header('Location:Creerquest.php');	
	exit();
}
else
{


// FONCTION POUR INSERER LES QUESTIONS
function inserer_quest($Num_Question, $Type_Quest, $Quest, $Num_Questionnaire)
{
    include ('trycatch.php');
    $rqt2=$bdd->prepare("INSERT INTO questions (Num_Question, Type_Quest, Quest, Num_Questionnaire) VALUES (?, ?, ?, ?)");
    
    if ($Quest != "") 
    {
        $rqt2->execute(array($Num_Question, $Type_Quest, $Quest, $Num_Questionnaire));
    }    
}

//FONCTION POUR INSERER LES REPONSES ASSOCIEES
function inserer_rep($Num_Question, $Rep, $Valeur, $Type_Rep)
    {
        include ('trycatch.php');
        $rqt3=$bdd->prepare("INSERT INTO reponses (Num_Question, Type_Rep, Rep, Valeur) VALUES (?, ?, ?, ?)");
        
        if ($Rep != "")
        {
            $rqt3->execute(array($Num_Question, $Type_Rep, $Rep, $Valeur));
        }
    }

if ((isset($_POST['question1']))&&(isset($_POST['nv_theme']))&&(isset($_POST['typerep_1'])))
{
    $rqt1=$bdd->prepare("INSERT INTO questionnaire (Num_Questionnaire, Nb_Question, Difficulte, theme) VALUES (:Num_Questionnaire, :Nb_Question, :Difficulte, :theme)");
  
    //récupération du numéro de questionnaire selon le dernier rentré dans la BDD
    $rqtn = $bdd->query('SELECT MAX(Num_Questionnaire) as nv_num1 FROM questionnaire');
    $numero = $rqtn->fetch();
    $Num_Questionnaire = $numero['nv_num1'] + 1;
   
    //récupération du numéro de question selon la dernière rentrée dans la BDD
    $rqtn2 = $bdd->query('SELECT MAX(Num_Question) as nv_num2 FROM questions');
    $numero2 = $rqtn2->fetch();
    $Num_Question = $numero2['nv_num2'] + 1;

    //Création du questionnaire
    $Nb_Question="10";
    $Difficulte=$_POST['niveau'];
    $Theme = $_POST['nv_theme'];

    $rqt1->bindValue('Num_Questionnaire', $Num_Questionnaire, PDO::PARAM_INT);
    $rqt1->bindValue('Nb_Question', $Nb_Question, PDO::PARAM_INT);
    $rqt1->bindValue('Difficulte', $Difficulte, PDO::PARAM_STR);
    $rqt1->bindValue('theme', $Theme, PDO::PARAM_STR);
    $rqt1->execute();




    //------------QUESTION N°1------------
    inserer_quest($Num_Question, $_POST['typerep_1'], $_POST['question1'], $Num_Questionnaire);
    
    if ($_POST['typerep_1']=="q_ouverte") //TRAITEMENT DES QUESTIONS OUVERTES
    {
        $Type_Rep = "texte";
        $Rep = $_POST['reponse1']; 
        $Valeur = "V";
        inserer_rep($Num_Question, $Rep, $Valeur, $Type_Rep);
    }
    else if ($_POST['typerep_1']=="q_qcm") //TRAITEMENT DES QUESTIONS QCM
    {
        $type = $_POST['typerep_1'];
        inserer_rep($Num_Question, $_POST['rep_1'], $_POST['valeur1'], $type);
        inserer_rep($Num_Question, $_POST['rep_2'], $_POST['valeur2'], $type);
        inserer_rep($Num_Question, $_POST['rep_3'], $_POST['valeur3'], $type);
        inserer_rep($Num_Question, $_POST['rep_4'], $_POST['valeur4'], $type);
    }
    else if ($_POST['typerep_1']=="q_unique") //TRAITEMENT DES QUESTIONS CHOIX UNIQUE
    {
        $type = $_POST['typerep_1'];
        inserer_rep($Num_Question, $_POST['rep_5'], $_POST['valeur5'], $type);
        inserer_rep($Num_Question, $_POST['rep_6'], $_POST['valeur6'], $type);
        inserer_rep($Num_Question, $_POST['rep_7'], $_POST['valeur7'], $type);
        inserer_rep($Num_Question, $_POST['rep_8'], $_POST['valeur8'], $type);
    }



    

    //------------QUESTION N°2------------
    if ($_POST['typerep_2']!="")
    {
        inserer_quest($Num_Question+1, $_POST['typerep_2'], $_POST['question2'], $Num_Questionnaire);
    
        if ($_POST['typerep_2']=="q_ouverte") //TRAITEMENT DES QUESTIONS OUVERTES
        {
            $Type_Rep = "texte";
            $Rep = $_POST['reponse2']; 
            $Valeur = "V";
            inserer_rep($Num_Question+1, $Rep, $Valeur, $Type_Rep);
        }
        else if ($_POST['typerep_2']=="q_qcm") //TRAITEMENT DES QUESTIONS QCM
        {
            $type = $_POST['typerep_2'];
            inserer_rep($Num_Question+1, $_POST['rep_1_2'], $_POST['valeur1_2'], $type);
            inserer_rep($Num_Question+1, $_POST['rep_2_2'], $_POST['valeur2_2'], $type);
            inserer_rep($Num_Question+1, $_POST['rep_3_2'], $_POST['valeur3_2'], $type);
            inserer_rep($Num_Question+1, $_POST['rep_4_2'], $_POST['valeur4_2'], $type);
        }
        else if ($_POST['typerep_2']=="q_unique") //TRAITEMENT DES QUESTIONS CHOIX UNIQUE
        {
            $type = $_POST['typerep_2'];
            inserer_rep($Num_Question+1, $_POST['rep_5_2'], $_POST['valeur5_2'], $type);
            inserer_rep($Num_Question+1, $_POST['rep_6_2'], $_POST['valeur6_2'], $type);
            inserer_rep($Num_Question+1, $_POST['rep_7_2'], $_POST['valeur7_2'], $type);
            inserer_rep($Num_Question+1, $_POST['rep_8_2'], $_POST['valeur8_2'], $type);
        }
    
    }
    
   //------------QUESTION N°3------------
   if ($_POST['typerep_3']!="")
   {
        inserer_quest($Num_Question+2, $_POST['typerep_3'], $_POST['question3'], $Num_Questionnaire);
    
        if ($_POST['typerep_3']=="q_ouverte") //TRAITEMENT DES QUESTIONS OUVERTES
        {
            $Type_Rep = "texte";
            $Rep = $_POST['reponse3']; 
            $Valeur = "V";
            inserer_rep($Num_Question+2, $Rep, $Valeur, $Type_Rep);
        }
        else if ($_POST['typerep_3']=="q_qcm") //TRAITEMENT DES QUESTIONS QCM
        {
            $type = $_POST['typerep_3'];
            inserer_rep($Num_Question+2, $_POST['rep_1_3'], $_POST['valeur1_3'], $type);
            inserer_rep($Num_Question+2, $_POST['rep_2_3'], $_POST['valeur2_3'], $type);
            inserer_rep($Num_Question+2, $_POST['rep_3_3'], $_POST['valeur3_3'], $type);
            inserer_rep($Num_Question+2, $_POST['rep_4_3'], $_POST['valeur4_3'], $type);
        }
        else if ($_POST['typerep_3']=="q_unique") //TRAITEMENT DES QUESTIONS CHOIX UNIQUE
        {
            $type = $_POST['typerep_3'];
            inserer_rep($Num_Question+2, $_POST['rep_5_3'], $_POST['valeur5_3'], $type);
            inserer_rep($Num_Question+2, $_POST['rep_6_3'], $_POST['valeur6_3'], $type);
            inserer_rep($Num_Question+2, $_POST['rep_7_3'], $_POST['valeur7_3'], $type);
            inserer_rep($Num_Question+2, $_POST['rep_8_3'], $_POST['valeur8_3'], $type);
        }
   
   }
   
   
   //------------QUESTION N°4------------
   if ($_POST['typerep_4']!="")
   {
        inserer_quest($Num_Question+3, $_POST['typerep_4'], $_POST['question4'], $Num_Questionnaire);
        
        if ($_POST['typerep_4']=="q_ouverte") //TRAITEMENT DES QUESTIONS OUVERTES
        {
            $Type_Rep = "texte";
            $Rep = $_POST['reponse4']; 
            $Valeur = "V";
            inserer_rep($Num_Question+3, $Rep, $Valeur, $Type_Rep);
        }
        else if ($_POST['typerep_4']=="q_qcm") //TRAITEMENT DES QUESTIONS QCM
        {
            $type = $_POST['typerep_4'];
            inserer_rep($Num_Question+3, $_POST['rep_1_4'], $_POST['valeur1_4'], $type);
            inserer_rep($Num_Question+3, $_POST['rep_2_4'], $_POST['valeur2_4'], $type);
            inserer_rep($Num_Question+3, $_POST['rep_3_4'], $_POST['valeur3_4'], $type);
            inserer_rep($Num_Question+3, $_POST['rep_4_4'], $_POST['valeur4_4'], $type);
        }
        else if ($_POST['typerep_4']=="q_unique") //TRAITEMENT DES QUESTIONS CHOIX UNIQUE
        {
            $type = $_POST['typerep_4'];
            inserer_rep($Num_Question+3, $_POST['rep_5_4'], $_POST['valeur5_4'], $type);
            inserer_rep($Num_Question+3, $_POST['rep_6_4'], $_POST['valeur6_4'], $type);
            inserer_rep($Num_Question+3, $_POST['rep_7_4'], $_POST['valeur7_4'], $type);
            inserer_rep($Num_Question+3, $_POST['rep_8_4'], $_POST['valeur8_4'], $type);
        }
   }

   //------------QUESTION N°5------------
   if ($_POST['typerep_5']!="")
   {
        inserer_quest($Num_Question+4, $_POST['typerep_5'], $_POST['question5'], $Num_Questionnaire);
        
        if ($_POST['typerep_5']=="q_ouverte") //TRAITEMENT DES QUESTIONS OUVERTES
        {
            $Type_Rep = "texte";
            $Rep = $_POST['reponse5']; 
            $Valeur = "V";
            inserer_rep($Num_Question+4, $Rep, $Valeur, $Type_Rep);
        }
        else if ($_POST['typerep_5']=="q_qcm") //TRAITEMENT DES QUESTIONS QCM
        {
            $type = $_POST['typerep_5'];
            inserer_rep($Num_Question+4, $_POST['rep_1_5'], $_POST['valeur1_5'], $type);
            inserer_rep($Num_Question+4, $_POST['rep_2_5'], $_POST['valeur2_5'], $type);
            inserer_rep($Num_Question+4, $_POST['rep_3_5'], $_POST['valeur3_5'], $type);
            inserer_rep($Num_Question+4, $_POST['rep_4_5'], $_POST['valeur4_5'], $type);
        }
        else if ($_POST['typerep_5']=="q_unique") //TRAITEMENT DES QUESTIONS CHOIX UNIQUE
        {
            $type = $_POST['typerep_5'];
            inserer_rep($Num_Question+4, $_POST['rep_5_5'], $_POST['valeur5_5'], $type);
            inserer_rep($Num_Question+4, $_POST['rep_6_5'], $_POST['valeur6_5'], $type);
            inserer_rep($Num_Question+4, $_POST['rep_7_5'], $_POST['valeur7_5'], $type);
            inserer_rep($Num_Question+4, $_POST['rep_8_5'], $_POST['valeur8_5'], $type);
        }
   }
   
   //------------QUESTION N°6------------
   if ($_POST['typerep_6']!="")
   {
        inserer_quest($Num_Question+5, $_POST['typerep_6'], $_POST['question6'], $Num_Questionnaire);

        if ($_POST['typerep_6']=="q_ouverte") //TRAITEMENT DES QUESTIONS OUVERTES
        {
            $Type_Rep = "texte";
            $Rep = $_POST['reponse6']; 
            $Valeur = "V";
            inserer_rep($Num_Question+5, $Rep, $Valeur, $Type_Rep);
        }
        else if ($_POST['typerep_6']=="q_qcm") //TRAITEMENT DES QUESTIONS QCM
        {
            $type = $_POST['typerep_6'];
            inserer_rep($Num_Question+5, $_POST['rep_1_6'], $_POST['valeur1_6'], $type);
            inserer_rep($Num_Question+5, $_POST['rep_2_6'], $_POST['valeur2_6'], $type);
            inserer_rep($Num_Question+5, $_POST['rep_3_6'], $_POST['valeur3_6'], $type);
            inserer_rep($Num_Question+5, $_POST['rep_4_6'], $_POST['valeur4_6'], $type);
        }
        else if ($_POST['typerep_6']=="q_unique") //TRAITEMENT DES QUESTIONS CHOIX UNIQUE
        {
            $type = $_POST['typerep_6'];
            inserer_rep($Num_Question+5, $_POST['rep_5_6'], $_POST['valeur5_6'], $type);
            inserer_rep($Num_Question+5, $_POST['rep_6_6'], $_POST['valeur6_6'], $type);
            inserer_rep($Num_Question+5, $_POST['rep_7_6'], $_POST['valeur7_6'], $type);
            inserer_rep($Num_Question+5, $_POST['rep_8_6'], $_POST['valeur8_6'], $type);
        }
   }
   
   
   //------------QUESTION N°7------------
   if ($_POST['typerep_7']!="")
   {
        inserer_quest($Num_Question+6, $_POST['typerep_7'], $_POST['question7'], $Num_Questionnaire);

        if ($_POST['typerep_7']=="q_ouverte") //TRAITEMENT DES QUESTIONS OUVERTES
        {
            $Type_Rep = "texte";
            $Rep = $_POST['reponse7']; 
            $Valeur = "V";
            inserer_rep($Num_Question+6, $Rep, $Valeur, $Type_Rep);
        }
        else if ($_POST['typerep_7']=="q_qcm") //TRAITEMENT DES QUESTIONS QCM
        {
            $type = $_POST['typerep_7'];
            inserer_rep($Num_Question+6, $_POST['rep_1_7'], $_POST['valeur1_7'], $type);
            inserer_rep($Num_Question+6, $_POST['rep_2_7'], $_POST['valeur2_7'], $type);
            inserer_rep($Num_Question+6, $_POST['rep_3_7'], $_POST['valeur3_7'], $type);
            inserer_rep($Num_Question+6, $_POST['rep_4_7'], $_POST['valeur4_7'], $type);
        }
        else if ($_POST['typerep_7']=="q_unique") //TRAITEMENT DES QUESTIONS CHOIX UNIQUE
        {
            $type = $_POST['typerep_7'];
            inserer_rep($Num_Question+6, $_POST['rep_5_7'], $_POST['valeur5_7'], $type);
            inserer_rep($Num_Question+6, $_POST['rep_6_7'], $_POST['valeur6_7'], $type);
            inserer_rep($Num_Question+6, $_POST['rep_7_7'], $_POST['valeur7_7'], $type);
            inserer_rep($Num_Question+6, $_POST['rep_8_7'], $_POST['valeur8_7'], $type);
        }
   }

   //------------QUESTION N°8------------
   if ($_POST['typerep_8']!="")
   {
        inserer_quest($Num_Question+7, $_POST['typerep_8'], $_POST['question8'], $Num_Questionnaire);

        if ($_POST['typerep_8']=="q_ouverte") //TRAITEMENT DES QUESTIONS OUVERTES
        {
            $Type_Rep = "texte";
            $Rep = $_POST['reponse8']; 
            $Valeur = "V";
            inserer_rep($Num_Question+7, $Rep, $Valeur, $Type_Rep);
        }
        else if ($_POST['typerep_8']=="q_qcm") //TRAITEMENT DES QUESTIONS QCM
        {
            $type = $_POST['typerep_8'];
            inserer_rep($Num_Question+7, $_POST['rep_1_8'], $_POST['valeur1_8'], $type);
            inserer_rep($Num_Question+7, $_POST['rep_2_8'], $_POST['valeur2_8'], $type);
            inserer_rep($Num_Question+7, $_POST['rep_3_8'], $_POST['valeur3_8'], $type);
            inserer_rep($Num_Question+7, $_POST['rep_4_8'], $_POST['valeur4_8'], $type);
        }
        else if ($_POST['typerep_8']=="q_unique") //TRAITEMENT DES QUESTIONS CHOIX UNIQUE
        {
            $type = $_POST['typerep_8'];
            inserer_rep($Num_Question+7, $_POST['rep_5_8'], $_POST['valeur5_8'], $type);
            inserer_rep($Num_Question+7, $_POST['rep_6_8'], $_POST['valeur6_8'], $type);
            inserer_rep($Num_Question+7, $_POST['rep_7_8'], $_POST['valeur7_8'], $type);
            inserer_rep($Num_Question+7, $_POST['rep_8_8'], $_POST['valeur8_8'], $type);
        }
   }  

   
   //------------QUESTION N°9------------
   if ($_POST['typerep_9']!="")
   {
        inserer_quest($Num_Question+8, $_POST['typerep_9'], $_POST['question9'], $Num_Questionnaire);

        if ($_POST['typerep_9']=="q_ouverte") //TRAITEMENT DES QUESTIONS OUVERTES
        {
            $Type_Rep = "texte";
            $Rep = $_POST['reponse9']; 
            $Valeur = "V";
            inserer_rep($Num_Question+8, $Rep, $Valeur, $Type_Rep);
        }
        else if ($_POST['typerep_9']=="q_qcm") //TRAITEMENT DES QUESTIONS QCM
        {
            $type = $_POST['typerep_9'];
            inserer_rep($Num_Question+8, $_POST['rep_1_9'], $_POST['valeur1_9'], $type);
            inserer_rep($Num_Question+8, $_POST['rep_2_9'], $_POST['valeur2_9'], $type);
            inserer_rep($Num_Question+8, $_POST['rep_3_9'], $_POST['valeur3_9'], $type);
            inserer_rep($Num_Question+8, $_POST['rep_4_9'], $_POST['valeur4_9'], $type);
        }
        else if ($_POST['typerep_9']=="q_unique") //TRAITEMENT DES QUESTIONS CHOIX UNIQUE
        {
            $type = $_POST['typerep_9'];
            inserer_rep($Num_Question+8, $_POST['rep_5_9'], $_POST['valeur5_9'], $type);
            inserer_rep($Num_Question+8, $_POST['rep_6_9'], $_POST['valeur6_9'], $type);
            inserer_rep($Num_Question+8, $_POST['rep_7_9'], $_POST['valeur7_9'], $type);
            inserer_rep($Num_Question+8, $_POST['rep_8_9'], $_POST['valeur8_9'], $type);
        }
   }  

    //------------QUESTION N°10------------
    if ($_POST['typerep_10']!="")
    {
         inserer_quest($Num_Question+9, $_POST['typerep_10'], $_POST['question10'], $Num_Questionnaire);
 
         if ($_POST['typerep_10']=="q_ouverte") //TRAITEMENT DES QUESTIONS OUVERTES
         {
             $Type_Rep = "texte";
             $Rep = $_POST['reponse10']; 
             $Valeur = "V";
             inserer_rep($Num_Question+9, $Rep, $Valeur, $Type_Rep);
         }
         else if ($_POST['typerep_10']=="q_qcm") //TRAITEMENT DES QUESTIONS QCM
         {
             $type = $_POST['typerep_10'];
             inserer_rep($Num_Question+9, $_POST['rep_1_10'], $_POST['valeur1_10'], $type);
             inserer_rep($Num_Question+9, $_POST['rep_2_10'], $_POST['valeur2_10'], $type);
             inserer_rep($Num_Question+9, $_POST['rep_3_10'], $_POST['valeur3_10'], $type);
             inserer_rep($Num_Question+9, $_POST['rep_4_10'], $_POST['valeur4_10'], $type);
         }
         else if ($_POST['typerep_10']=="q_unique") //TRAITEMENT DES QUESTIONS CHOIX UNIQUE
         {
             $type = $_POST['typerep_10'];
             inserer_rep($Num_Question+9, $_POST['rep_5_v'], $_POST['valeur5_10'], $type);
             inserer_rep($Num_Question+9, $_POST['rep_6_10'], $_POST['valeur6_10'], $type);
             inserer_rep($Num_Question+9, $_POST['rep_7_10'], $_POST['valeur7_10'], $type);
             inserer_rep($Num_Question+9, $_POST['rep_8_10'], $_POST['valeur8_10'], $type);
         }
    }  

}
header('Location:reussite.php');
}


   
//--------------FIN CREATION DUN QUESTIONNAIRE--------------//

?>

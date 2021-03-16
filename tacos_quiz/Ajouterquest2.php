<?php
require("session.class.php");
$Session = new Session();
include ('trycatch.php');

//--------------AJOUT D'UNE QUESTION--------------
if (empty($_POST['question']))
{
    $Session->setFlash('Veuillez remplir tous les champs.');
    header('Location:Ajouterquest.php');	
	exit();
}
else
{


function inserer($Rep, $Valeur, $Type_Rep, $Num_Question) //fonction pour ajouter une les réponses associées à une question
{
    include ('trycatch.php');

    $reque3=$bdd->prepare("INSERT INTO reponses (Num_Question, Type_Rep, Rep, Valeur) VALUES (?, ?, ?, ?)");

    if ($Rep != "") 
    {
        $reque3->execute(array($Num_Question, $Type_Rep, $Rep, $Valeur));
    }
}

if ((isset($_POST['question']))&&(isset($_POST['theme']))&&(isset($_POST['typerep'])))
{
    $reque=$bdd->prepare("INSERT INTO questions (Num_Question, Type_Quest, Quest, Num_Questionnaire) VALUES (:Num_Question, :Type_Quest, :Quest, :Num_Questionnaire)");
    
    //récupération du numéro de question selon la dernière rentrée dans la BDD
    $rqt = $bdd->query('SELECT MAX(Num_Question) as nv_num FROM questions');
    $num = $rqt->fetch();
    $Num_Question = $num['nv_num'] + 1;

    $Quest =$_POST['question'];
    $Num_Questionnaire= $_POST['theme'];


    if ($_POST['typerep']=="q_ouverte") //TRAITEMENT DES QUESTIONS OUVERTES
    {
        $Type_Quest = "ouverte";
        $Type_Rep = "texte";
        $Rep = $_POST['reponse']; 
        $Valeur = "V";
       
        $reque->bindValue('Num_Question', $Num_Question, PDO::PARAM_INT);
        $reque->bindValue('Quest', $Quest, PDO::PARAM_STR);
        $reque->bindValue('Num_Questionnaire', $Num_Questionnaire, PDO::PARAM_INT);
        $reque->bindValue('Type_Quest', $Type_Quest, PDO::PARAM_STR);
        $reque->execute();
    
        inserer($Rep, $Valeur, $Type_Rep, $Num_Question);
    }
    else if ($_POST['typerep']=="q_qcm") //TRAITEMENT DES QUESTIONS QCM
    {
        $Type_Quest = "qcm";

         //pour assigner les valeurs de la question
        $reque->bindValue('Num_Question', $Num_Question, PDO::PARAM_INT);
        $reque->bindValue('Quest', $Quest, PDO::PARAM_STR);
        $reque->bindValue('Num_Questionnaire', $Num_Questionnaire, PDO::PARAM_INT);
        $reque->bindValue('Type_Quest', $Type_Quest, PDO::PARAM_STR);
        $reque->execute();

        inserer($_POST['rep1'], $_POST['valeur1'], $_POST['typerep'], $Num_Question);
        inserer($_POST['rep2'], $_POST['valeur2'], $_POST['typerep'], $Num_Question);
        inserer($_POST['rep3'], $_POST['valeur3'], $_POST['typerep'], $Num_Question);
        inserer($_POST['rep4'], $_POST['valeur4'], $_POST['typerep'], $Num_Question);
    }
    else if ($_POST['typerep']=="q_unique") //TRAITEMENT DES QUESTIONS CHOIX UNIQUE
    {
        $Type_Quest = "q_unique";

         //pour assigner les valeurs de la question
        $reque->bindValue('Num_Question', $Num_Question, PDO::PARAM_INT);
        $reque->bindValue('Quest', $Quest, PDO::PARAM_STR);
        $reque->bindValue('Num_Questionnaire', $Num_Questionnaire, PDO::PARAM_INT);
        $reque->bindValue('Type_Quest', $Type_Quest, PDO::PARAM_STR);
        $reque->execute();

        inserer($_POST['rep5'], $_POST['valeur5'], $_POST['typerep'], $Num_Question);
        inserer($_POST['rep6'], $_POST['valeur6'], $_POST['typerep'], $Num_Question);
        inserer($_POST['rep7'], $_POST['valeur7'], $_POST['typerep'], $Num_Question);
        inserer($_POST['rep8'], $_POST['valeur8'], $_POST['typerep'], $Num_Question);
    }
    
    }
    header('Location:reussite.php');
}
//--------------FIN AJOUT D'UNE QUESTION--------------
?>
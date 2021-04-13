<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <?php $pagetitre = "Nous  soutenir";
  require_once 'head.php'; ?>
</head>

<body>
  <section class="bandeau">
    <a href="accueil.php"><img class="logo" src="img/logo.png" alt="Logo Fémin'Unes"></a>
    <a href="articles.php"><button type="button" class="boutonmenu"> ARTICLES </button></a>
    <a href="decouvrir.php"><button type="button" class="boutonmenu"> DECOUVRIR </button></a>
    <a href="lexique.php"><button type="button" class="boutonmenu"> LEXIQUE </button></a>
    <a href="soutenir.php"><button type="button" class="boutonmenu"> SOUTENIR </button></a>
    <a href="contact.php"><button type="button" class="boutonmenu"> CONTACT </button></a>

    <a href="https://www.instagram.com/femin.unes/" target="_blank"><img class="logors" src="img/logoinsta.png" alt="Fémin'Unes instagram"></a>
    <a href="https://www.facebook.com/femin.unes/" target="_blank"><img class="logors" src="img/logofb.png" alt="Fémin'Unes Facebook"></a>
  </section>

  <section class="body">

    <p class="titrepage">Nous soutenir</p>

    <div class="caseblanche">
      <p class="corpstextev">
        Ajourd'hui, je me paye à manger ou des protections hygiéniques ?
      </p>
      <hr />
      <p class="corpstexte">
        Ce dilemme est celui.. explication post précarité menstruelle</br>
        Chaque année, une étudiante dépense environ 530€ de plus qu’un étudiant dans les protections périodiques. </br>Cela correspond à plus de 23 000€ dans une vie en comptant les médicaments, les rendez-vous médicaux ou encore les sous-vêtements qu’il faut changer.</br>
        Or en France, plus d'un million de personnes ne seraient pas en mesure de se payer des protections périodiques, c’est ce qu’on appelle la précarité menstruelle. <br />Ces dépenses liées aux menstruations devraient être prises en charge par l’État, et considérer les règles comme sales est irrespectueux envers ces personnes qui n’y ont pas accès.</br>
        <br />
      </p>
      <p class="corpstextegras">
        Personne n’a à choisir entre manger ou avoir des protections hygiéniques, c’est pourquoi des boîtes en libre-service sont à votre disposition à l’ENSC.<br />
        Nous reversons les dons financiers à 3 associations qui sont : Règles Elémentaires, Féminité sans abris et le Planning Familial.
      </p><br />
      <a href="https://lydia-app.com/collect/80479-action-boite-menstruelle/fr" target="_blank">
        <img class="btncagnotte" src="img/cagnottebtn.png"></a>
      <br />
      <br />
      <p class="titrearticle">Tu peux faire un don via notre cagnotte Lydia <br />en cliquant sur ce bouton !</p>

    </div>
    <br />
  </section>

  <section class="footer">
    <br /><br />
    <a href="#" class="flechebas" alt="remonter!"><img src="img/hautpage.png"></a>
    <p class="corpstexte">bas de page !<br />
      <br /><a href="connexion.php"><u>Mode admin</u></a>
    </p>
    <br />
    <br />


  </section>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
<?php
session_start();
include('tryandcatch.php');

?>
<!DOCTYPE html>
<html>

<head>
  <?php $pagetitre = "Mode Admin";
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

    <div class="fondimage">
      <div class="casenoire">
        <h1>Ajout d'une définition dans le lexique</h1> <br />

        <form action="adminBddLexique.php" method="POST">

          <div class="col-5">
            <p class="corpstextearticle">
              <label class="barretexte" for="motdef"> Mot : </label>
              <input type="text" name="motdef" class="form-control" required>
            </p>
          </div>
          <div class="col-12">
            <p class="corpstextearticle">
              <label class="barretexte" for="def"> Définition : </label>
              <textarea name="def" class="form-control" rows="1" style="resize:none" required></textarea>
            </p>
          </div>
          <br />
          <input type="submit" value="Ajouter" class="boutonmenu" />
          </p>

        </form>

      </div>
    </div>
    <br /><br />
    <br /><br />

  </section>

  <section class="footer">
    <br /><br />
    <a href="#" class="flechebas" alt="remonter!"><img src="img/hautpage.png"></a>
    <p class="corpstexte">bas de page !<br />
      <br /><a href="deconnexion.php"><u>Déconnexion</u></a>
    </p>
    <br />
    <br />


  </section>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
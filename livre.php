<!DOCTYPE html>
<html>

<head>
  <?php $pagetitre = "Découvrir : Littérature";
  require_once 'head.php';
  include('tryandcatch.php');
  ?>
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

    <p class="titrepage">Littérature</p>

    <div class="caseblanche">

      <?php
      //Requête pour afficher les données des articles histoire la BDD
      $requete = $bdd->prepare("SELECT * FROM ressource WHERE categorie='Livre' ORDER BY id");
      $execution = $requete->execute();
      $ressources = $requete->fetchall();

      //Fonction qui permet de tronquer le contenu des articles
      function tronquetexte($text, $length)
      {
        if (strlen($text) <= $length) return $text;
        return trim(substr($text, 0, $length));
      }
      ?>

      <?php
      //On fait un foreach afin d'afficher tous les articles du thème histoire
      foreach ($ressources as $ressource) : ?>

        <div class="flex-container">
          <div class="flex-item">
            <a <?php echo "href=affichageRessource.php?id=" . $ressource["ID"] ?> />
            <?php echo '<img class="couverturearticle" src="img/' . $ressource["couverture"] . '">'; ?> </a>

            <p class="titrearticle"><?php echo $ressource['titre']; ?></p>

            <p class="corpstextearticle"> <?php echo tronquetexte($ressource['contenu'], 200) . '...'; ?>
              <a <?php echo "href=affichageRessource.php?id=" . $ressource["ID"] ?> />lire la suite</a>
            </p>
            <hr /><br /><br />
          </div>
        </div>

      <?php endforeach; ?>

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
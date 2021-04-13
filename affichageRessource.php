<!DOCTYPE html>
<html>

<head>
  <?php $pagetitre = "Histoire";
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

    <?php
    //Requête pour afficher les données de l'article de la BDD

    $requete = $bdd->query("SELECT * FROM ressource WHERE ID=".$_GET["id"]);
    $ressource = $requete->fetch();

    //Requêtes pour naviguer d'articles en articles
    $idsuiv=$_GET["id"]+1;
    $idprec=$_GET["id"]-1;

    $requete2 = $bdd->query("SELECT MAX(ID) FROM ressource");
    $maxid = $requete2->fetch();

    $requete3 = $bdd->query("SELECT MIN(ID) FROM ressource");
    $minid = $requete3->fetch();

    if ($idprec==0)
    {
        $idprec=$maxid['0'];
    }

    if ($idsuiv==$maxid['0']+1)
    {
        $idsuiv=$minid['0'];
    }
    ?>

    <p class="titrepage"><?php echo $ressource['categorie']; ?></p>

    <div class="caseblanche">
      <table>
        <tr>
          <td class="flecheg"> <a <?php echo "href=affichageRessource.php?id=".$idprec?> /> <img class="fleche" src="img/flechegch.png" alt="flèche"></a></td>
          <td class="couv"> <?php echo '<img class="entetearticle" src="img/' . $ressource["couverture"] . '">'; ?></td>
          <td class="fleched"> <a <?php echo "href=affichageRessource.php?id=".$idsuiv?> /><img class="fleche" src="img/flechedrt.png" alt="flèche"></a></td>
      </table>

      <p class="titrearticle"><?php echo $ressource['titre']; ?></p>
      <hr />
      <p class="corpslongtexte"> <?php echo nl2br($ressource['contenu']); ?></p>
      <br /><br />
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
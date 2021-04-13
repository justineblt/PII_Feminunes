<!DOCTYPE html>
<html>

<head>
    <?php $pagetitre = "Lexique";
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

        <?php //Requête pour récupérer le lexique de la BDD
        $lexique = $bdd->query('SELECT * from lexique ORDER BY mot');

        if (isset($_GET['def']) and !empty($_GET['def'])) {
            $def = htmlspecialchars($_GET['def']);
            $lexique = $bdd->query('SELECT * from lexique WHERE mot LIKE "%' . $def . '%" ORDER BY mot');
        }
        ?>
        <p class="titrepage">Lexique</p>

        <div class="caseblanche">
            <p class="corpstexte">Ce dictionnaire regroupe des termes utilisés dans le milieu féministe afin d'éclairer les néophytes sur les usages actuels de certains mots. Ce lexique n'a pas vocation à produire des définitions linguistiques, mais part d'une volonté d'améliorer l'accessibilité. Il est bien entendu que toutes ces explications sont par essence flottantes et en aucun cas figées et fermées.<br /></p>

            <form methode="GET">
                <p class="corpstextecenter">
                    <br />
                    <input type="search" name="def" size="80" placeholder="Recherche d'un terme..." />
                    <input type="submit" value="Valider" class="btnrecherche" />
                    <input type="submit" value="Restaurer" name="restaurer" class="btnrecherche" />
                </p>
                <br />

            </form>
            <hr /> <br />

            <?php //Gestion de l'affichage de la recherche
            if ($lexique->rowCount() > 0) { ?>
                <ul>
                    <?php while ($m = $lexique->fetch()) { ?>
                        <li>
                            <p class="corpstexte"><u><?= $m['mot'] ?></u> : <?= $m['definition'] ?>
                        </li>
                        </p>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p class="corpstexte">Aucun résultat pour "<?= $def ?>"...</p><?php } ?>

            <?php //Bouton "Restaurer"
            if (isset($_GET['restaurer']) and !empty($_GET['def'])) {
                $lexique = $bdd->query('SELECT * from lexique ORDER BY mot');
                while ($m = $lexique->fetch()) { ?>
                    <li>
                        <p class="corpstexte"><u><?= $m['mot'] ?></u> : <?= $m['definition'] ?>
                    </li>
                    </p>
            <?php }
            } ?>
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
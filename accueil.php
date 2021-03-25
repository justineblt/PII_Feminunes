<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>    
	<?php $pagetitre="Accueil Fémin'Unes";
  require_once 'head.php'; ?>
</head>

<body>

    <section class="bandeau">
    <a href="accueil.php"><img class="logo" src="img/logo.png" alt="Logo Fémin'Unes"></a>
    <a href="articles.php"><button type="button" class="boutonmenu">  ARTICLES  </button></a>
    <a href="decouvrir.php"><button type="button" class="boutonmenu">  DECOUVRIR  </button></a>
    <a href="lexique.php"><button type="button" class="boutonmenu">  LEXIQUE  </button></a>
    <a href="soutenir.php"><button type="button" class="boutonmenu">  SOUTENIR  </button></a>
    <a href="contact.php"><button type="button" class="boutonmenu">  CONTACT  </button></a>

    <a href="https://www.instagram.com/femin.unes/" target="_blank"><img class="logors" src="img/logoinsta.png" alt="Fémin'Unes instagram"></a>
    <a href="https://www.facebook.com/femin.unes/" target="_blank"><img class="logors" src="img/logofb.png" alt="Fémin'Unes Facebook"></a>
    </section>

<section class="body">   

<div class="fondimage">
  <div class="casenoire">  
    <h1>Bienvenue sur Fémin'Unes !</h1>
    <h2>Qui sommes-nous ?</h2>
    <p class="corpstexte">
    test<br/> blabla<br/> blabla<br/> blabla<br/> blabla<br/>
    </p>
  </div>	
</div>
<br/><br/>


<div class="caseblanche">  
    <h1>Définition du jour</h1>
    <p class="corpstexte">
    Aro : "définition...."
    </p>

  </div>	
<br/><br/><br/>

<!-- CAROUSEL
-->

<div id="carouselExemple" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="5000">

        <ol class="carousel-indicators">
            <li data-target="#carouselExemple" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExemple" data-slide-to="1"></li>
            <li data-target="#carouselExemple" data-slide-to="2"></li>
        </ol>


        <div class="carousel-inner">

            <div class="carousel-item active">
              <div class="carousel-col">
                <a href="Rojava.php"><img src="img/1rojava.png"
                    class="d-block" alt="rojava"></a>
              </div>
              <div class="carousel-col">
                <img src="img/1intersec.png"
                    class="d-block" alt="intersectionnalité">
              </div>
              <div class="carousel-col">
                <img src="img/1temoignage.png"
                    class="d-block" alt="témoignage">
              </div>
              <div class="carousel-col">
                <img src="img/1angela.png"
                    class="d-block" alt="angela davis">
              </div>
            </div>

            <div class="carousel-item">
              <div class="carousel-col">
                <img src="img/1varda.png"
                    class="d-block" alt="agnès varda">
              </div>
              <div class="carousel-col">
                <img src="img/1cultureviol.png"
                    class="d-block" alt="culture du viol">
              </div>
              <div class="carousel-col">
                <img src="img/1temoignage2.png"
                    class="d-block" alt=témoignage">
              </div>
              <div class="carousel-col">
                <img src="img/125nov.png"
                    class="d-block" alt="25 novembre">
              </div>
            </div>

            <div class="carousel-item">
              <div class="carousel-col">
                <img src="img/1precaritemens.png"
                    class="d-block" alt="précarité menstruelle">
              </div>
              <div class="carousel-col">
                <img src="img/1clitoris.png"
                    class="d-block" alt="clitoris">
              </div>
              <div class="carousel-col">
                <img src="img/1despentes.png"
                    class="d-block" alt="virginie despentes">
              </div>
              <div class="carousel-col">
                <img src="img/1sexisme.png"
                    class="d-block" alt="sexisme ordinaire">
              </div>
            </div>
        

        </div>

        <a href="#carouselExemple" class="carousel-control-prev" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="ture"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a href="#carouselExemple" class="carousel-control-next" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>


    <script>

        $('.carousel[data-type="multi"] .item').each(function() {
	var next = $(this).next();
	if (!next.length) {
		next = $(this).siblings(':first');
	}
	next.children(':first-child').clone().appendTo($(this));

  for (var i = 0; i < 2; i++) {
		next = next.next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}

		next.children(':first-child').clone().appendTo($(this));
	}
});
    </script>


<br/><br/>

</section>

<section class="footer">
<br/><br/>
<a href="#" class="flechebas" alt="remonter!"><img src="img/hautpage.png"></a>
<p class="corpstexte">bas de page !<br/>
  <br/><a href="connexion.php"><u>Mode admin</u></a>
</p>
<br/>
<br/>


</section>
   
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>

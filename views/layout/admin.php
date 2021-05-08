<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <link rel="stylesheet" type="text/css" href="/<?=WEBROOT2?>/webroot/css/style.css">

    <title>WikiFFX</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Administrateur</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/<?=WEBROOT2?>/">Accueil admin |<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/<?=WEBROOT2?>/monstres">Monstres |<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/<?=WEBROOT2?>/monstres/adminIndex">Admin Monstres | <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/<?=WEBROOT2?>/locations">Lieux |<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/<?=WEBROOT2?>/locations/adminIndex">Admin Lieux |<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/<?=WEBROOT2?>/items_clefs">Items clefs |<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/<?=WEBROOT2?>/items_clefs/adminIndex">Admin Items clefs |<span class="sr-only"></span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="/<?=WEBROOT2?>/search/">
      <input class="form-control mr-sm-2" name="q" type="search" value="<?php if(isset($_GET['q'])) echo $_GET['q']; ?>" placeholder="Recherche..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">🔍</button>
    </form>
    <div>&nbsp;</div>
    <form class="form-inline my-2 my-lg-0" action="/<?=WEBROOT2?>/comptes/logout">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Déconnexion</button>
    </form>
  </div>
</nav>
	<div class="container bg-light">
		<?php
			echo $this->Session->flash();
		?>
	</div>

	<div class="container">
	  <!--<img src="/<?=WEBROOT2?>/webroot/img/logo.jpg">-->

	  <div class="row">
		<div class="col-sm">
		<?php

		echo $content_for_layout;

		?>
		</div>
	  </div>
      <!-- FOOTER -->
      <footer class="container">
        <hr>
        <div class="float-right"><a href="#">Retour en haut</a></div>
        <p>FFX Wiki &copy; 2020-2021 Echo Golf & Juliett Delta Inc,</p>
      </footer>
	</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

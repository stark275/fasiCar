<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FasiCar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Fasi<span>Car</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['client'])): ?>
	          <li class="nav-item active"><a href="index.html" class="nav-link">Véhicules</a></li>
	          <li class="nav-item"><a href="login.php" class="nav-link">Connexion</a></li>
            <li class="nav-item"><a href="register.php" class="nav-link">S'inscrire</a></li>
            <?php endif ?>
            
            <?php if (isset($_SESSION['admin'])): ?>
               <li class="nav-item active"><a href="car.list.php" class="nav-link">Véhicules</a></li>
               <li class="nav-item active"><a href="car.locations.php" class="nav-link">Locations</a></li>
               <li class="nav-item active"><a href="logout.php" class="nav-link">Deconnexion</a></li>
               <li class="nav-item active"><strong><?= $_SESSION['nom'] ?></strong></li>
            <?php endif ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
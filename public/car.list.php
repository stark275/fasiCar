<?php
	require dirname(__DIR__).'/classLoader.php';
        // var_dump("looo");
        // die();

        $car = new Car();
        $cars = $car->list();

?>

<?php include('partials/head.php');?>

  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html"> <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Liste des Vehicules</h1>
          </div>
        </div>
      </div>
    </section>
		

	<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
  
				<?php foreach ($cars as $car): ?>
					<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-1.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html"><?= $car->model?></a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat"><?= $car->marque?></span>
	    						<p class="price ml-auto"><?= $car->prix ?> <span>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car.details.php?id=<?= $car->id ?>" class="btn btn-primary py-2 mr-1">Modifier</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
				</div>
				<?php endforeach ?>

    		</div>
    		<div class="row mt-5">
          
        </div>
    	</div>
    </section>
	
<?php include('partials/footer.php');?>

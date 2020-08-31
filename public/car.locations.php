<?php
	require dirname(__DIR__).'/classLoader.php';
     $location = new Location();
    //  echo '<pre>';
	//     var_dump($location->list());
    //       die();
    //  echo '</pre>';
    $locations = $location->list();
    $i = 1;
?>
<?php include('partials/head.php');?>

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
            <h1 class="mb-3 bread">Connexion</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
				<div class="col-md-12">
    			    <table class="table table-bordered">
                         <thead> 
                            <tr> <th>#</th>
                            <th>Vehicules</th>
                            <th>Immatr.</th>
                            <th>Client</th> 
                            <th>Reservation</th>
                            </tr>
                        </thead> 
                        <tbody> 
                            <?php foreach ($locations as $loc): ?>
                                <tr> 
                                    <th scope="row"><?= $i ?></th> 
                                    <td>
                                         <?= $loc->categorie?>, 
                                        <?= $loc->marque?>,
                                        <?= $loc->model?>,
                                        
                                    </td>
                                    <td>
                                        <?= $loc->immatr?>,
                                    </td>
                                    <td> <?= $loc->nom?></td>
                                    <td> <?= $loc->debut.' => <br>'.$loc->fin?></td> 
                                </tr> 
                                <?php $i++;?>
                            <?php endforeach ?>   
                        </tbody>
                    </table>
				</div>
    		</div>
    		<div class="row mt-5">
          
        </div>
    	</div>
    </section>
	
<?php include('partials/footer.php');?>

<?php
    require dirname(__DIR__).'/classLoader.php';
    $errors = [];
     $location = new Location();
    //  echo '<pre>';
	//     var_dump($location->list());
    //       die();
    //  echo '</pre>';
    $locations = $location->list();
    $i = 1;

    if (isset($_POST['filter'])) {
        $errors = $location->checkPeriod();

        if (count($errors) == 0) {
            $locations = $location->byPeriod();
            echo '<pre>';
            var_dump($locations);
            echo '</pre>';
            die();
        }
        
    }

   // (new App())->dateFormate('2/8/2002');
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
                <div class="col-md-6">
                    <form method="post">
                        <!-- <div class="form-group">
                            <label for="sel1">Select list:</label>
                            <select class="form-control" id="sel1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div> -->
                    <dic class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="label">Debut</label>
                                <input type="text" name="debut" class="form-control" id="book_off_date" placeholder="Time">
                            </div>
                        </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="label">Fin</label>
                                <input type="text" name="fin" class="form-control" id="book_off_date" placeholder="Time">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="submit" name="filter" class="form-control btn btn-primary"  value="Filtrer">
                            </div>
                        </div>
                    </dic>

                    

                    </form>
                </div>
            </div>
            
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

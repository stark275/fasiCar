<?php
    require dirname(__DIR__).'/classLoader.php';
    
    $userId = $_SESSION['id'];

    $errors = [];
     $location = new Location();
     $app = new App();
    //  echo '<pre>';
	//     var_dump($location->list());
    //       die();
    //  echo '</pre>';

    $locations = $location->userLocations($userId);

  

    $i = 1;

    if (isset($_POST['delete'])) {
        $idLocaction = $_POST['idLocaction'];
         var_dump($idLocaction);
        $errors = $location->deleteUserLocation($idLocaction);
        var_dump($errors);
        header('Location:user.locations.php');
    }

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
    			    <table class="table table-bordered text-center">
                         <thead> 
                            <tr> <th>#</th>
                            <th>Vehicules</th>
                            <th>Debut</th>
                            <th>Fin</th> 
                            <th>Tarif</th>
                             <th>Annuler</th>
                            </tr>
                        </thead> 
                        <tbody> 
                            <?php foreach ($locations as $loc): ?>
                                <tr> 
                                    <th scope="row"><?= $i ?></th> 
                                    <td>
                                         
                                        <?= $loc->marque?>,
                                        <?= $loc->model?>
                                        
                                    </td>
                                    <td>
                                        <?=$app->dateReFormate($loc->debut) ?>
                                    </td>
                                    <td> <?= $app->dateReFormate($loc->fin) ?></td>
                                    <td><?= $loc->tarif?>$/jour </td>
                                    <td>
                                        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                                            <input type="hidden" name="idLocaction" value="<?= 
                                            $loc->id ?>">
                                            <input type="submit" name="delete" value="Annuler" class="btn btn-danger py-3 px-5">
                                        
                                        </form> 
                                    </td> 
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

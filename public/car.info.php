<?php
    require dirname(__DIR__).'/classLoader.php';
    /*session_start();*/
    
    $car = new Car();

    if (isset($_POST['rent'])) {  
        $rent = new Location();      
        $voiture = $_GET['id'];
        $client = $_SESSION['id'];  
        
        $errors = $rent->rent($voiture,$client);
        var_dump($errors);
    }

    $c = $car->details($_GET['id']);  

    if (count($c) == 0) {
        header('Location:car.list.php');
    }

      
      

  
     

?>
<?php include('partials/head.php');?>
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
            <h1 class="mb-3 bread">Details du Vehicule</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <!-- On Affiche les erreur -->
        

        <div class="row d-flex mb-6 contact-info">
          <div class="col-md-5">
            <div class="car-wrap rounded ftco-animate">
              <div class="img rounded d-flex align-items-end" style="background-image: url(images/car-1.jpg);">
              </div>
              <div class="text">
                <h2 class="mb-0"><a href="car-single.html"><?= $c[0]->model ?></a></h2>
                <div class="d-flex mb-3">
                  <span class="cat"></span>
                  <span class="cat"><?= $c[0]->marque ?></span>
                  <p class="price ml-auto"><?= $c[0]->tarif ?>$/jour</p>
                </div>
               
              </div>
            </div>
        </div>
        
          

          <div class="col-md-6 block-9 mb-md-5">
            
                <form action="#" class="request-form ftco-animate bg-primary" method="POST">
                  <h2>Faites votre reservation</h2>
                  
                  <div class="d-flex">
                    <div class="form-group mr-2">
                      <label for="" class="label">Debut location</label>
                      <input type="text" class="form-control" name="debutLocation" id="book_pick_date" placeholder="Date">
                    </div>
                    <div class="form-group ml-2">
                      <label for="" class="label">Fin location</label>
                      <input type="text" class="form-control" name="finLocation" id="book_off_date" placeholder="Date">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <input type="submit" name="rent" value="Envoyer la demande de location" class="btn btn-secondary py-3 px-4">
                  </div>
                  <?php if(isset($errors) && count($errors) > 0): ?>
                      <?php foreach ($errors as $er): ?>
                          <div class="alert alert-danger" role="alert"><?= $er ?></div>
                      <?php endforeach ?>
                  <?php endif ?>
                </form>
              
              
        </div>
        
      </div>
    </section>

    

    <?php include('partials/footer.php');?>
    
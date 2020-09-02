<?php
	require dirname(__DIR__).'/classLoader.php';
  
    $car = new Car();
     
    if (isset($_POST['update'])) {
        $errors = $car->update($_GET['id']);
    }

    if (isset($_POST['delete'])) {
        $errors = $car->delete($_GET['id']);
        header('Location:car.list.php');
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
        <?php if (isset($errors) && count($errors) > 0): ?>
            <?php foreach ($errors as $er): ?>
                <div class="alert alert-danger" role="alert"><?= $er ?></div>
            <?php endforeach ?>
        <?php endif ?>

        <?php if (isset($errors) && count($errors) == 0): ?>
            
                <div class="alert alert-success" role="alert"> mise à jour effectuée</div>
            
        <?php endif ?>

        <div class="row d-flex mb-5 contact-info">
        
          <div class="col-md-7 block-9 mb-md-5">
            <form action="#" class="bg-light p-5 contact-form" method="post">
                
              <div class="form-group">
                <input type="text" name="categorie" class="form-control" value="<?= $c[0]->categorie ?>">
              </div>
              <div class="form-group">
                <input type="text" name="marque" class="form-control" value="<?= $c[0]->marque ?>">
              </div>
              <div class="form-group">
                <input type="text" name="model" class="form-control" value="<?= $c[0]->model ?>">
              </div>
             
              <div class="form-group">
                <input type="submit" name="update" value="Mise à jour" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-5">
              <form action="#" class="bg-light p-5 contact-form" method="post">
              <div class="form-group">
                <input type="submit" name="delete" value="supprimer" class="btn btn-danger py-3 px-5">
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </section>

    <?php include('partials/footer.php');?>
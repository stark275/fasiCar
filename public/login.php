
<?php
require dirname(__DIR__).'/classLoader.php';
?>

    <?php 
   
    if(isset($_POST['connexion'])){
      
      //extract($_POST);
      var_dump($_POST);
     // die();
      $mail = $_POST['mail'];
      $password= $_POST['password'];
      
      if(($mail!=null) && ($password!=null)){

        $user = new Client();
        $user = $user->login($mail, $password);
        if(!$user)
        {
          echo "E-mail et/ou mot de passe incorrect(s)";
        }
        else
        { 
         /* var_dump($user);
          die(); */       
          $_SESSION['id'] = $user[0]->id;
          $_SESSION['pseudo'] = $user[0]->pseudo;          
          //$_SESSION['id'] = $user.id;
          header('Location: index.php');
        }
      }  
    }
   ?>


<?php include('partials/head.php');?>

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
            <h1 class="mb-3 bread">Connexion</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
        
          <div class="col-md-7 block-9 mb-md-5">

            <form  method="POST" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" name="mail" placeholder="Adresse Mail">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Mot de passe">
              </div>
              
              <div class="form-group">
                <input type="submit"  name="connexion" value="Connexion" class="btn btn-primary py-3 px-5">
          
          </div>
        </div>
        
      </div>
    </section>


<?php include('partials/footer.php');?>

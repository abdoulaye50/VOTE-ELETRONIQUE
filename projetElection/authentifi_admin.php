<?php
 session_start();
 session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create User Registration and Login using PHP Oops Concepts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand"><marquee>Espace Administrateur</marquee></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">ACCUEIL</a>
      </li>
  </div>
</nav>


<?php  
  include_once "database.php";
  include_once "admin.php";

  $admintObj = new Admin();
  
  $success = "";
  $error = "";

  if (isset($_POST['submit'])) {
      $newdata['email'] = $_POST['email'];
      $newdata['password'] = $_POST['password'];
      
      if ($adminObj->login($newdata)) {
          if (!isset($_SESSION['id'])) {
              header("Location:pages-admin/espace_admin.php");
          } else {  
              header("Location:pages-admin/acceuil.php");
          }
      }else{
          $error = "Email ou mot de passe incorrect";
      }
    }
?>


    <br><br><br>
   <div class="container text-center">
      <?php 
      if (!empty($error)){
          echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>$error
              </div>";   
        }
      ?>
      <div class="row justify-content-center">
      <div class="card  shadow-lg p-3 mb-5 bg-white rounded" style="width: 30rem;">
         <div class="card-body login-card-body">
            <h4 class="login-box-msg">Connectez-vous  pour démarrer votre session</h4>
            <img src="images/pngegg1.png" class="p-3" width="230px" height="200px">
            <form action="" method="post">
               <div class="input-group mb-3">
                  <input type="text" name="email" class="form-control" placeholder="Entrer votre email" required="">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fa fa-envelope"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe" required="">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fa fa-lock"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-8">
                     <div class="icheck-primary">
                        <a href="" class="text-center"></a>
                     </div>
                  </div>
                  <div class="col-4">
                     <input type="submit" name="submit" class="btn btn-primary btn-block" value="S'identifier">
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   </div>
   </div>

   <!-- scriptcdn -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
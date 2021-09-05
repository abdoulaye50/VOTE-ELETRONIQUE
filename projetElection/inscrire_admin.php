<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create User Registration and Login using PHP Oops Concepts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<?php

include_once "admin.php";

$adminObj = new Admin();

$success = "";
$error = "";

if (isset($_POST['submit'])) {
	$newdata['name'] = $_POST['name'];
	$newdata['email'] = $_POST['email'];
	$newdata['password'] = md5($_POST['password']);
	$newdata['phone'] = $_POST['phone'];
	$newdata['registration_date'] = date('Y-m-d');

	if (!$adminObj->isUserPhoneNumberExists($newdata['phone'])) {
	    if (!$adminObj->isUserExist($newdata['email'])) {
	       if ($adminObj->registration($newdata)) {
                 $success = "Votre inscription avec succès Veuillez vous connecter";
	       } else {
		  $error = "L'enregistrement a échoué, veuillez réessayer !";
	      }
	    } else {
	        $error = "L'email existe déjà! Veuillez réessayer.";
	    }
	} else {
	    $error = "Le numéro de téléphone existe déjà ! Veuillez réessayer.";
	}
}

?>

<body>
    <div class="container text-center">
    <br><br><br>  
      <?php
         if (!empty($error)) {
         	echo "<div class='alert alert-danger alert-dismissible'>
                     <button type='button' class='close' data-dismiss='alert'>&times;</button>$error
                  </div>";
         } elseif (!empty($success)) {
         	echo "<div class='alert alert-success alert-dismissible'>
                     <button type='button' class='close' data-dismiss='alert'>&times;</button>$success
                  </div>";
         }
      ?>
      <div class="row justify-content-center">
      <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 30rem;">
         <div class="card-body register-card-body">
            <h4 class="login-box-msg">S'inscrire</h4>
            <img src="images/resistre.png" class="p-1" width="180px" height="180px">
            <form action="" method="post">
               <div class="input-group mb-4">
                  <input type="text" name="name" class="form-control" placeholder="Votre nom complet" required="">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fa fa-user"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-4">
                  <input type="email" name="email" class="form-control" placeholder="Votre email" required="">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fa fa-envelope"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-4">
                  <input type="password" name="password" class="form-control" placeholder="Votre mot de pas" required="">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fa fa-lock"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-4">
                  <input type="text" name="phone" class="form-control" placeholder="Votre numéro de tél" required="" maxlength="10">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fa fa-phone"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-8">
                     <a href="index.php" class="text-center"></a>
                  </div>
                  <div class="col-md-4">
                     <input type="submit" name="submit" class="btn btn-primary btn-block" value="S'inscrire">
                  </div>
               </div>
            </form>
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
<?php  
session_start();

if(isset($_SESSION['id'])){

  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <title>LISTE DES CANDIDATS</title>
  </head>
  <body>  

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <h3 class="navbar-brand"><u>ELECTION DU SENEGAL</u></h3>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="../index.php">ACCUEIL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listeCandidat.php">LISTE DES CANDIDATS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listeelecteur.php">LISTE DES ELECTEURS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listeVote.php">LISTE DES VOTANTS</a>
      </li>
      <li class="nav-item dropdown">
      <li class="nav-item">
        <a class="nav-link" href="ajoutCandidat.php">AJOUTE CANDIDATS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="resultat.php">RESULTATS</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-success text-white my-2 my-sm-0 " ><a href="../destroy.php" class="text-white">DECONNECTER</a></button>
    </form>
  </div>
</nav>

<div class="container class="mt-5">
<h1 class="text-center mt-5"><u>Resultat des votes </u> </h1>

<?php
     include '../modele.php';
      $model = new Election();
      $rows = $model->listeVote();
      $electeur = $model->listeElecteur();
      $i= 1;
      if(!empty($rows)){
    //    foreach($rows as $row){
         ?>
    <h3>Nombre des inscrits : <?php echo count($electeur); ?></h3>
    <h3>Nombre des votants : <?php echo count($rows); ?></h3>



    <?php
        }
    //    }
      ?>
  <?php

   
    $row = $model->id6();
    $rowv = $model->id6V();
    if(!empty($row) and !empty($rowv)){

    ?>
    <div class="card">
    <div class="card-header">
    <h2 class="text-center">resultats</h2>
    </div>
    <div class="card-body">

    <p><b><?php echo $row['prenom_candidat']; ?> <?php echo $row['nom_candidat']; ?> :</b><span style="font-size:20px;"> a <?php echo count($rowv); ?> voix</span></p>
   
    <?php
    $row = $model->id7();
    $rowv = $model->id7V();
    if(!empty($row) and !empty($rowv)){
    ?>
    <p><b><?php echo $row['prenom_candidat']; ?> <?php echo $row['nom_candidat']; ?> :</b><span style="font-size:20px;"> a <?php echo count($rowv); ?> voix</span></p>
    <?php
    $row = $model->id9();
    $rowv = $model->id9V();
    if(!empty($row) and !empty($rowv)){
    ?>
    <p><b><?php echo $row['prenom_candidat']; ?> <?php echo $row['nom_candidat']; ?> :</b><span style="font-size:20px;"> a <?php echo count($rowv); ?> voix</span></p>

    <?php
    $row = $model->id10();
    $rowv = $model->id10V();
    if(!empty($row) and !empty($rowv)){
    ?>
    <p><b><?php echo $row['prenom_candidat']; ?> <?php echo $row['nom_candidat']; ?> :</b><span style="font-size:20px;"> a <?php echo count($rowv); ?> voix</span></p>
    <?php
    $row = $model->id13();
    $rowv = $model->id13V();
    if(!empty($row) and !empty($rowv)){
    ?>
    <p><b><?php echo $row['prenom_candidat']; ?> <?php echo $row['nom_candidat']; ?> :</b><span style="font-size:20px;"> a <?php echo count($rowv); ?> voix</span></p>




      </div>
      </div>
      <?php
      }else{
      echo "no data";
      }
      }
    }
  }
  }
  ?>
</div>
               <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
  }else{
  header('Location: http://vote/Admin_Electeur/authentifi_admin.php');
}
?>

</body>
</html>
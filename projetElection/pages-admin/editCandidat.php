<?php  session_start();



  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
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
        <a class="nav-link" href="listeCandidat.php#">LISTE DES CANDIDATS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listeelecteur.php#">LISTE DES ELECTEURS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listeVote.php#">LISTE DES VOTANTS</a>
      </li>
      <li class="nav-item dropdown">
      <li class="nav-item">
        <a class="nav-link" href="ajoutCandidat.php#">AJOUTE CANDIDATS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="resultat.php#">RESULTATS</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-success text-white my-2 my-sm-0 " ><a href="../destroy.php#" class="text-white">DECONNECTER</a></button>
    </form>
  </div>
</nav>

    <div class="container">
<?php

include '../modele.php';
$model = new Election();
$id = $_REQUEST['id'];
$row = $model->edit($id);

if(isset($_POST['modifie'])){
    if (isset($_POST['nom_candidat']) && isset($_POST['prenom_candidat']) && isset($_POST['nom_partie']) && isset($_POST['profession']) && isset($_POST['matricule'])) {
        if (!empty($_POST['nom_candidat']) && !empty($_POST['prenom_candidat']) && !empty($_POST['nom_partie']) && !empty($_POST['profession']) && !empty($_POST['matricule'])) {
            
            $data['id_candidat'] = $id;
            $data['nom_candidat'] = $_POST['nom_candidat'];
            $data['prenom_candidat'] = $_POST['prenom_candidat'];
            $data['nom_partie'] = $_POST['nom_partie'];
            $data['profession'] = $_POST['profession'];
            $data['matricule'] = $_POST['matricule'];

            $update = $model->update($data);

            if($update){
                echo "<script>alert('mise à jour de l'enregistrement avec succès');</script>";
                echo "<script>window.location.href = 'listeCandidat.php';</script>";
              }else{
                echo "<script>alert('échec de la mise à jour');</script>";
              }

            }else{
              echo "<script>alert('Vide');</script>";
              header("Location: edit.php?id_candidat=$id");
            }
          }

  }
?>


  <div class="row justify-content-center">
    <div class="card shadow-lg p-2 mb-5 bg-white rounded" style="width: 60rem;">
         <div class="card-body register-card-body">
            <h1 class="login-box-msg text-center">Modifier Candiddat</h1>
            <div class="text-center">
            <img src="images/candidat.png" class="p-1" width="180px" height="180px">
          </div>
    <div class="card-body">
    <form method="POST">
         
        <div class="form-group">
        <label for="">Nom Candiddat</label>
          <input type="text" name="nom_candidat" value="<?php echo $row['nom_candidat']; ?>" class="form-control" >
        </div>

        <div class="form-group">
        <label for="">Prenom Candiddat</label>
          <input type="text" name="prenom_candidat" value="<?php echo $row['prenom_candidat']; ?>" class="form-control" >
        </div>

        <div class="form-group">
        <label for="">Nom Partie</label>
          <input type="text" name="nom_partie" value="<?php echo $row['nom_partie']; ?>" class="form-control" >
        </div>
        
        <div class="form-group">
        <label for="">profession</label>
          <input type="text" name="profession" size=50 value="<?php echo $row['profession']; ?>"  class="form-control">
        </div>
        <div class="form-group">
        <label for="">Matricule</label>
          <input type="text" name="matricule" value="<?php echo $row['matricule']; ?>"  class="form-control">
        </div>

       
        <div class="form-group mt-3">
           <input type="submit" name="modifie" value="ENREGISTRER"class="form-control">
        </div>
      </form>
  </div>
  </div>
</div>
</body>
</html>

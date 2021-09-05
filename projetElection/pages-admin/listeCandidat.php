<?php  session_start();



  ?>
 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
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
       <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">LISTE DES CANDIDATS</h1>
                <hr style="height: 2px; color:black; background-color:black"> 
            </div>
       </div>
       <div class="row">
           <div class="col-md-12">
               <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>NOM</th>
                            <th>PRENOM </th>
                            <th>PARTIE</th>
                            <th>POFESSION</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php

                    include '../modele.php';
                    $model = new Election();
                    $rows = $model->listeCandidat();
                   
                    $i= 1;
                    if(!empty($rows)){
                        foreach($rows as $row){
                
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['nom_candidat'];?></td>
                            <td><?php echo $row['prenom_candidat']; ?></td>
                            <td><?php echo $row['nom_partie']; ?></td>
                            <td><?php echo $row['profession']; ?></td>
                            <td>


                                <a href="editCandidat?id=<?php echo $row['id_candidat']; ?>" class="btn btn-info">Modifier</a>
                                <a href="supprime.php?id=<?php echo $row['id_candidat']; ?>" class="btn btn-danger">Supprimer</a>
                             
                            </td>
                        </tr>
                        <?php
                         }
                    }
                        ?>
                    </tbody>
                  </table>
           </div>
       </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
   
  </body>
</html>
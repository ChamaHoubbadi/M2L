<?php
include 'header.php';
$formation = mysqli_query($con,"Select * from formation order by date_debut asc");


if(isset($_GET['inscr'])){
  if(!isset($_SESSION['id'])){
    echo '<script type="text/javascript"> alert("Veuillez vous connecter a votre compte d\'abord"); window.location.href = "connexion.php"; </script>';
  }
  else{

    $idf=$_GET['inscr'];
    $id=$_SESSION['id'];
    $sql="insert into participant (id_formation,id) values ('$idf','$id')";
    if(mysqli_query($con,$sql)){
      echo '<script type="text/javascript"> alert("Votre inscription a bien été prise en compte!"); window.location.href = "formation.php?mes"; </script>';
    }
  }


}
if(isset($_GET['remove'])){
  $id=$_SESSION['id'];
  if(mysqli_query($con,"DELETE FROM participant WHERE id_formation=".$_GET['remove']." and id=$id")){
      header("Location: formation.php?mes");
  }
}
if(isset($_SESSION['id'])){
  $mesformations = mysqli_query($con,"select * from formation, participant where participant.id_formation = formation.id_formation and participant.id = ".$_SESSION['id']."");
}
  

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+2&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">

  <title>M2L - Formation</title>
</head>
<body>

  <main role="main" class="container p-5">
    <?php if(isset($_GET['mes']) ) { ?>
    <div class="row justify-content-md-center px-5">
      <h5><i class="fa fa-graduation-cap"></i> Mes formations :</h5>
      <table class="table table-striped table-bordered mt-3" style='max-width: 50rem;'>
        <thead>
          <tr>
            <th scope="col">Description</th>
            <th scope="col">Date debut</th>
            <th scope="col">Date fin</th>
            <th scope="col">Cout</th>
            <th style="width:7em;" scope="col">S'inscrire</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_array($mesformations)) { ?>
            <tr>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['date_debut']; ?></td>
              <td><?php echo $row['date_fin']; ?></td>
              <td><?php echo $row['cout']; ?> Euros</td>
              <td class="text-center h4"><a href="formation.php?remove=<?php echo $row['id_formation']; ?>" ><i class="fa fa-trash-alt text-danger"></i></a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <?php } else { ?>
    <div class="row justify-content-md-center px-5">
      <?php if(isset($_SESSION['id'])) { ?>
      <div class="d-flex justify-content-between mb-2" style='width: 50rem;'>
        <div>
          <h5 class="mt-2"><i class="fa fa-graduation-cap"></i> Liste des formations disponibles :</h5>
        </div>
        <div>
          <a class="btn btn-info" href="formation.php?mes"><i class="fa fa-user"></i> Mes formations</a>
        </div>
      </div>
    <?php } else { ?>
      <h5><i class="fa fa-graduation-cap"></i> Liste des formations disponibles :</h5>
    <?php } ?>
      <table class="table table-striped table-bordered mt-3" style='max-width: 50rem;'>
        <thead>
          <tr>
            <th scope="col">Description</th>
            <th scope="col">Date debut</th>
            <th scope="col">Date fin</th>
            <th scope="col">Cout</th>
            <th style="width:7em;" scope="col">S'inscrire</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_array($formation)) { ?>
            <tr>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['date_debut']; ?></td>
              <td><?php echo $row['date_fin']; ?></td>
              <td><?php echo $row['cout']; ?> Euros</td>
              <td class="text-center h4"><a href="formation.php?inscr=<?php echo $row['id_formation']; ?>" ><i class="fa fa-plus-square text-info"></i></a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <?php } ?>
  </main>

  <footer class="footer">
    <div class="container">
      <div class="footer-copyright text-center">© 2022 By Chaymae Houbbadi - 
        <a href="mentions_legales.php"> Mentions légales</a>
      </div>
    </div>
  </footer>
</main>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
include 'header.php';
if(!isset($_SESSION['id']) && !$_SESSION['isAdmin']){
  header("Location: index.php");
}

$formation = mysqli_query($con,"Select * from formation order by date_debut asc");

if(isset($_GET["remove"])){
  $sql = "DELETE FROM participant WHERE id_formation=".$_GET['remove'].";";
  $sql .= "DELETE FROM formation WHERE id_formation=".$_GET['remove']."";
  $delete = mysqli_multi_query($con, $sql) or die("database error:". mysqli_error($con));
  if($delete){
    header("Location: gestion_formation.php");   
  }
}
elseif(isset($_POST['addformation'])){
  $date_debut=htmlspecialchars($_POST['dated']);
  $date_fin=htmlspecialchars($_POST['datef']);
  $cout=htmlspecialchars($_POST['cout']);
  $description=htmlspecialchars($_POST['description']);
  $sql = "INSERT INTO formation (date_debut, date_fin, cout,description) VALUES ('$date_debut', '$date_fin', '$cout',' $description')";
  if(mysqli_query($con,$sql)){
    header("Location: gestion_formation.php"); 
  }
}
elseif(isset($_POST['editformation'])){
  $date_debut=htmlspecialchars($_POST['dated']);
  $date_fin=htmlspecialchars($_POST['datef']);
  $cout=htmlspecialchars($_POST['cout']);
  $description=htmlspecialchars($_POST['description']);
  $sql = "UPDATE  formation SET  date_debut ='$date_debut' , date_fin ='$date_fin', cout='$cout', description='$description' WHERE id_formation=".$_POST['id_formation']."";

  if(mysqli_query($con,$sql)){
    header("Location: gestion_formation.php"); 
  }
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
  <title>M2L - Gestion formation</title>
</head>
<body>

  <main role="main" class="container p-5">
    <div class="container">
      <?php if(isset($_GET["ajouter"])){ ?>
        <h5 class="text-center"><i class="fa fa-graduation-cap"></i> Ajouter une formation<br><br></h5>
        <div class="row justify-content-md-center px-5">
          <form action="gestion_formation.php" method="post" class="px-5" style='width: 40rem;'>
            <label for="dated">Date début :</label>
            <input type="date" id="dated" class="form-control mb-3" name="dated" required autofocus>
            <label for="datef" >Date fin :</label>
            <input type="date" id="datef" class="form-control mb-3" name="datef" required>
            <label for="cout" >Cout :</label>
            <input type="number" id="cout" class="form-control mb-3" name="cout" required>
            <label for="description" >Description :</label>
            <textarea type="text" id="description" class="form-control" name="description" required></textarea>
            <div class="row justify-content-md-center">
              <button class="btn btn-info btn-block mt-3 pt-2 w-25 mr-3" name="addformation" type="submit">Ajouter</button>
              <a href='gestion_formation.php' class="btn btn-light btn-block mt-3 pt-2 w-25">Annuler</a>
            </div>
            <br>
          </form>
        </div>
      <?php } elseif(isset($_GET["edit"])){ 
        $edit = 'select * from formation where id_formation = ' . $_GET["edit"];
        $editinfo = mysqli_fetch_assoc(mysqli_query($con,$edit));
        ?>
        <h5 class="text-center"><i class="fa fa-graduation-cap"></i> Modifier la formation<br><br></h5>
        <div class="row justify-content-md-center px-5">
          <form action="gestion_formation.php" method="post" class="px-5" style='width: 40rem;'>
            <label for="dated">Date début :</label>
            <input type="date" id="dated" class="form-control mb-3" name="dated" value='<?php echo $editinfo['date_debut']; ?>' required autofocus>
            <label for="datef" >Date fin :</label>
            <input type="date" id="datef" class="form-control mb-3" name="datef" value='<?php echo $editinfo['date_fin']; ?>' required>
            <label for="cout" >Cout :</label>
            <input type="number" id="cout" class="form-control mb-3" name="cout" value='<?php echo $editinfo['cout']; ?>' required>
            <label for="description" >Description :</label>
            <textarea type="text" id="description" class="form-control" name="description" required><?php echo $editinfo['description']; ?></textarea>
            <input name="id_formation" value="<?php echo $_GET['edit']; ?>" type="hidden">
            <div class="row justify-content-md-center">
              <button class="btn btn-info btn-block mt-3 pt-2 w-25 mr-3" name="editformation" type="submit">Modifier</button>
              <a href='gestion_formation.php' class="btn btn-light btn-block mt-3 pt-2 w-25">Annuler</a>
            </div>
            <br>
          </form>
        </div>
      <?php } else { ?>
        <div class="row justify-content-md-center px-5">
          <div class="d-flex justify-content-between mb-2" style='width: 50rem;'>
            <div>
              <h5 class="mt-2"><i class="fa fa-graduation-cap"></i> Gestion de formation</h5>
            </div>
            <div>
              <a class="btn btn-info" href="gestion_formation.php?ajouter"><i class="fa fa-user"></i> Ajouter une formation</a>
            </div>
          </div>
          <table class="table table-striped table-bordered mt-3" style='max-width: 50rem;'>
            <thead>
              <tr>
                <th scope="col">Description</th>
                <th scope="col">Date debut</th>
                <th scope="col">Date fin</th>
                <th scope="col">Cout</th>
                <th style="width:7em;" scope="col">Action</th>
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
                  <td class="text-center h5"><a class="pr-3" href="gestion_formation.php?edit=<?php echo $row['id_formation']; ?>" ><i class="fa fa-pen text-primary"></i></a><a href="gestion_formation.php?remove=<?php echo $row['id_formation']; ?>" ><i class="fa fa-trash-alt text-danger"></i></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      <?php } ?>
    </div> 
  </main>

  <footer class="footer">
    <div class="container">
      <div class="footer-copyright text-center">© 2020 By Anas Elyassai - 
        <a href="mentions_legales.php" class="text-info"> Mentions légales</a>
      </div>
    </div>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</body>
</html>
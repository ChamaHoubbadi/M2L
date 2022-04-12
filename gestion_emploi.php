<?php
include 'header.php';
if(!isset($_SESSION['id']) && !$_SESSION['isAdmin']){
  header("Location: index.php");
}

$emploi = mysqli_query($con,"Select * from emploi order by id desc");

if(isset($_GET["remove"])){
  $sql="DELETE FROM emploi where id=".$_GET["remove"]."";
  $delete = mysqli_multi_query($con, $sql) or die("database error:". mysqli_error($con));
  if($delete){
    header("Location: gestion_emploi.php");   
  }
}

elseif(isset($_POST['addemploi'])){
  $offre=addslashes(htmlspecialchars($_POST['offre']));
  $date=htmlspecialchars($_POST['date']);
  $type=htmlspecialchars($_POST['type']);
  $description=strip_tags(htmlspecialchars($_POST['description']));
  $text=addslashes(nl2br($description));
  $sql = "INSERT INTO emploi (date, type, offre,description) VALUES ('$date', '$type', '$offre',' $text')";
  if(mysqli_query($con,$sql)){
    header("Location: gestion_emploi.php"); 
  }else{
    echo 'test'.mysqli_error($con);
  } 
}
elseif(isset($_POST['editemploi'])){
  $offre=htmlspecialchars($_POST['offre']);
  $date=htmlspecialchars($_POST['date']);
  $type=htmlspecialchars($_POST['type']);
  $description=strip_tags($_POST['description']);
  $text=addslashes(nl2br($description));
  $sql="UPDATE emploi SET offre='$offre',date='$date',type='$type',description='$text' WHERE id=".$_POST["id_emploi"]."";

  if(mysqli_query($con,$sql)){
    header("Location: gestion_emploi.php"); 
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
  <title>M2L - Gestion emploi</title>
</head>
<body>

  <main role="main" class="container p-5">
    <div class="container">
      <?php if(isset($_GET["ajouter"])){ ?>
        <h5 class="text-center"><i class="fa fa-graduation-cap"></i> Ajouter un emploi<br><br></h5>
        <div class="row justify-content-md-center px-5">
          <form action="gestion_emploi.php" method="post" class="px-5" style='width: 40rem;'>
            <label for="offre">Offre :</label>
            <input type="text" id="offre" class="form-control mb-3" name="offre" required autofocus>
            <label for="date">Date :</label>
            <input type="date" id="date" class="form-control mb-3" name="date" required>
            <label for="type">Type</label>
            <select class="form-control mb-3" id="type" name="type">
              <option>cdd</option>
              <option>cdi</option>
            </select>
            <label for="description" >Description :</label>
            <textarea type="text" id="description" class="form-control" name="description" required></textarea>
            <div class="row justify-content-md-center">
              <button class="btn btn-info btn-block mt-3 pt-2 w-25 mr-3" name="addemploi" type="submit">Ajouter</button>
              <a href='gestion_emploi.php' class="btn btn-light btn-block mt-3 pt-2 w-25">Annuler</a>
            </div>
            <br>
          </form>
        </div>
      <?php } elseif(isset($_GET["edit"])){ 
        $edit = 'select * from emploi where id = ' . $_GET["edit"];
        $editinfo = mysqli_fetch_assoc(mysqli_query($con,$edit));
        ?>
        <h5 class="text-center"><i class="fa fa-graduation-cap"></i> Modifier la emploi<br><br></h5>
        <div class="row justify-content-md-center px-5">
          <form action="gestion_emploi.php" method="post" class="px-5" style='width: 40rem;'>
            <label for="offre">Offre :</label>
            <input type="text" id="offre" class="form-control mb-3" name="offre" value='<?php echo $editinfo['offre']; ?>' required autofocus>
            <label for="date">Date :</label>
            <input type="date" id="date" class="form-control mb-3" name="date" value='<?php echo $editinfo['date']; ?>' required>
            <label for="type">Type</label>
            <select class="form-control mb-3" id="type" name="type">
              <option>cdd</option>
              <option>cdi</option>
            </select>
            <label for="description" >Description :</label>
            <textarea type="text" id="description" class="form-control" name="description" required><?php echo $editinfo['description']; ?></textarea>
            <input name="id_emploi" value="<?php echo $_GET['edit']; ?>" type="hidden">
            <div class="row justify-content-md-center">
              <button class="btn btn-info btn-block mt-3 pt-2 w-25 mr-3" name="editemploi" type="submit">Modifier</button>
              <a href='gestion_emploi.php' class="btn btn-light btn-block mt-3 pt-2 w-25">Annuler</a>
            </div>
            <br>
          </form>
        </div>
      <?php } else { ?>
        <div class="row justify-content-md-center px-5">
          <div class="d-flex justify-content-between mb-2" style='width: 50rem;'>
            <div>
              <h5 class="mt-2"><i class="fa fa-graduation-cap"></i> Gestion d'emploi</h5>
            </div>
            <div>
              <a class="btn btn-info" href="gestion_emploi.php?ajouter"><i class="fa fa-user"></i> Ajouter un emploi</a>
            </div>
          </div>
          <table class="table table-striped table-bordered mt-3" style='max-width: 50rem;'>
            <thead>
              <tr>
                <th scope="col">Offre</th>
                <th scope="col">Date</th>
                <th scope="col">Type</th>
                <th style="width:7em;" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_array($emploi)) { ?>
                <tr>
                  <td><?php echo $row['offre']; ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['type']; ?></td>
                  <td class="text-center h5"><a class="pr-3" href="gestion_emploi.php?edit=<?php echo $row['id']; ?>" ><i class="fa fa-pen text-primary"></i></a><a href="gestion_emploi.php?remove=<?php echo $row['id']; ?>" ><i class="fa fa-trash-alt text-danger"></i></a></td>
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
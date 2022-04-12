<?php
include 'header.php';
if(!isset($_SESSION['id']) && !$_SESSION['isAdmin']){
  header("Location: index.php");
}

$membres = mysqli_query($con,"Select *, case when isAdmin = 1 THEN 'admin' else 'utilisateur' end as isAdmin from membres order by id desc");

if(isset($_GET["remove"])){
  $sql="DELETE FROM membres where id=".$_GET["remove"]."";
  $delete = mysqli_multi_query($con, $sql) or die("database error:". mysqli_error($con));
  if($delete){
    header("Location: gestion_membres.php");   
  }
}
elseif(isset($_POST['edituser'])){
  $username=htmlspecialchars($_POST['username']);
  $email=htmlspecialchars($_POST['email']);
  $password=htmlspecialchars($_POST['password']);
  $isAdmin=(htmlspecialchars($_POST['type'])) == 'admin' ? '1' : '0';

  $sql="UPDATE membres SET username='$username',mail='$email',password='$password',isAdmin='$isAdmin' WHERE id=".$_POST["id_user"]."";
  if(mysqli_query($con,$sql)){
    header("Location: gestion_membres.php"); 
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
  <title>M2L - Gestion des membres</title>
</head>
<body>

  <main role="main" class="container p-5">
    <div class="container">
      <?php if(isset($_GET["edit"])){ 
        $edit = 'select * from membres where id = ' . $_GET["edit"];
        $editinfo = mysqli_fetch_assoc(mysqli_query($con,$edit));
        ?>
        <h5 class="text-center"><i class="fa fa-graduation-cap"></i> Modifier le membre<br><br></h5>
        <div class="row justify-content-md-center px-5">
          <form action="gestion_membres.php" method="post" class="px-5" style='width: 40rem;'>
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" class="form-control mb-3" name="username" value='<?php echo $editinfo['username']; ?>' required autofocus>
            <label for="email">Email :</label>
            <input type="email" id="email" class="form-control mb-3" name="email" value='<?php echo $editinfo['mail']; ?>' required>
            <label for="password">Password :</label>
            <input type="password" id="password" class="form-control mb-3" name="password" required value='<?php echo $editinfo['password']; ?>' >
            <label for="type">Type</label>
            <select class="form-control mb-3" id="type" name="type">
              <option>utilisateur</option>
              <option>admin</option>
            </select>
            <input name="id_user" value="<?php echo $_GET['edit']; ?>" type="hidden">
            <div class="row justify-content-md-center">
              <button class="btn btn-info btn-block mt-3 pt-2 w-25 mr-3" name="edituser" type="submit">Modifier</button>
              <a href='gestion_membres.php' class="btn btn-light btn-block mt-3 pt-2 w-25">Annuler</a>
            </div>
            <br>
          </form>
        </div>
      <?php } else { ?>
        <div class="row justify-content-md-center px-5">
          <div class="d-flex justify-content-between mb-2" style='width: 50rem;'>
            <div>
              <h5><i class="fa fa-graduation-cap"></i> Gestion des membres</h5>
            </div>
          </div>
          <table class="table table-striped table-bordered mt-3" style='max-width: 50rem;'>
            <thead>
              <tr>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Admin</th>
                <th style="width:7em;" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_array($membres)) { ?>
                <tr>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['mail']; ?></td>
                  <td><?php echo $row['isAdmin']; ?></td>
                  <td class="text-center h5"><a class="pr-3" href="gestion_membres.php?edit=<?php echo $row['id']; ?>" ><i class="fa fa-pen text-primary"></i></a><a href="gestion_membres.php?remove=<?php echo $row['id']; ?>" ><i class="fa fa-trash-alt text-danger"></i></a></td>
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
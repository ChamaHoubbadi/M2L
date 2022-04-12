<?php
include 'header.php';
if(!isset($_SESSION['id']) && !$_SESSION['isAdmin']){
  header("Location: index.php");
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
  <title>M2L - Administration</title>
</head>
<body>

  <main role="main" class="container p-5">
    <div class="container">
      <div class="row justify-content-md-center mt-5">
          <p>
            <a href="gestion_formation.php" class="btn btn-sq-lg btn-warning text-white" style='width: 13em;'>
              <i class="fa fa-briefcase fa-5x"></i><br/>
              Gestion Formation
            </a>
            <a href="gestion_emploi.php" class="btn btn-sq-lg btn-info" style='width: 13em;'>
              <i class="fa fa-graduation-cap fa-5x"></i><br/>
              Gestion Emploi
            </a>
            <a href="gestion_membres.php" class="btn btn-sq-lg color-purple" style='width: 13em'>
              <i class="fa fa-user-cog fa-5x"></i><br/>
              Gestion Membres
            </a>
          </p>
      </div>
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
<?php
include 'header.php';
if(isset($_SESSION['id']) && isset($_SESSION['isAdmin'])){
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
      <div class="row justify-content-md-center">
        <div class="login-form shadow-sm p-4 mb-5 bg-light rounded" style="width: 23em;">

          <div class="text-center">
            <h2>Inscription</h2><br>
         </div>
         <?php echo $erreur;?>
         <form action="inscription.php" method="post" class="form-signin">
          <label for="inputuser">Nom d'utilisateur :</label>
          <input type="text" id="inputuser" class="form-control" name="username" maxlength="30" required autofocus>
          <label for="inputemail" >Email :</label>
          <input type="email" id="inputemail" class="form-control" name="email" required>
          <label for="inputcemail" >Confirmer l'email :</label>
          <input type="email" id="inputcemail" class="form-control" name="cemail" required>
          <label for="inputpw" >Mot de passe :</label>
          <input type="password" id="inputpw" class="form-control" name="password" required>
          <label for="inputcpw" >Confirmer le mot de passe :</label>
          <input type="password" id="inputcpw" class="form-control" name="cpassword" required>
          <button class="btn btn-info btn-block mt-3 pt-2" name="inscription" type="submit">Inscrire !</button>
          <br>
          <div class="dropdown-divider mb-3"></div>
          <p>Avez déja un compte ? <a href="login.php" class="text-info"> Se connecter</a> .</p>
        </form>
      </div>
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
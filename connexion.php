<?php
include 'header.php';
if(isset($_SESSION['id'])){
  header("Location: index.php");
}
$erreur = "";
if(isset($_POST['connexion'])) {
  $user = htmlspecialchars($_POST['username']);
  $pw = htmlspecialchars($_POST['password']);
  $login = mysqli_query($con,"SELECT * FROM membres WHERE username = '$user'  AND password = '$pw'");
  if(mysqli_num_rows($login) ==  1){
      $userinfo = mysqli_fetch_assoc($login);
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['username'] = $userinfo['username'];
      $_SESSION['mail'] = $userinfo['mail'];
      $_SESSION['isAdmin'] = $userinfo['isAdmin'];
      header("Location: index.php");

  }else{
    $erreur = "<div class='alert alert-danger' role='alert'>Email ou mot de passe incorrect !</div>";
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
  <title>M2L - Connexion</title>
</head>
<body>

  <main role="main" class="container p-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="login-form shadow-sm p-4 mb-5 bg-light rounded" style="width: 23em;">

          <div class="text-center">
           <h2>Bonjour</h2>
           <p>Connectez-vous à votre compte</p>
         </div>
       
         <form action="connexion.php" method="post" class="form-signin">
          <label for="inputuser">Nom d'utilisateur :</label>
          <input type="text" id="inputuser" class="form-control" name="username" required autofocus>
          <label for="inputpw" >Mot de passe :</label>
          <input type="password" id="inputpw" class="form-control" name="password" required>
          <button class="btn btn-info btn-block mt-3 pt-2" name="connexion" type="submit">Se connecter</button>
          <br>
          <div class="dropdown-divider mb-3"></div>  <?php echo $erreur;?>
          <p>Pas encore inscrit? <a href="inscription.php" class="text-info"> S'inscrire gratuitement</a>.</p>
        </form>
      </div>
    </div>  
  </div> 
</main>

<footer class="footer">
  <div class="container">
    <div class="footer-copyright text-center">© 2022 By Chaymae Houbbadi - 
      <a href="mentions_legales.php" class="text-info"> Mentions légales</a>
    </div>
  </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</body>
</html>
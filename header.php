<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "m2l");
$con->query('SET NAMES utf8');
?>
<nav class="navbar navbar-expand-lg navbar-light p-3 bg-light border-bottom shadow-sm">
  <img  src="images/logo.png" alt="logo M2L" style="height: 50px;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item px-3 mt-1">
        <a class="nav-link text-dark" href="index.php"><i class="fa fa-home"></i> Accueil</a>
      </li>
      <li class="nav-item dropdown px-3 mt-1">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-code-branch"></i>  M2L
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!--<a class="dropdown-item" href="statut_juridique.php">Statut juridique</a>-->
          <a class="dropdown-item" href="locaux.php">Locaux</a>
          <a class="dropdown-item" href="personnel.php">Personnel</a>
          <a class="dropdown-item" href="materiel.php">Materiel</a>
          <a class="dropdown-item" href="Services.php">Services</a>
        </div>
      </li>
      <li class="nav-item dropdown px-3 mt-1">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-link"></i>  Liens Sport 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="https://www.ligue-grandest-fft.fr/">Tennis</a>
          <a class="dropdown-item" href="https://grandest.ffnatation.fr/script/index.php">Natation</a>
          <a class="dropdown-item" href="https://www.judograndest.fr/">Judo</a>
          <a class="dropdown-item" href="http://www.grandestcyclisme.fr/">Cyclisme</a>
        </div>
      </li>
      <li class="nav-item px-3 mt-1">
        <a class="nav-link text-dark" href="emploi.php"><i class="fa fa-briefcase"></i> Emploi</a>
      </li>
      <li class="nav-item px-3 mt-1">
        <a class="nav-link text-dark" href="formation.php"><i class="fa fa-graduation-cap"></i> Formation</a>
      </li>
      <li class="nav-item px-3 mt-1">
        <a class="nav-link text-dark" href="contact.php"><i class="fa fa-address-book"></i> Contact</a>
      </li>
    </ul>
    <ul class="navbar-nav my-2 my-lg-0">

      <?php
      if(isset($_SESSION['id'])){ ?>
        <li class="nav-item px-2">
          <?php if( $_SESSION['isAdmin'] ){
            echo '<a class="btn btn-info" href="admin.php"><i class="fa fa-tools"></i> Administration</a>';
          } else {
            echo '<a class="nav-link text-dark">Bienvenue : <i class="text-info">'. $_SESSION["username"] .' </i></a>';
          }?>
          
        </li>
        <li class="nav-item ">
          <a class="btn btn-outline-danger" href="deconnecter.php"><i class="fa fa-sign-out-alt"></i> Se deconnecter</a>
        </li>

      <?php } else { ?>
        <li class="nav-item px-1">
          <a class="btn btn-outline-info" href="connexion.php"><i class="fa fa-user"></i> Connexion</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-info" href="inscription.php"><i class="fa fa-user-plus"></i> Inscription</a>
        </li>

      <?php }?>


    </ul>
  </div>
</nav>
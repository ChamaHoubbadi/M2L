<?php
include 'header.php';
$msg = "";
if(isset($_POST['contact']))
{

  $header.='From:.' .$_POST['nom'].'  <' .$_POST['email'].' >'."\n";
  $header='Content-Type:text/html; charset="UTF-8"'."\n";
  $header='Content-Transfer-Encoding: 8bit';

  $emploi = isset($_GET['emploi']) ? 'Num reference : '.$_GET['emploi'] : '';
  $sujet = isset($_GET['emploi']) ? 'Demande d\'emploi' : 'Nouveau message';

  $message=$emploi .
    '<br>Nom de l\'expéditeur : '.$_POST['nom'].
    '<br>Mail de l\'expéditeur : '.$_POST['email'].
    '<br>Message   : '.$_POST['message'];

    $destinataire = 'wissalchama2gmail.com';

    if (mail($destinataire, $sujet,$message, $header)){
      $msg = "<div class='alert alert-success' role='alert'>Votre message a bien été envoyé !</div>";
    }else{
      $msg = "<div class='alert alert-danger' role='alert'>Erreur</div>";
    }
    echo $message;

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

  <title>M2L - Contact</title>
  </head>
  <body>

  <main role="main" class="container p-5">

  <form method="post">

  <div class="row">
  <div class="col-md-6 mt-5">
  <?php echo $msg;?>
  <h3>Contactez-nous</h3><br>
  <?php if(isset($_GET['emploi'])){?>

    <div class="form-group">
    <input type="text" name="id_emploi" class="form-control" placeholder="" value="<?php echo $_GET['emploi']; ?>" disabled/>
    </div>

  <?php } ?>
  <div class="form-group">
  <input type="text" name="nom" class="form-control" placeholder="Votre Nom *" value="" required />
  </div>
  <div class="form-group">
  <input type="email" name="email" class="form-control" placeholder="Votre Email *" value="" required/>
  </div>
  <div class="form-group">
  <textarea name="message" class="form-control" placeholder="Votre Message *" style="width: 100%; height: 150px;" required></textarea>
  </div>
  <div class="form-group">
  <input type="submit" name="contact" class="btn btn-info rounded" value="Envoyer Message" />
  </div>
  </div>
  <img class="col-md-6 mt-0" src="images/contact2.jpg">
  </div>
  </form>
  
  </main>

  <footer class="footer">
  <div class="container">
  <div class="footer-copyright text-center">© 2022 By Chaymae Houbbadi - 
  <a href="mentionslegales.php"> Mentions légales</a>
  </div>
  </div>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  </body>
  </html>
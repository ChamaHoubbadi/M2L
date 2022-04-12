<?php
include 'header.php';
$emploi = mysqli_query($con,"Select * from emploi order by date desc");
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

  <title>M2L - Emploi</title>
</head>
<body>
  
  <main role="main" class="container p-5">
    <h5 class="text-center mb-3"><i class="fa fa-briefcase"></i> Liste des emplois disponibles : </h5>
    <?php
      while ($row = mysqli_fetch_array($emploi)) { ?>
        <div class="card px-3 mx-auto shadow-sm mb-3" style="width:45rem;">
          <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
              <div>
                <h5 class="card-title mt-0 mb-1 text-info"><?php echo $row['offre']; ?></h5>
                <small class="text-muted">Publié le : <?php echo $row['date']; ?> - Type de contrat : <?php echo $row['type']; ?> </small>
              </div>
              <div>
               <small class="card-subtitle mt-0 text-muted">Réference : <?php echo $row['id']; ?></small>
             </div>
           </div>
           <h6 class="">Description : </h6>
           <p class="card-text border px-3 py-2"><?php echo $row['description']; ?></p>
           <a href="contact.php?emploi=<?php echo $row['id'];?>" class="card-link btn btn-info float-right">Postuler</a>
         </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
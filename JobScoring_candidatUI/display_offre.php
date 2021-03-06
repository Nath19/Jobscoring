<?php
  session_start();
  include './php/connect_db.php';
  if (isset($_SESSION['id']))
  {
    $req = $bdd->prepare('SELECT pseudo FROM login WHERE id_login = ?');
    $req->execute(array($_SESSION['id']));

    $donnee = $req->fetch();
    $id_user = $donnee['pseudo'];
  }
  else {
    echo 'Erreur ! Non connecté';
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="table/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/css/util.css">
	<link rel="stylesheet" type="text/css" href="table/css/main.css">
  <link rel="apple-touch-icon" sizes="76x76" href="./table/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./table/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Candidat
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="./assets/css/material-kit.css?v=2.0.3" rel="stylesheet" />
  <link href="./css/cv.css" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
  <?php include 'nav.php'; ?>
  <div class="container">
  <?php
    $id_offre = $_GET['id'];

    $req = $bdd->prepare('SELECT titre, description, image FROM catalogue_offre_emploi WHERE id_offre = ?');
    $req->execute(array($id_offre));

    if($donnee = $req->fetch())
    {
      echo '<div class="card" style="width: 100%; text-align: center">';
        echo '<div class="card-body"">';
          echo '<h2 class="card-title">'.$donnee['titre'].'</h2>';
        echo '</div>';
      echo '</div>';

      echo '<div class="card" style="width: 100%; text-align: center">';
        echo '<div class="card-body"">';
          echo '<img src="./'.$donnee['image'].'"/>';
        echo '</div>';
      echo '</div>';

      echo '<div class="card" style="width: 100%; text-align: center; font-weigth: normal">';
        echo '<div class="card-body"">';
          echo '<p class="card-title">'.$donnee['description'].'</p>';
        echo '</div>';
      echo '</div>';

    }

  ?>

  <div class="card">
    <div class="card-body" style="font-weight: bold;">
      Mes compétences :
    </div>

    <!-- Tableau des compétences -->
    <?php include './php/offres_tab_comp.php'; ?>

  </div>
</div>
</body>

</html>

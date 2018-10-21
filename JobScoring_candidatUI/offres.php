<?php
  session_start();
  include './php/connect_db.php';
  if (isset($_SESSION['id']))
  {
    $id_user = $_SESSION['id'];

    $req = $bdd->prepare('SELECT pseudo FROM login WHERE id_login = ?');
    $req->execute(array($_SESSION['id']));

    $donnee = $req->fetch();
    $pseudo = $donnee['pseudo'];
  }
  else {
    echo 'Erreur ! Non connecté';
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Kit by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="./assets/css/material-kit.css?v=2.0.3" rel="stylesheet" />
  <link href="./css/offres.css" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
  <?php include 'nav.php'; ?>

  <div class="container">

    <?php include './php/offre_get.php';?>

  </div>

</body>

</html>

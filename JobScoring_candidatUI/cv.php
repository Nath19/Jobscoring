<?php
  session_start();
  include './php/connect_db.php';
  if (isset($_SESSION['id']))
  {
    $req = $bdd->prepare('SELECT pseudo FROM login WHERE id_login = ?');
    $req->execute(array($_SESSION['id']));

    $donnee = $req->fetch();
    $id_user = $_SESSION['id'];
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

  <?php include './php/connect_db.php' ?>

  <?php include './php/cv_add_comp.php'; ?>

  <?php include './php/add_xp.php'; ?>

  <div class="container">


    <div class="card">
      <div class="card-body" style="font-weight: bold;">
        Mes compétences :
      </div>

      <!-- Tableau des compétences -->
      <?php include './php/cv_tab_comp.php'; ?>

    </div>


    <div class="card">
      <!-- Script ajout compétence -->
      <div class="card-body" style="font-weight: bold;">
        Ajouter une compétence :
      </div>
      <div class="add">
        <!-- Forulaire ajout comp -->
        <?php include './php/cv_add_comp_form.php' ?>
      </div>
    </div>


    <div class="card">
      <div class="card-body" style="font-weight: bold;">
        Mes expériences professionelles/personnelles :
      </div>
      <?php include './php/cv_tab_xp.php' ?>
    </div>


    <div class="card">
      <div class="card-body" style="font-weight: bold;">
        Ajouter une expérience :
      </div>
      <div class="add">
        <form  action="cv.php" method="post" id="addXp">
          <div class="form-group">
             <label for="exampleInput1" class="bmd-label-floating">Titre</label>
             <input type="text" class="form-control" id="exampleInput1" name="titre">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
          </div>
          <?php include './php/add_xp_form.php'; ?>

          <input type="submit" class="btn btn-primary" name="xp"></input>
        </form>
      </div>
    </div>
  </div>

  <!--===============================================================================================-->
  	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  	<script src="vendor/bootstrap/js/popper.js"></script>
  	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  	<script src="vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  	<script src="js/main.js"></script>

</body>

</html>

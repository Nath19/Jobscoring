<?php
session_start();
$_SESSION['id'] = 9;
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">






  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css2/bootstrap.min.css">
	<link rel="stylesheet" href="css2/animate.css">
	<link rel="stylesheet" href="css2/style.css">


	<!-- Modernizr JS -->
	<script src="js2/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->






	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<link rel="stylesheet" href="css/style.css">

	<link rel="stylesheet" href="design.css" />



	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>
  <?php
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=jobscoringv5;charset=utf8', 'root', 'root');
  }
  catch(Exception $e){
    die('Erreur :'.$e->getMessage());

  }
   ?>


	<div id="fh5co-wrapper">
	<div id="fh5co-page">
	<div id="fh5co-header">
    <?php include 'menu.php' ?>
	<body class="style-3">
		<<li style="background-image: url(images/hero3.jpg);">

		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">


				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-push-8">


					<?php
            if(!empty($_POST))
            {
              $email = $_POST['email'];
              $mdp = hash("md5", $_POST['mdp'], FALSE);

              $req = $bdd->prepare('SELECT id_login, mdp FROM login WHERE email=?');
              $req->execute(array($email));

              if($donnees = $req->fetch())
              {
                if($donnees['password'] = $mdp)
                {
								
					        $_SESSION['id'] = $donnees['id_login'];
                  echo 'vous êtes connectés !';
									?>
										<p><a href="./JobScoring_candidatUI/home.php">Acceder à l'espace candidat</a></p>
									<?php
                }
                else {
                  echo 'le mot de passe et l\'email ne correspondent pas';
                }
              }
              else {
                echo 'email non reconnu';
              }
            }
            else
            {
           ?>
					<form method="post" action="login.php" class="fh5co-form animate-box" data-animate-effect="fadeInRight">
						<h2>Connexion</h2>
						<div class="form-group">
							<label for="email" class="sr-only">Username</label>
							<input name="email" type="text" class="form-control" id="username" placeholder="Email" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input name="mdp" type="password" class="form-control" id="password" placeholder="Mot de passe" autocomplete="off">
						</div>
            <!--
						<div class="form-group">
							<label for="remember"><input type="checkbox" id="remember"> Remember Me</label>
						</div>
          -->
						<div class="form-group">
							<p>Pas encore inscrit ? <a href="sign-up3.html">S'inscrire</a> | <a href="forgot3.html">Mot de passe oublié ?</a></p>
						</div>
						<div class="form-group">
							<input type="submit" value="Sign In" class="btn btn-primary">
						</div>
					</form>
					<!-- END Sign In Form -->
          <?php
          }
          ?>


				</div>
			</div>
			<div class="row" style="padding-top: 60px; clear: both;">
			</div>
		</div>

		<?php include 'footer.php' ?>
	<!-- jQuery -->
	<script src="js2/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="js2/bootstrap.min.js"></script>
	<!-- Placeholder -->
	<script src="js2/jquery.placeholder.min.js"></script>
	<!-- Waypoints -->
	<script src="js2/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="js2/main.js"></script>

	</body>
</html>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sign up</title>
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
      try
      {
        $bdd = new PDO('mysql:host=localhost;dbname=jobscoringv5;charset=utf8', 'root', 'root');

      }
      catch (Exception $e)
      {
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

					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-push-8">


					<?php
          if(!empty($_POST)) /*Si le formulaire n'a pas encore été remplie*/
          {
            $pseudo = $_POST['pseudo'];
            $mdp = hash("md5", $_POST['mdp'], FALSE);
            $mdpbis = hash("md5", $_POST['mdpbis'], FALSE);
            $mail = $_POST['email'];
            $type = 0;

            if($mdp = $mdpbis)
            {
              $req = $bdd->prepare('INSERT INTO login(pseudo, mdp, email, type) VALUES (:pseudo, :mdp, :mail, :type)');
              $req1 = $bdd->prepare('SELECT pseudo, mdp FROM login WHERE email=?');
              $req1->execute(array($mail));

              if($donnees = $req1->fetch())
              {
                  echo "email ou pseudo déjà présent dans notre base de donnée";
              }
              else
              {
                if(($req->execute(array('pseudo' => $pseudo,'mdp' => $mdp,'mail' => $mail, 'type' => $type)) == TRUE))
                {
                  echo "merci de vous être inscrit";
                  echo '<p>Vous pouvez maintenant vous <a href="login.php">connecter</a></p>';
                }
                else
                {
                  echo "ERREUR : $pseudo n'a pas été ajouté";
                }
              }
            }
            else
            {
              echo "Vos mots de passe ne correspondent pas";
            }
          }
          else /*Si le formulaire a été rempli, ajouter les informations dans la bdd*/
          {
            ?>
					<form action="sign_up.php" method="post" class="fh5co-form animate-box" data-animate-effect="fadeInRight">
						<h2>Inscription</h2>
						<div class="form-group">
						</div>
						<div class="form-group">
							<label for="name" class="sr-only">Name</label>
							<input type="text" name="pseudo" class="form-control" id="name" placeholder="Pseudonyme" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">Email</label>
							<input type="text" name="email" class="form-control" id="email" placeholder="Email" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input type="password" name="mdp" class="form-control" id="password" placeholder="Mot de passe" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="re-password" class="sr-only">Re-type Password</label>
							<input type="password" name="mdpbis" class="form-control" id="re-password" placeholder="Confirmer le mot de passe" autocomplete="off">
						</div>
						<div class="form-group">
							<p>Déjà inscrit ? <a href="login.php">Se connecter</a></p>
						</div>
						<div class="form-group">
							<input type="submit" value="Sign Up" class="btn btn-primary">
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

<?php
	session_start();

	$_SESSION = array();
	session_destroy();
 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Jobscoring </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />




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

	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet"> -->

	<!-- Animate.css -->
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


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->




<style>
.exemp{

  text-align: center;
	 border: solid;

}
h2
{
	font-size: 36px;
	text-align: center;


}


</style>
	</head>
	<body>

		<?php include 'menu.php' ?>
		<!-- end:fh5co-header -->
		<aside id="fh5co-hero" class="js-fullheight">
			<div class="flexslider js-fullheight">
				<ul class="slides">
			   	<<li style="background-image: url(images/entente.png);">
			   		<div class="overlay-gradient"></div>
			   		<div class="container">
			   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h2>Trouvez le job de vos rêves.</h2>
									<p><a href="candidat.php" class="btn btn-primary btn-lg">Candidats</a></p>
												<p><a href="employeur.php" class="btn btn-primary btn-lg">Employeurs</a></p>
			   				</div>
			   			</div>
			   		</div>
			   	</li>

			   	<li style="background-image: url(images/hand1.png);">
			   		<div class="overlay-gradient"></div>
			   		<div class="container">
			   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
  					<h2>Votre avenir n’est plus qu’à un clic!</h2>
			   					<p><a href="sign_up_new.php" class="btn btn-primary btn-lg">Inscription</a></p>
			   				</div>
			   			</div>
			   		</div>
			   	</li>

			   	<li style="background-image: url(images/slide_4.jpg);">
			   		<div class="overlay-gradient"></div>
			   		<div class="container">
			   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h2>JobScoring</h2>
			   					<p><a href="about.php" class="btn btn-primary btn-lg">L'équipe</a></p>
			   				</div>
			   			</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div>
			<div>
				<br>
				<h2>JobScoring</h2>
				<div class="featured-inner">
					<div class="desc" style="align-items: center">
						<p class="exemp" style="width:50%; margin-left:25%">
							Aujourd’hui, nous croyons réellement à une société plus juste, plus équitable où les inégalités non plus lieu d’être. Nous croyons à l’égalité des chances dans la société, et plus particulièrement dans le monde professionnel. Pour tenter de réduire ces inégalités, nous avons décidé de créer JobScoring.
								JobScoring est une plateforme mettant en contact entreprises et candidats sous une approche totalement anonyme.
						</p>
					</div>
				</div>
		</div>
		 <br />  <br />  <br />
		 	<h2> Nos entreprises partenaires</h2>
		<div id="fh5co-portfolio-section">
			<div class="portfolio-row-half">
				<div class="portfolio-grid-item-color">
					<div class="desc">
						<p><a href="employeur.php" class="btn btn-primary btn-outline with-arrow">Voir toutes les entreprises <i class="icon-arrow-right22"></i></a></p>
					</div>
				</div>
				<a href="#" class="portfolio-grid-item" style="background-image: url(images/hp.png);">
					<div class="desc2">
						<i class="sl-icon-heart"></i>
					</div>
				</a>
				<a href="#" class="portfolio-grid-item" style="background-image: url(images/sfr.png);">
					<div class="desc2">
						<i class="sl-icon-heart"></i>
					</div>
				</a>
				<a href="#" class="portfolio-grid-item" style="background-image: url(images/peugeot.png);">
					<div class="desc2">
						<i class="sl-icon-heart"></i>
					</div>
				</a>
				<a href="#" class="portfolio-grid-item" style="background-image: url(images/microsoft.png);">
					<div class="desc2">
						<i class="sl-icon-heart"></i>
					</div>
				</a>
				<a href="#" class="portfolio-grid-item" style="background-image: url(images/axa.png);">
					<div class="desc2">
						<i class="sl-icon-heart"></i>
					</div>
				</a>
				<a href="#" class="portfolio-grid-item" style="background-image: url(images/orange.png);">
					<div class="desc2">
						<i class="sl-icon-heart"></i>
					</div>
				</a>
				<a href="#" class="portfolio-grid-item" style="background-image: url(images/oracle.png);">
					<div class="desc2">
					</div>
				</a>
			</div>
		</div>

		<div class="fh5co-parallax fh5co-parallax2" style="background-image: url(images/hero.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro animate-box">
							<div class="row">
								<div class="col-md-6 text-center">
									<div class="testimony">
										<span class="quote"><i class="icon-quotes-right"></i></span>
										<blockquote>
											<p>JobScoring m'a permis de trouver le job de mes rêves en m'évitant de longues recherches.</p>
											<span>Corentin Bidault, via <a href="#" class="icon-twitter3 twitter-color"></a></span>
										</blockquote>
									</div>
								</div>
								<div class="col-md-6 text-center">
									<div class="testimony">
										<span class="quote"><i class="icon-quotes-right"></i></span>
										<blockquote>
											<p>JobScoring m'a permis de trouver un stage alors que j'étais étudiant. Finie cette époque où il fallait un réseau conséquent pour trouver un stage! JobScoring rétablit les inégalités à l'embauche! Merci !</p>
											<span>Jean <a href="#" class="icon-google-plus googleplus-color"></a></span>
										</blockquote>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include 'footer.php' ?>

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->

	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>

	</body>
</html>

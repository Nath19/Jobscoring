<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container">
    <a class="navbar-brand" href="home.php">JOBSCORING > Candidat</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <!-- ajouter class="nav-item active" si sur la page -->
        <li class="nav-item">
          <a class="nav-link" href="cv.php">Mon CV <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="offres.php">Mes offres d'emploi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ma messagerie</a>
        </li>
      </ul>
      <span class="navbar-text">
        <?php
        if (isset($_SESSION['id']))
        {
          $req = $bdd->prepare('SELECT pseudo FROM login WHERE id_login = ?');
          $req->execute(array($_SESSION['id']));
          
          $donnee = $req->fetch();
          echo 'Bonjour ' . $donnee['pseudo'] .'<a href=../index.php>  Déconnexion</a>';
        }
        else {
          echo 'Erreur ! Non connecté';
        }
        ?>
      </span>
    </div>
  </div>
</nav>

<!-- Pour clore la session
$_SESSION = array();
session_destroy(); -->

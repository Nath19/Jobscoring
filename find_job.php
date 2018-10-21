<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>find_job.php</title>
  <meta name="Trouve le job en fonction du CV d'un utilisateur" content="">

  <link rel="stylesheet" href="">
</head>

<body>
  <!--Connection à la base de donnée-->
  <?php
    try {
      $bdd = new PDO('mysql:host=localhost;dbname=jobscoringv5;charset=utf8', 'root', '');
    }
    catch (\Exception $e) {
      die('Erreur :'.$e->getMessage());
    }
   ?>

   <?php
     if(!empty($_POST))
     {
       //PARTIE 0 : VARIABLES GLOBALE
       $lvl_up_xp = 8; /*Poids ajouté si compétence acquise via xp pro/perso*/

       //PARTIE 1 : RECUPERER LE CV DE L'UTILISATEUR
       $id_user = $_POST['id_user'];

       $req_comp = $bdd->prepare('SELECT id_comp, niveau FROM cv_comp WHERE id_user=?');
       $req_comp_xp = $bdd->prepare('SELECT id_comp1, id_comp2, id_comp3 FROM cv_exp WHERE id_user=?');

       $req_comp->execute(array($id_user));
       $req_comp_xp->execute(array($id_user));

       $comp_user = array();
       $nv_comp_user = array();

        //Récupération à partir de cv_compétence
       while($donnees = $req_comp->fetch())
       {
         array_push($comp_user, $donnees['id_comp']);
         array_push($nv_comp_user, $donnees['niveau']);
       }

        //Récupération à partie du cv expérience
       while($donnees = $req_comp_xp->fetch())
       {
         $n = count($comp_user);
         $i = 0;
         $flag = 0;

         //Compétence 1
         for($i; $i<$n; $i++)
         {
           if($donnees['id_comp1'] == $comp_user[$i])
           {
             $nv_comp_user[$i] += $lvl_up_xp;
             $flag = 1;
           }
         }
         if ($flag = 0)
         {
           array_push($comp_user, $donnees['id_comp1']);
           array_push($nv_comp_user, $lvl_up_xp);
         }
         $flag = 0;
         $i = 0;

         //Compétence 2
         for($i; $i<$n; $i++)
         {
           if($donnees['id_comp2'] == $comp_user[$i])
           {
             $nv_comp_user[$i] += $lvl_up_xp;
             $flag = 1;
           }
         }
         if ($flag == 0)
         {
           array_push($comp_user, $donnees['id_comp2']);
           array_push($nv_comp_user, $lvl_up_xp);
         }
         $flag = 0;
         $i = 0;

         //Compétence 3
         for($i=0; $i<$n; $i++)
         {
           if($donnees['id_comp3'] == $comp_user[$i])
           {
             $nv_comp_user[$i] += $lvl_up_xp;
             $flag = 1;
           }
         }
         if ($flag == 0)
         {
           array_push($comp_user, $donnees['id_comp3']);
           array_push($nv_comp_user, $lvl_up_xp);
         }
         $flag = 0;
         $i = 0;

        }

        echo '<p>Compétences de l utilisateur</p> :';
        print_r($comp_user);
        echo 'Avec les niveaux';
        print_r($nv_comp_user);

        //PARTIE 3 : RECHERCHE DES OFFRES DE TRAVAIL CORRESPONDANTS LE MIEUX AU PROFIL
          //Recherche de la compétence principale de l'utilisateur
        $index_max = 0;
        $i = 0;

        for($i; $i<count($nv_comp_user); $i++)
        {
          if($nv_comp_user[$i] > $nv_comp_user[$index_max])
          {
            $index_max = $i;
          }
        }

          //Recuperation des offres qui nécessite le plus la compétence principale de l'utilisateur
        $req_findjob = $bdd->prepare('SELECT id_offre, id_comp FROM offre_emploi WHERE id_comp=? ORDER BY niv_rec DESC');
        $req_findjob->execute(array($comp_user[$index_max]));

        $cat_offres = array();

        while($donnees = $req_findjob->fetch())
        {
          array_push($cat_offres, $donnees['id_offre']);
        }

          //Pour chacune de ces offres, on calcule le taux de match par rapport aux autres compétences
        $n_offre = 0;
        $offre_score = array();

        for($n_offre; $n_offre<count($cat_offres); $n_offre++) //Pour l'offre n°n_offre
        {
          $score =  0;
          echo 'Offre n :';
          echo $cat_offres[$n_offre].'  ';
          $req_offre = $bdd->prepare('SELECT id_comp, niv_rec FROM offre_emploi WHERE id_offre = ?');
          $req_offre->execute(array($cat_offres[$n_offre]));

          $flag = 0; //1 si l'utilisateur possède la compétence
          while($donnees = $req_offre->fetch())
          {
            echo $donnees['id_comp'].'=>'.$donnees['niv_rec'].'  ';
            for($i=0; $i<count($comp_user); $i++)
            {
              if($comp_user[$i] == $donnees['id_comp'])
              {
                $score += $donnees['niv_rec'] - $nv_comp_user[$i];
                $flag = 1;
                break;
              }
            }
            if($flag = 0)
            {
              $score += $donnees['niv_rec'];
            }
          }

          $array_push($offre_score, $score);
        }

        //ETAPE 5 : Trier la liste des offre en fonction de leur score : le plus petit => plus gros match;

      }
     else{
    ?>
  <form method="post" name="id_user" action="find_job.php">
    <input type="text" name="id_user" placeholder="ID UTILISATEUR">
    <input type="submit" value="Chercher Job">
  </form>
  <?php
    }
   ?>
</body>
</html>

<?php
  //PARTIE 0 : VARIABLES GLOBALE
  $lvl_up_xp = 8; /*Poids ajouté si compétence acquise via xp pro/perso*/

  //PARTIE 1 : RECUPERER LE CV DE L'UTILISATEUR

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

     //Recuperation des offres qui nécessite le plus la compétence principale de l'utilisateur | ajouter WHERE id_comp=? ORDER BY niv_rec DESC et $comp_user[$index_max]
     $req_findjob = $bdd->prepare('SELECT DISTINCT id_offre FROM offre_emploi WHERE id_comp IN (SELECT id_comp FROM cv_comp WHERE id_user = ? AND niveau > 0) OR id_comp IN (SELECT id_comp1 FROM cv_exp WHERE id_user = ? ) OR id_comp IN (SELECT id_comp2 FROM cv_exp WHERE id_user = ? ) OR id_comp IN (SELECT id_comp3 FROM cv_exp WHERE id_user = ? ) ');
     $req_findjob->execute(array($id_user, $id_user, $id_user, $id_user));

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
     $req_offre = $bdd->prepare('SELECT id_comp, niv_rec FROM offre_emploi WHERE id_offre = ?');
     $req_offre->execute(array($cat_offres[$n_offre]));

     $flag = 0; //1 si l'utilisateur possède la compétence
     while($donnees = $req_offre->fetch())
     {
       for($i=0; $i<count($comp_user); $i++)
       {
         if($comp_user[$i] == $donnees['id_comp'])
         {
           $score += $donnees['niv_rec'] - $nv_comp_user[$i];
           $flag = 1;
           break;
         }
       }
       if($flag == 0)
       {
         $score += $donnees['niv_rec'];
       }
     }

     array_push($offre_score, $score);
   }

   //PARTIE 4 : TRIER
   array_multisort($offre_score, $cat_offres);

   //PARTIE 5 : AFFICHER
   for($i=0; $i<count($cat_offres); $i++)
   {
       $reqf = $bdd->prepare('SELECT titre, image FROM catalogue_offre_emploi WHERE id_offre = ?');
       $reqf->execute(array($cat_offres[$i]));

       $donnee = $reqf->fetch();

       $img = $donnee['image'];
       $titre = $donnee['titre'];

        echo '<div class="card" style="width: 20rem; height: 400px">';
        echo '<img class="card-img-top" src="'.$img.'" alt="Card image cap" style="">';
          echo '<div class="card-body"">';
            echo '<h4 class="card-title">'.$titre.'</h4>';
          echo '</div>';
          echo '<a href="./display_offre.php?id='.$cat_offres[$i].'" class="btn btn-primary">Voir lannonce</a>';
       echo '</div>';
    }
?>

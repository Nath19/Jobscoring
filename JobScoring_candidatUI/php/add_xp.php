<?php
  if(!empty($_POST['xp']))
  {
    $titre = $_POST['titre'];
    $desc = $_POST['desc'];
    $comp1 = $_POST['comp1'];
    $comp2 = $_POST['comp2'];
    $comp3 = $_POST['comp3'];

    $check = $bdd->prepare('SELECT titre FROM cv_exp WHERE id_user = :id AND titre = :titre');
    $check->execute(array(
      'id' => $id_user,
      'titre' => $titre
    ));

    if($check->rowCount()>0)
    {

    }
    else {
      $add = $bdd->prepare('INSERT INTO cv_exp (id_user, titre, description, duree, id_comp1, id_comp2, id_comp3) VALUES (:id_user,:titre, :description, "Indéfinie", :c1, :c2, :c3)');
      $add->execute( array(
        'id_user' => $id_user,
        'titre' => $titre,
        'description' => $desc,
        'c1' => $comp1,
        'c2' => $comp2,
        'c3' => $comp3
      ));
    }
  }

 ?>

<?php
  if(!empty($_POST['comp']))
  {
    $numComp = $_POST['numComp'];
    $nvNiv = $_POST['niveau'];

    $check = $bdd->prepare('SELECT id_comp FROM cv_comp WHERE id_user = :id AND id_comp = :comp');
    $check->execute(array(
      'id' => $id_user,
      'comp' => $numComp
    ));

    if($check->rowCount()>0)
    {
      $sql = 'UPDATE cv_comp SET niveau ='.$nvNiv.' WHERE id_comp ='.$numComp;
      $update = $bdd->prepare($sql);
      $update->execute();
    }
    else {
      try {
        $add = $bdd->prepare('INSERT INTO cv_comp (id_user, id_comp, niveau, preuve, lien_preuve) VALUES (:id_user,:nv_num, :nv_niveau, 0, "")');
        $add->execute( array(
          'id_user' => $id_user,
          'nv_num' => $numComp,
          'nv_niveau' =>  $nvNiv
        ));
      } catch (\Exception $e) {

      }
    }

  }
 ?>

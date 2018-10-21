<?php
    for($i=1; $i<4; $i++)
  {
    $reqForm = $bdd->prepare('SELECT nom, id_comp FROM competence ORDER BY nom');
    $reqForm->execute();

    echo '<div class="form-group">';
      echo '<label for="exampleFormControlSelect1">Compétence '.$i.'</label>';
      echo '<select class="form-control" name="comp'.$i.'">';
      while($donneesForm = $reqForm->fetch())
      {
        echo '<option value=', $donneesForm['id_comp'],'>'.$donneesForm['nom'].'</option>';
      }
      echo '</select>';
    echo '</div>';
  }


 ?>

<?php
  $reqForm = $bdd->prepare('SELECT nom, id_comp FROM competence ORDER BY nom');
  $reqForm->execute();

  echo '<form action="cv.php" method="post" id="addCompetence">';
    echo '<div class="form-group">';
      echo '<label for="exampleFormControlSelect1">Compétence</label>';
      echo '<select class="form-control" id="comp" name="numComp">';
      while($donneesForm = $reqForm->fetch())
      {
        echo '<option value=', $donneesForm['id_comp'],'>'.$donneesForm['nom'].'</option>';
      }
      echo '</select>';
    echo '</div>';
    echo '<div class="form-group">';
      echo '<label for="exampleInput1" class="bmd-label-floating">Niveau sur 10</label>';
      echo '<input type="text" class="form-control" name="niveau">';
    echo '</div>';
    echo '<input type="submit" class="btn btn-primary" name="comp"></input>';
  echo '</form>';
 ?>

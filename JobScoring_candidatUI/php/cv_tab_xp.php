<?php

  $req = $bdd->prepare('SELECT titre, description, id_comp1, id_comp2, id_comp3 FROM `cv_exp` WHERE id_user = ?');
  $req->execute(array($id_user));

  echo '<div class="container-table10">';
    echo '<div class="wrap-table10">';
      echo '<div class="table10">';
        echo '<table>';
          echo '<thead>
            <tr class="table100-head">
              <th class="column1">Titre</th>
              <th class="column2">Desc</th>
              <th class="column3">Compétence 1</th>
              <th class="column4">Compétence 2</th>
              <th class="column5">Compétence 3</th>
            </tr>
          </thead>';
            echo '<tbody>';
              while($donnees = $req->fetch())
              {
                echo '<tr>';
                  echo '<td class="column1">',$donnees['titre'],'</td>';
                  echo '<td class="column2">'.$donnees['description'],'</td>';

                  $req_nom = $bdd->prepare('SELECT nom FROM competence WHERE id_comp = ?');
                  $req_nom->execute(array($donnees['id_comp1']));

                  $nom = $req_nom->fetch();

                  echo '<td class="column3">'.$nom['nom'],'</td>';

                  $req_nom = $bdd->prepare('SELECT nom FROM competence WHERE id_comp = ?');
                  $req_nom->execute(array($donnees['id_comp2']));

                  $nom = $req_nom->fetch();

                  echo '<td class="column4">'.$nom['nom'],'</td>';

                  $req_nom = $bdd->prepare('SELECT nom FROM competence WHERE id_comp = ?');
                  $req_nom->execute(array($donnees['id_comp3']));

                  $nom = $req_nom->fetch();

                  echo '<td class="column5">'.$nom['nom'],'</td>';
                echo '</tr>';
              }
          echo '</tbody>';
        echo '</table>';
      echo '</div>';
    echo '</div>';
  echo '</div>';


  $req->closeCursor();
?>

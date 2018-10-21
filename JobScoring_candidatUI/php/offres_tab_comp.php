<?php
  $req = $bdd->prepare('SELECT id_comp, niv_rec FROM offre_emploi WHERE id_offre = ? AND niv_rec > 0');
  $req->execute(array($id_offre));

  echo '<div class="container-table10">';
    echo '<div class="wrap-table10">';
      echo '<div class="table10">';
        echo '<table>';
          echo '<thead>
            <tr class="table100-head">
              <th class="column1">Compétence</th>
              <th class="column2">Niveau</th>
            </tr>
          </thead>';
            echo '<tbody>';
              while($donnees = $req->fetch())
              {
                $req_nom = $bdd->prepare('SELECT nom FROM competence WHERE id_comp = ?');
                $req_nom->execute(array($donnees['id_comp']));

                $nom = $req_nom->fetch();

                echo '<tr>';
                  echo '<td class="column1">',$nom['nom'],'</td>';
                  echo '<td class="column2">'.$donnees['niv_rec'],'</td>';
                echo '</tr>';
              }
          echo '</tbody>';
        echo '</table>';
      echo '</div>';
    echo '</div>';
  echo '</div>';


  $req->closeCursor();
?>

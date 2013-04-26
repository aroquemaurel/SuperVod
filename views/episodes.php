<?php
function afficherListeEpisodes($paoEpisode, $pbAfficherPrix=false) {
    $saisonActuel = 0;
    echo '<table class="table table-striped">';
    echo '<thead>
        <tr>';
        echo '<th></th>';
        echo '<th>Titre</th>';
        echo '<th>Numéro</th>';
        echo '<th>Année</th>';
        echo '<th>Réalisateur</th>';
        echo '<th>Durée</th>';
        echo '<th>Limite age</th>';
        if($pbAfficherPrix) {
            echo '<th>Prix streaming</th>';
            echo '<th>Prix location</th>';
            echo '<th>Prix achat</th>';
        }
    echo '</tr>
    </thead>';

    foreach($paoEpisode as $episode) {
        if($saisonActuel != $episode->saison) {
            $saisonActuel = $episode->saison;
            echo '<tr><td colspan="'.(($pbAfficherPrix) ? 10 : 7).'" style="text-align: center"><strong>Saison '.$saisonActuel.'</strong></td></tr>';
        }
        echo '<tr>';
            echo '<td><img width="35" src="'.$episode->epImage.'" alt="'.$episode->titre.'" /></td>';
            echo '<td>'.$episode->titre.'</td>';
            echo '<td>'.$episode->numero.'</td>';
            echo '<td>'.$episode->annee.'</td>';
            echo '<td>'.$episode->realisateur.'</td>';
            echo '<td>'.conversionDuree($episode->de).'</td>';
            echo '<td>'.$episode->lim.'</td>';
        if($pbAfficherPrix) {
            echo '<td>'.(($episode->prixStream != '') ? $episode->prixStream : 'N/A').'</td>';
            echo '<td>'.(($episode->prixLocation != '') ? $episode->prixLocation : 'N/A').'</td>';
            echo '<td>'.(($episode->prixAchat != '') ? $episode->prixAchat : 'N/A').'</td>';
        }
        echo '</tr>';
        $saisonActuel = ($saisonActuel != $episode->saison) ? $episode->saison : $saisonActuel;
    }
    echo '</table>';

}

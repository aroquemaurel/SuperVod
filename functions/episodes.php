<?php

function afficherListeEpisodes($paoEpisode) {
    $saisonActuel = 0;
    echo '<table class="table table-hover">';
    echo '<thead><tr>';
    echo '<td></td>';
    echo '<td>Saison</td>';
    echo '<td>Titre</td>';
    echo '<td>Numéro</td>';
    echo '<td>Année</td>';
    echo '<td>Réalisateur</td>';
    echo '<td>Durée</td>';
    echo '<td>Limite age</td>';
    echo '</tr></thead>';

    foreach($paoEpisode as $episode) {
        echo '<tr>';
            echo '<td><img width="35px;" src="'.$episode->image.'" alt="'.$episode->titre.'" /></td>';
            echo '<td>'.$episode->saison.'</td>';
            echo '<td>'.$episode->titre.'</td>';
            echo '<td>saison'.$episode->saison.' e'.$episode->numero.'</td>';
            echo '<td>'.$episode->annee.'</td>';
            echo '<td>'.$episode->realisateur.'</td>';
            echo '<td>'.$episode->de.'</td>';
            echo '<td>'.$episode->lim.'</td>';
        echo '</tr>';
    }
    echo '</table>';

}

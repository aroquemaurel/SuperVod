<?php
function afficherSerie($poSerie, $pbLien=false) {
    echo '<h3><img width="50px;"src="'.$poSerie->image.'" alt="'.$poSerie->noms.'" />';
    if($pbLien) {
        echo '<a class="linkNoColor" href="index.php?serie='.$poSerie->cs.'">';
    }
    echo $poSerie->noms.' - '.$poSerie->nb_saisons.' saisons et '.$poSerie->nb_episodes.' épisodes';

    if($pbLien) {
        echo '</a>';
    }
    echo ' <span class="label label-info">'.conversionType($poSerie->types).'</span></h3>';
}
<?php
function afficherAlert($psType, $psMessage) {
    echo '<div class="alert alert-'.$psType.'">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>'.(($psType == 'success') ? 'Succès' : 'Erreur').'</strong> '.$psMessage.'
    </div>';
}
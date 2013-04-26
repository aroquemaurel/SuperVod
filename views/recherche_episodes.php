<?php
include_once('views/header.php');
require_once('database/connect.php');

require_once('database/db_series.php');
?>
<div id="formSearchEpisodes">
    <?php include('views/forms/rechercheEpisode.php'); ?>
</div>
<?php

$series = getAllSeriesComplete();
foreach($episodes as $episodes) {
    afficherSerie($series[$episodes[0]->cs]);
    afficherListeEpisodes($episodes, true);
}
?>


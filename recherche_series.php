<?php
include_once('vues/header.php');
require_once('database/connect.php');

require_once('database/db_series.php');
if(isset($_GET['type']) || isset($_GET['titre']) || isset($_GET['annee'])) {
	$series = searchSeries($_GET['type'], $_GET['titre'], $_GET['annee']);
	foreach($series as $serie) {
        echo $serie->noms; // TODO afficher série
    }
}
include_once('vues/recherche_series.php');
?>


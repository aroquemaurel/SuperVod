<?php
$page = "Recherche des séries";
include_once('vues/header.php');
require_once('database/db_episodes.php');
require_once('vues/episodes.php');
require_once('vues/series.php');

require_once('database/connect.php');
require_once('database/db_series.php');

$series = array();
$titreRempli = (isset($_GET['titre']) && $_GET['titre'] != 'NULL');
$typeRempli = (isset($_GET['type']) && $_GET['type'] != '');
$anneeRemplie =(isset($_GET['annee']) && $_GET['annee'] != '');

if( $titreRempli || $typeRempli || $anneeRemplie) {
    $results = true;
    $series = searchSeries($_GET['type'], $_GET['titre'], $_GET['annee']);
}

include_once('vues/recherche_series.php');
?>


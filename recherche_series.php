<?php
$page = "Recherche des séries";
include_once('vues/header.php');
require_once('database/db_episodes.php');
require_once('vues/episodes.php');
require_once('vues/series.php');

require_once('database/connect.php');
require_once('database/db_series.php');

$series = array();
$episodes = array();

$titreRempli = (isset($_GET['titre']) && $_GET['titre'] != '');
$typeRempli = (isset($_GET['type']) && $_GET['type'] != 'NULL');
$anneeRemplie =(isset($_GET['annee']) && $_GET['annee'] != '');
$ageRempli = (isset($_GET['lim0']) || isset($_GET['lim10'])|| isset($_GET['lim12'])|| isset($_GET['lim16']) || isset($_GET['lim18']));

if( $titreRempli || $typeRempli || $anneeRemplie || $ageRempli) {
    $results = true;
    $abAges = array("0"=>(!isset($_GET['lim0']) || $_GET['lim0'] != '0') ? '0': 'N/A',
        "10"=> (!isset($_GET['lim10']) || $_GET['lim10'] != '10') ? '10':'N/A',
        "12"=>(!isset($_GET['lim12']) || $_GET['lim12'] != '12') ? '12':'N/A',
        "16"=> (!isset($_GET['lim16']) || $_GET['lim16'] != '16') ? '18':'N/A',
        "18"=> (!isset($_GET['lim18']) || $_GET['lim18'] != '18') ? '16':'N/A');

    $series = searchSeries($_GET['type'], $_GET['titre'], $_GET['annee'], $abAges);
    foreach($series as $serie) {
        $episodes[] = getEpisodes($serie->cs);
    }
}

include_once('vues/recherche_series.php');
?>


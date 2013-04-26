<?php
$page = "Recherche des épisodes";
include_once('views/header.php');
require_once('database/db_episodes.php');
require_once('views/episodes.php');
require_once('views/series.php');

require_once('database/connect.php');
require_once('database/db_series.php');

$series = array();
$serieRempli = (isset($_GET['serie']) && $_GET['serie'] != '');
$anneeRemplie = (isset($_GET['annee']) && $_GET['annee'] != '');
$saisonRemplie = (isset($_GET['saison']) && $_GET['saison'] != '');
$prixRempli = (isset($_GET['prix']) && $_GET['prix'] != '');
$typeRempli =  (isset($_GET['location']) || isset($_GET['streaming']) || isset($_GET['achat']));
$episodes = array();
if( $serieRempli || $anneeRemplie || $saisonRemplie || $typeRempli || $prixRempli) {
    $serie = (isset($_GET['serie'])) ? $_GET['serie']: '';
    $annee = (isset($_GET['annee'])) ? $_GET['annee']: '';
    $saison = (isset($_GET['saison'])) ? $_GET['saison']: '';
    $prix  = (isset($_GET['prix'])) ? $_GET['prix']: '';
    $abTypes = array("streaming"=>(!isset($_GET['streaming']) || $_GET['streaming'] != 'S') ? 'S': 0,
                    "location"=> (!isset($_GET['location']) || $_GET['location'] != 'L') ? 'L':0,
                    "achat"=>(!isset($_GET['achat']) || $_GET['achat'] != 'A') ? 'A':0);
    $episodes = searchEpisodes($serie, $annee, $saison, $prix, $abTypes);
}

include_once('views/recherche_episodes.php');
?>


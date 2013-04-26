<?php
$page = 'Accueil'; // Titre de la page
include_once('views/header.php');
require_once('views/episodes.php');
require_once('views/series.php');
require_once('functions/util.php');

require_once('database/db_series.php');
require_once('database/db_episodes.php');
$series = getAllSeriesComplete();
$iSerieActuel = 0;

if(!isset($_GET['serie'])) {
	$iSerieActuel = 1;
} else {
	$iSerieActuel = $_GET['serie'];
}

if(isset($_GET['p'])) {
	switch($_GET['p']) {
	case "connect":
		include_once('connexion.php');
		break;
	case "disconnect":
		include_once('deconnexion.php');
		break;
	}
}

include_once('views/index.php');
include_once('views/footer.php');
?>

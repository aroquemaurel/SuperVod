<?php
	include_once('header.php');
	require_once('connect.php');
	
	require_once('db_series.php');	

	$series = searchSeries($_GET['type'], $_GET['titre'], $_GET['annee']);
	foreach($series as $serie) {
		echo $serie->noms;
	}
?>


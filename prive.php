<?php
$page = "Administration";
	include_once('vues/header.php');
    require_once('vues/alert.php');
	require_once('database/connect.php');
	require_once('database/db_series.php');
    require_once('insertion.php');

	if(isset($_SESSION['admin']) && $_SESSION['admin']) {
        $postSerie = isset($_POST['noms']) || false; // TODO
        $postEpisode = isset($_POST['titre']);
        $resultSerie = false;
        if($postSerie) {
            $resultSerie = insererSerie();
        }
        if($postEpisode) {
            $resultEpisode = insererEpisode();
        }
        include_once('vues/prive.php');
     } else {
        afficherAlert('error', 'Vous n\'avez pas accès à cette page ! ');
    }

include_once('vues/footer.php');


<?php
    $page = 'Accueil';
    include_once('vues/header.php');
    require_once('vues/episodes.php');
    require_once('vues/series.php');
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



    include_once('vues/index.php');
    include_once('vues/footer.php');
?>

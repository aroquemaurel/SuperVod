<?php
    include_once('vues/header.php');

    require_once('functions/util.php');
    require_once('functions/episodes.php');
    require_once('functions/series.php');

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

?>
<div class="well well-small">
    <h1>Hello, world!</h1>
</div>
<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <?php
            $sTypeActuel = '';
            foreach($series as $serie) {
                if($sTypeActuel != $serie->types) {
                    echo '<li class="nav-header">'.conversionType($serie->types).'</li>';
                    $sTypeActuel = $serie->types;
                }
                echo '<li';
                echo ($iSerieActuel == $serie->cs) ? ' class="active"' : '';
                echo '><a href="?serie='.$serie->cs.'">'.$serie->noms.'</a></li>';
            }
            ?>
        </ul>

    </div><!--/.well -->
</div><!--/span-->


<div class="row-fluid">
    <div class="span9">
    <?php
        $episodes = getEpisodes($iSerieActuel);

        afficherSerie($series[$iSerieActuel]);
        afficherListeEpisodes($episodes);

    include_once('vues/footer.php');
?>

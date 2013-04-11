<?php
    include_once('vues/header.php');

    require_once('util.php');
	require_once('database/db_series.php');
    require_once('database/db_episodes.php');
    $series = getAllSeries();
    $iSerieActuel = 0;
    if(!isset($_GET['serie'])) {
        $iSerieActuel = 1;
    } else {
        $iSerieActuel = $_GET['serie'];
    }
?>
<div class="hero-unit">
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
					echo '<h3><img width="50px;"src="'.$series[$iSerieActuel]->image.'" alt="'.$series[$iSerieActuel]->noms.'" />';
					echo $series[$iSerieActuel]->noms.' - '.$series[$iSerieActuel]->nb_saisons.
                        ' saisons et '.$series[$iSerieActuel]->nb_episodes.' épisodes</h3>';
					echo '<h4><em>'.conversionType($series[$iSerieActuel]->types).'</em></h4>';

					echo '<table class="table table-striped">';
                    echo '<thead><tr>';
							echo '<td></td>';
							echo '<td>Titre</td>';
							echo '<td>Numéro</td>';
							echo '<td>Année</td>';
							echo '<td>Réalisateur</td>';
							echo '<td>Durée</td>';
							echo '<td>Limite age</td>';
						echo '</tr></thead>';

                    $episodes = getEpisodes($iSerieActuel);

                    foreach($episodes as $episode) {
						echo '<tr>';
							echo '<td><img width="35px;" src="'.$episode->image.'" alt="'.$episode->titre.'" /></td>';
							echo '<td>'.$episode->titre.'</td>';
							echo '<td>saison'.$episode->saison.' e'.$episode->numero.'</td>';
							echo '<td>'.$episode->annee.'</td>';							
							echo '<td>'.$episode->realisateur.'</td>';
							echo '<td>'.$episode->de.'</td>';							
							echo '<td>'.$episode->lim.'</td>';							
							echo '</tr>';
						}								
						
			
					echo '</table>';
		?>
</table>
<?php
    include_once('vues/footer.php');
?>

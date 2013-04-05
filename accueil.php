<?php
    include_once('vues/header.php');

    require_once('util.php');
	require_once('database/db_series.php');
    require_once('database/db_episodes.php');
    $series = getAllSeries();

?>
<div id="content">
	<table style="border: 1px solid black;">
		<tr>
			<td></td>
			<td>Nom</td>
			<td>Type</td>
			<td>Nombre de saisons</td>
			<td>Nombre d'épisodes</td>
		</tr>
		<?php	
			foreach($series as $serie) {
				echo '<tr>';
					echo '<td><img width="50px;"src="'.$serie->image.'" alt="'.$serie->noms.'" /></td>';
					echo '<td>'.$serie->noms.'</td>';
					echo '<td>'.conversionType($serie->types).'</td>';
					echo '<td>'.$serie->nb_saisons.'</td>';
					echo '<td>'.$serie->nb_episodes.'</td>';
				echo '</tr>';
				echo '<tr>';
				echo'<td>';
					echo '<td collspan="5">';
					echo '<table>';
							echo '<td></td>';
							echo '<td>Titre</td>';
							echo '<td>Numéro</td>';
							echo '<td>Année</td>';
							echo '<td>Saison</td>';
							echo '<td>Réalisateur</td>';
							echo '<td>Durée</td>';
							echo '<td>Limite age</td>';
						echo '</tr>';

                    $episodes = getEpisodes($serie->cs);

                    foreach($episodes as $episode) {
						echo '<tr>';
							echo '<td><img width="35px;" src="'.$episode->image.'" alt="'.$episode->titre.'" /></td>';
							echo '<td>'.$episode->ce.'</td>';
							echo '<td>'.$episode->titre.'</td>';
							echo '<td>'.$episode->numero.'</td>';							
							echo '<td>'.$episode->annee.'</td>';							
							echo '<td>'.$episode->saison.'</td>';							
							echo '<td>'.$episode->realisateur.'</td>';							
							echo '<td>'.$episode->de.'</td>';							
							echo '<td>'.$episode->lim.'</td>';							
							echo '</tr>';
						}								
						
			
					echo '</table>';
					echo '</td>';
					
					echo '</td>';
					
				echo '</tr>';
			}
		?>
	</table>
</div>
</body>

<?php
	include_once('header.php');
	require_once('util.php');
	require_once('db_series.php');
	
	require_once('connect.php');
	$result = mysql_query("select distinct series.cs, noms, series.image, types, max(saison) AS nb_saisons, count(numero) as nb_episodes
							from episodes, series
							where series.cs = episodes.cs 
							group by noms
						")
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

			while($serie = mysql_fetch_object($result)) {
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
						$resultEpisodes = mysql_query("select * from episodes where episodes.cs = ".$serie->cs."");			
							echo '<td></td>';
							echo '<td>Titre</td>';
							echo '<td>Numéro</td>';
							echo '<td>Année</td>';
							echo '<td>Saison</td>';
							echo '<td>Réalisateur</td>';
							echo '<td>Durée</td>';
							echo '<td>Limite age</td>';
						echo '</tr>';
														
						
						while($episode = mysql_fetch_object($resultEpisodes)) {
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

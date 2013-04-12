function AfficheEpisode($series){
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
}

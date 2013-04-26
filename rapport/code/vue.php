<div id="formSearch">
	<?php include('views/forms/rechercheSerie.php'); // formulaire de recherche?>
</div>

<?php
echo '<div id="series">';
echo '<div id="monaccordeon">';
$i = 0;
foreach($series as $serie) { ?>
		<!-- On utilise un accordion de Bootstrap pour éviter de surcharger la page lorsqu'on affiche pour chaque série ses épisodes associés -->
	<div class="accordion-group">
	<div class="accordion-heading" data-toggle="collapse" data-parent="#monaccordeon" data-target="#item'.$i.'">
		<a style="cursor: pointer">
			<?php afficherSerie($serie); // on affiche la série courante ?>
		</a>
		</div>
		<div id="item'.$i.'" class="collapse accordion-group">
			<?php afficherListeEpisodes($episodes[$i]); // la liste des épisodes de la série courante
			?>
		</div>
	</div> 
	<?php
	++$i;
}
?>
</div>
</div>

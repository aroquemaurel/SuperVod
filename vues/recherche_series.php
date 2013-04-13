<?php
	include_once('vues/header.php');
	require_once('database/connect.php');
	
	require_once('database/db_series.php');
?>
<div id="formSearch">
<?php include('vues/forms/rechercheSerie.php'); ?>
</div>

<?php
echo '<div id="series">';
    foreach($series as $serie) {
        afficherSerie($serie, true);
    }
echo '</div>';

?>

<?php
	include_once('vues/header.php');
	require_once('database/connect.php');
	require_once('database/db_series.php');

	if(isset($_SESSION['admin']) && $_SESSION['admin']) {
        echo '<div id="monaccordeon">
                <div class="accordion-group">
                    <button class="btn btn-primary accordion-heading" data-toggle="collapse" data-parent="#monaccordeon" data-target="#item1">
                        Ajouter une série
                    </button>
                    <div id="item1" class="collapse accordion-group">
                    <div class="accordion-inner">';
                        include('vues/forms/ajouterSerie.php');
                    echo '</div>
        </div>

      </div>
      <div class="accordion-group">
            <button class="btn btn-primary accordion-heading" data-toggle="collapse" data-parent="#monaccordeon" data-target="#item2">
            Ajouter un épisode
            </button>
            <div id="item2" class="collapse accordion-group">
                <div class="accordion-inner">';
                        include('vues/forms/ajouterEpisode.php');
                echo '</div>
            </div>
      </div>
    </div>';
     }else{
        echo '<div class="alert alert-error"><strong>Erreur</strong>Vous n\'avez pas accès à cette page</div>';
    }
?>
<?php include_once('vues/footer.php'); ?>


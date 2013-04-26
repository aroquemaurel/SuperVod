<div id="monaccordeon">
    <div class="accordion-group">
        <button style="margin-left: 40%;" class="btn btn-primary accordion-heading"
                data-toggle="collapse" data-parent="#monaccordeon" data-target="#item1">
            Ajouter une série
        </button>
        <div id="item1" class="collapse accordion-group">
            <?php include_once('views/forms/ajouterSerie.php'); ?>
        </div>
    </div>
    <div class="accordion-group">
        <button style="margin-left: 40%;" class="btn btn-primary accordion-heading"
            data-toggle="collapse" data-parent="#monaccordeon" data-target="#item2">
            Ajouter un épisode
        </button>
        <div id="item2" class="collapse accordion-group">
            <?php include('views/forms/ajouterEpisode.php'); ?>
        </div>
    </div>
</div>
<?php
if($postSerie) {
    echo '<script type="text/javascript">
                    $("#item1").collapse("show");
            </script>';
}
if($postEpisode) {
    echo '<script type="text/javascript">
                    $("#item2").collapse("show");
            </script>';
}

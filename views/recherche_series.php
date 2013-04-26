<div id="formSearch">
<?php include('views/forms/rechercheSerie.php'); ?>
</div>

<?php
echo '<div id="series">';
    echo '<div id="monaccordeon">';
$i = 0;
    foreach($series as $serie) {
            echo'
                <div class="accordion-group">
                    <div class="accordion-heading"
                            data-toggle="collapse" data-parent="#monaccordeon" data-target="#item'.$i.'">
                            <a style="cursor: pointer">';
        afficherSerie($serie);
            echo'</a></div>
                    <div id="item'.$i.'" class="collapse accordion-group">
                 ';
        afficherListeEpisodes($episodes[$i]);
        echo '</div>

      </div>';

        ++$i;
    }
echo '</div>';
echo '</div>';
?>

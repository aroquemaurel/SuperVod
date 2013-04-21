<div id="carousel" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
			<li data-target="#carousel" data-slide-to="2"></li>
			 <li data-target="#carousel" data-slide-to="3"></li>

        </ol>
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item carouselItem">
                <img src="images/carousel/doctorWho.jpg" alt="" />
                <div class="carousel-caption">
                    <h4>Bienvenue sur SuperVod ! </h4>
                    <p> Les meilleures séries sont chez nous !</p>
                </div>
            </div>
            <div class="item carouselItem">
                <img src="images/carousel/simpsons.jpeg" alt="" />
                <div class="carousel-caption">
                    <h4>Pour tout public</h4>
                    <p><em>De nombreux animés</em></p>
                </div>
			</div>

			 <div class="item carouselItem">
                <img src="images/carousel/pokemon.png" alt="" />
                <div class="carousel-caption">
                    <h4>Les Grands classiques</h4>
                    <p><em>Tous les animés de votre enfance!</em></p>
                </div>
            </div>
            <div class="item carouselItem" >
                <img src="images/carousel/dexter.jpg" alt="" />
            </div>
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
    </div>

    <div class="row-fluid">
    <div class="span3 menuSeries">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <?php
            $sTypeActuel = '';
            foreach($series as $serie) {
                if($sTypeActuel != $serie->types) {
                    echo '<li class="nav-header">'.conversionType($serie->types).'</li>';
                    $sTypeActuel = $serie->types;
                }
                if($iSerieActuel == $serie->cs) {
                    $sImageSerieActuel = $serie->image;
                }
                echo '<li';
                echo ($iSerieActuel == $serie->cs) ? ' class="active"' : '';
                if($serie->nb_episodes > 0) {
                    echo '><a href="?serie='.$serie->cs.'">'.$serie->noms.'</a></li>';
                } else {
                    echo '><a class="infoBulles" data-original-title="Prochainement" rel="tooltip">'.$serie->noms.'</a></li>';
                }
            }
            ?>
        </ul>

    </div><!--/.well -->
</div><!--/span-->


    <div class="span8">
    <?php
        $episodes = getEpisodes($iSerieActuel);
		foreach($episodes as $ep) {
            if(empty($ep->epImage)) {
                $ep->epImage = $sImageSerieActuel;
            }
        }

        afficherSerie($series[$iSerieActuel]);
        afficherListeEpisodes($episodes);
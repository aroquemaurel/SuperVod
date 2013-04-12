<?php
// TODO Ajouter OBLIGATOIREMENT selectionner série auquel appartient l'épisode (liste déroulante ? OU LE SQL MARCHE PAS A CAUSE DE FOREIGN KEY)
// TODO Changer le type="text" pour image par un formulaire d'upload.
// TODO Ajouter des vérifications sur les données avant envoie (> 0, < x caractères etc...)
?>
<form method="POST" action="insertionEpisode.php"  id="postAjoutEpisode" class="form-horizontal well">
    <fieldset>
        <legend>Ajouter un épisode</legend>
        <?php $series=getAllSeries();?>
        <div class="control-group">
            <label class="control-label" for="titre">Serie</label>
            <div class="controls">
                <?php
                echo '<select class="input-large"  id="serie" name="serie">';
                echo '<option value="NULL">&nbsp;</OPTION>';
                foreach($series as $serie) {
                    echo $serie->cs;
                    echo $serie->noms;
                    echo '<option value="'.$serie->cs.'">'.$serie->noms.'</OPTION>';
                }
                echo '</select>';
                ?>

            </div>
            <div class="alert alert-error hide" id="serieAlert">
                <h4 class="alert-heading">Erreur !</h4>
                Le champ ne peut être vide </div>

        </div>
        <div class="control-group">
            <label class="control-label" for="titre">Titre</label>
            <div class="controls">
                <input type="text" class="input-large" style="height:25px;" id="titre" name="titre" />
            </div>
            <div class="alert alert-error hide" id="titreAlert">
                <h4 class="alert-heading">Erreur !</h4>
                Le champ ne peut être vide </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="numero">Numéro</label>
            <div class="controls">
                <input type="number" class="input-large" style="height:25px;" id="numero" name="numero" />
            </div>
            <div class="alert alert-error hide" id="numeroAlert">
                <h4 class="alert-heading">Erreur !</h4>
                Le champ ne peut être vide
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="annee">Année</label>
            <div class="controls">
                <select id="annee" name="annee" class="input-large">
                    <?php
                    echo '<option value="">&nbsp;</option>';
                    for($i=2013 ; $i > 1950 ; --$i ) {
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="saison">Saison</label>
            <div class="controls">
                <input type="number" style="height:25px;" class="input-large" id="saison" name="saison" />
            </div>
            <div class="alert alert-error hide" id="saisonAlert">
                <h4 class="alert-heading">Erreur !</h4>
                Le champ ne peut être vide </div>

        </div>
        <div class="control-group">
            <label class="control-label" for="realisateur">Réalisateur</label>
            <div class="controls">
                <input type="text" class="input-large" style="height:25px;" id="realisateur" name="realisateur" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="duree">Durée</label>
            <div class="controls">
                <input type="number" style="height:25px;" class="input-large" id="duree" name="duree" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="image">Image</label>
            <div class="controls">
                <input type="text" style="height:25px;" class="input-large" id="image" name="image" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="lim">Limite d'age</label>
            <div class="controls">
                <select id="lim" name="lim" class="input-large">
                    <option value="0">&nbsp;&nbsp;0</option>
                    <option value="10">10</option>
                    <option value="12">12</option>
                    <option value="16">16</option>
                    <option value="18">18</option>
                </select>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary">
            <input type="reset" class="btn">
        </div>
    </fieldset>

</form>
<script>
    $(function(){
        $("#postAjoutEpisode").on("submit", function(){
            $("div.alert").hide();
            var retour = true;

            if($("#titre").val().length <= 0){
                $("#titreAlert").show("slow");
                retour = false;
            }
            if($("#numero").val().length <= 0){
                $("#numeroAlert").show("slow");
                retour = false;
            }
            if($("#saison").val().length <= 0){
                $("#saisonAlert").show("slow");
                retour = false;
            }
            if($("#serie").val() == 'NULL'){
                $("#serieAlert").show("slow");
                retour = false;
            }

            return retour;
        });
    });</script>

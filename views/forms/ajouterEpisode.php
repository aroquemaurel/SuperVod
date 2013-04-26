<form method="POST" action="prive.php"  id="postAjoutEpisode" class="form-horizontal well" enctype="multipart/form-data">
    <fieldset>
        <legend  style="text-align: center">Ajouter un épisode</legend>
        <div class="formPrive">
        <?php
            if($postEpisode) { // Si on a posté une série
                if(isset($postEpisode) && $postEpisode) { //aucune erreur, c'est bon.
                    afficherAlert('success', 'Votre épisode à bien été ajoutée ');
                } else {
                    afficherAlert('error', 'Erreur dans l\'ajout de l\'épisode ! ');
                }
            }
        $series=getAllSeries();?>
        <div class="control-group">
            <label class="control-label" for="titre">Série</label>
            <div class="controls">
                <?php
                $typeActuel = '';
                echo '<select class="input-large"  id="serie" name="serie">';
                echo '<option value="NULL">&nbsp;</OPTION>';
                foreach($series as $serie) {
                    if($typeActuel != $serie->types) {
                        if($typeActuel != '') {
                            echo '</optgroup>';
                        }
                        $typeActuel = $serie->types;
                        echo '<optgroup label="'.conversionType($serie->types).'">';
                    }
                    echo $serie->cs;
                    echo $serie->noms;
                    echo '<option value="'.$serie->cs.'">'.$serie->noms.'</option>';
                }
                echo '</optgroup>';
                echo '</select>';
                ?>
            </div>
            <div class="alert alert-error hide alertsForms" id="serieAlert">
                <h4 class="alert-heading erreursForms">Erreur !</h4>
                Le champ ne peut être vide </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="titre">Titre</label>
            <div class="controls">
                <input type="text" class="input-large" id="titre" name="titre" />
            </div>
            <div class="alert alert-error hide alertsForms" id="titreAlert">
                <h4 class="alert-heading">Erreur !</h4>
                Le champ ne peut être vide </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="numero">Numéro</label>
            <div class="controls">
                <input type="number" min="0" class="input-large" id="numero" name="numero" />
            </div>
            <div class="alert alert-error hide alertsForms" id="numeroAlert">
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
                <input type="number" min="0" class="input-large" id="saison" name="saison" />
            </div> 
            <div class="alert alert-error hide alertsForms" id="saisonAlert">
                <h4 class="alert-heading">Erreur !</h4>
                Le champ ne peut être vide </div>
        </div>
        <div class="control-group">
                <fieldset id="possibiliteAchat">Possiblité d'achat</fieldset>
                <div class="controls">
                    <div class="typeAccesEpisode control-group">
                        <label class="control-label" for="typeLocation">Location</label>
                            <div class="controls">
                                <input type="checkbox" id="typeLocation" name="typeLocation" value="L" />&nbsp;&nbsp;
                                <input readonly="readonly" class="input-mini"  id="prixLocation" type="number" step="0.1" name="prixLocation" />
                            </div>
                    </div>
                    <div class="typeAccesEpisode  control-group">
                       <label class="control-label" for="typeAchat">Achat</label>
                        <div class="controls">
                            <input type="checkbox" id="typeAchat" name="typeAchat" value="A" />&nbsp;&nbsp;
                            <input class="input-mini" readonly="readonly" id="prixAchat" type="number" step="0.1" name="prixAchat" />
                        </div>
                    </div>
                    <div class="typeAccesEpisode control-group">
                        <label class="control-label" for="typeStreaming">Streaming</label>
                        <div class="controls">
                            <input type="checkbox" id="typeStreaming" name="typeStreaming" value="S" />&nbsp;&nbsp;
                            <input class="input-mini" readonly="readonly" id="prixStreaming" type="number" step="0.1"  name="prixStreaming" />
                        </div>
                    </div>
                </div>
        </div>
            <div class="control-group" class="realisateur">
                <label class="control-label" class="realisateur"for="realisateur">Réalisateur</label>
                <div class="controls">
                    <input type="text" class="input-large" id="realisateur" name="realisateur" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="duree">Durée</label>
                <div class="controls">
                    <input type="number" min="0"  class="input-large" id="duree" name="duree" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="image">Image</label>
                <div class="controls">
                    <input type="file" class="input-large" id="image" name="image" />
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
        });


        $("#typeLocation").on("change", function() {
            if($('#typeLocation').is(':checked')) {
                $('#prixLocation').removeAttr('readonly')
            } else {
                $('#prixLocation').attr('readonly', 'readonly')
            }
        });
        $("#typeAchat").on("change", function() {
            if($('#typeAchat').is(':checked')) {
                $('#prixAchat').removeAttr('readonly')
            } else {
                $('#prixAchat').attr('readonly', 'readonly')
            }
        });

        $("#typeStreaming").on("change", function() {
            if($('#typeStreaming').is(':checked')) {
                $('#prixStreaming').removeAttr('readonly')
            } else {
                $('#prixStreaming').attr('readonly', 'readonly')
            }
        });

    </script>

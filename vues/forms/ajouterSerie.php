<form method="POST" id="postAjoutSerie" action="prive.php" class="form-horizontal well" enctype="multipart/form-data">
    <fieldset>
        <legend style="text-align: center">Formulaire d'insertion de la serie.</legend>
        <div class="formPrive">
            <?php
            if($postSerie) { // Si on a posté une série
                if(isset($resultSerie) && $resultSerie) { //aucune erreur, c'est bon.
                    afficherAlert('success', 'Votre série à bien été ajoutée ');
                } else {
                    afficherAlert('error', 'Erreur dans l\'ajout de la série ! ');
                }
            }
            ?>

        <div class="control-group">
            <label class="control-label">Type</label>
            <div class="controls">
                <input type="radio" id="tanime" name="type" value="A" /> Animé
                <input type="radio" id="tpolicier" name="type" value="P" /> Policier
                <input type="radio" id="tfiction" name="type" value="F"/> Fiction
            </div>
            <div style="margin-top:10px;" class="alert alert-error hide alertsForms" id="typeAlert">
                <h4 class="alert-heading">Erreur !</h4>
                Vous devez sélectionner un type </div>

        </div>
        <div class="control-group">
            <label class="control-label" for="noms">Nom</label>

            <div class="controls">
                <input type="text" class="input-large" style="height:25px;" id="noms" name="noms" />
            </div>
            <div class="alert alert-error hide alertsForms" id="nomAlert" >
                <h4 class="alert-heading">Erreur !</h4>
                Le champ ne peut être vide </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="image">Image</label>
            <div class="controls">
                <input type="file" class="input-large" style="height:25px;" id="image" name="image" />
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
        $("#postAjoutSerie").on("submit", function(){
            $("div.alert").hide();
            var retour = true;
            if(!$('#tanime').is(':checked') && !$("#tfiction").is(':checked') && !$("#tpolicier").is(':checked')){
                $("#typeAlert").show("slow");
                retour = false;
            }
            if($('#noms').val().length <= 0) {
                $("#nomAlert").show("slow");
                retour = false;
            }

            return retour;
        });
    });</script>

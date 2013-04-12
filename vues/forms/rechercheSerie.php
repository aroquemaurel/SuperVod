<form type="get" action="recherche_series.php" class="form-horizontal well">
    <fieldset>
        <legend>Rechercher une série</legend>
        <div class="control-group">
            <label class="control-label" for="type">Type</label>
            <div class="controls">
                <!-- Si un type à été choisis préalablement, on préselectionne le choix de l'utilisateur -->
                <input type="radio" name="type" value="NULL" checked="checked"
                    <?php echo ($typeRempli && $_GET['type'] == 'NULL') ? 'checked="checked"' : ''; ?> /> Indiférrent
                <input type="radio" name="type" value="A"
                    <?php echo ($typeRempli && $_GET['type'] == 'A') ? 'checked="checked"' : ''; ?>/> Animé
                <input type="radio" name="type" value="P"
                    <?php echo ($typeRempli && $_GET['type'] == 'P') ? 'checked="checked"' : ''; ?>/> Policier
                <input type="radio" name="type" value="F"
                <?php echo ($typeRempli && $_GET['type'] == 'F') ? 'checked="checked"' : ''; ?>/> Fiction
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="titre">Titre</label>
            <div class="controls">
                <input type="text" class="input-large"  id="titre"
                       value="<?php echo ($titreRempli) ? $_GET['titre'] : '';//Si l'utilisateur avait entré un titre ?>" name="titre" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="annee">Année</label>
            <div class="controls">
                <select id="annee" name="annee" class="input-large">
                    <option value="">&nbsp;</option>
                    <?php
                    foreach(getAllAnneesDiffusion() as $annee) { //uniquement les années de diffusion
                        echo '<option value="'.$annee->annee.'"';
                        if($anneeRemplie && $_GET['annee'] == $annee->annee) {
                            echo ' selected="selected" ';
                        }
                        echo '>'.$annee->annee.'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-actions">
            <input type="submit" class="btn btn-primary">
            <input type="reset" class="btn">
        </div>
    </fieldset>

</form>

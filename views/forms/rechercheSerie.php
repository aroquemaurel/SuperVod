<form method="get" action="recherche_series.php" class="form-horizontal well">
    <fieldset>
        <legend>Rechercher une série</legend>
        <div class="control-group">
            <label class="control-label">Type</label>
            <div class="controls">
                <!-- Si un type à été choisis préalablement, on préselectionne le choix de l'utilisateur -->
                <input type="radio" name="type" value="NULL" checked="checked"
                    <?php echo ($typeRempli && $_GET['type'] == 'NULL') ? 'checked="checked"' : ''; ?> /> Indifférrent
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
        <div class="control-group">
            <label class="control-label">Age</label>
            <div class="controls">

        <input type="checkbox" name="lim0" value="0"
            <?php echo (isset($_GET['lim0']) && $_GET['lim0'] == '0') ? 'checked="checked"' : ''; ?>/> +0
        <input type="checkbox" name="lim10" value="10"
            <?php echo (isset($_GET['lim10'])&&$_GET['lim10'] == '10') ? 'checked="checked"' : ''; ?>/> +10
        <input type="checkbox" name="lim12" value="12"
            <?php echo (isset($_GET['lim12']) &&$_GET['lim12'] == '12') ? 'checked="checked"' : ''; ?>/> +12
        <input type="checkbox" name="lim16" value="16"
                    <?php echo (isset($_GET['lim16']) &&$_GET['lim16'] == '16') ? 'checked="checked"' : ''; ?>/> +16
        <input type="checkbox" name="lim18" value="18"
                    <?php echo (isset($_GET['lim18']) &&$_GET['lim18'] == '18') ? 'checked="checked"' : ''; ?>/> +18
            </div>
        </div>

        <div class="form-actions">
            <input type="submit" class="btn btn-primary">
            <input type="reset" class="btn">
        </div>
    </fieldset>

</form>

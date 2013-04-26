<form method="get" action="recherche_episodes.php" class="form-inline well">
    <fieldset>
        <legend>Rechercher un épisode</legend>

        <label class="control-label" for="serie">Série</label>
                <input style="height:25px" type="text" class="input-medium"  id="serie"
                       value="<?php echo ($serieRempli) ? $_GET['serie'] : '';//Si l'utilisateur avait entré un titre ?>" name="serie" />
            <label class="control-label" for="annee">Année</label>
                <select style="height:25px" id="annee" name="annee" class="input-small">
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
    <label class="control-label" for="saison">Saison</label>
    <input type="number" style="height:25px" min="0"  class="input-mini" id="saison"
           value="<?php echo (isset($_GET['saison'])) ? $_GET['saison'] : '';//Si l'utilisateur avait entré un titre ?>" name="saison" />

    <label class="control-label" for="saison">Prix maximum</label>
    <input type="number"  step="0.10" style="height:25px" min="0" class="input-mini"  id="prix"
           value="<?php echo (isset($_GET['prix'])) ? $_GET['prix'] : '';//Si l'utilisateur avait entré un titre ?>" name="prix" />
                <!-- Si un type à été choisis préalablement, on préselectionne le choix de l'utilisateur -->
                <input type="checkbox" name="streaming" value="S"
                    <?php echo (isset($_GET['streaming']) && $_GET['streaming'] == 'S') ? 'checked="checked"' : ''; ?>/> Streaming
                <input type="checkbox" name="location" value="L"
                    <?php echo (isset($_GET['location'])&&$_GET['location'] == 'L') ? 'checked="checked"' : ''; ?>/> Location
                <input type="checkbox" name="achat" value="A"
                    <?php echo (isset($_GET['achat']) &&$_GET['achat'] == 'A') ? 'checked="checked"' : ''; ?>/> Achat

            <input type="submit" class="btn btn-primary">
        </fieldset>
</form>

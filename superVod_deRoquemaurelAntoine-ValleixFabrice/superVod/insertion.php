<?php
require_once('database/connect.php');
require_once('functions/util.php');
require_once('functions/upload.php');
require_once('database/db_episodes.php');
require_once('database/db_series.php');


function insererSerie() {
    if(isset($_POST['noms']))
        $noms=$_POST['noms'];

    if(isset($_POST['type']))
        $type=$_POST['type'];

    if(isset($_POST['image']))
        $image=$_POST['image'];
    else $image="";


    if(empty($_POST['noms'])) {
        echo '<div class="alert alert-error">';
        echo 'Attention,  le champs nom ne peut etre vide !';
        echo '</div>';
    } else {
        if(isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
            $fileName = uploaderImage($_FILES['image']);
        } else {
            $fileName = '';
        }
        $result = ajouterSerie($noms,$type,$fileName);
    }

    return $result;
}

function insererEpisode() {
    if(isset($_POST['titre'])) {
        $titre=$_POST['titre'];
    }

    if($_POST['serie'] != 'NULL') {
        $serie=$_POST['serie'];
    }

    if(isset($_POST['numero'])) {
        $numero=$_POST['numero'];
    }

    if(isset($_POST['annee'])) {
        $annee=$_POST['annee'];
    }

    if(isset($_POST['saison'])) {
        $saison=$_POST['saison'];
    }

    if(isset($_POST['realisateur'])) {
        $realisateur=$_POST['realisateur'];
    }

    if(isset($_POST['duree'])) {
        $duree=$_POST['duree'];
    }

    if(isset($_POST['lim'])) {
        $lim=$_POST['lim'];
    }


    if(empty($_POST['titre'])|| $_POST['serie']=='NULL' || empty($_POST['numero']) || empty($_POST['saison'])) {
        afficherAlert('error', 'le champs titre,serie, numero et saison  ne peuvent être vide !');
    } else {
        $aTypesAchats = array();
        $i = 0;
        if(isset($_POST['typeLocation']) && $_POST['typeLocation'] == 'L') {
            $aTypesAchats[$i]['type'] = $_POST['typeLocation'];
            $aTypesAchats[$i]['prix'] = $_POST['prixLocation'];
            ++$i;
        }
        if(isset($_POST['typeStreaming']) && $_POST['typeStreaming'] == 'S') {
            $aTypesAchats[$i]['type'] = $_POST['typeStreaming'];
            $aTypesAchats[$i]['prix'] = $_POST['prixStreaming'];
            ++$i;
        }
        if(isset($_POST['typeAchat']) && $_POST['typeAchat'] == 'A') {
            $aTypesAchats[$i]['type'] = $_POST['typeAchat'];
            $aTypesAchats[$i]['prix'] = $_POST['prixAchat'];
            ++$i;
        }
        if(isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
            $image = uploaderImage($_FILES['image']);
        } else {
            $image = '';
        }
        return(insertionEpisode($titre, $serie, $numero, $annee, $saison, $realisateur, $duree, $lim, $image, $aTypesAchats));
    }
}
?>

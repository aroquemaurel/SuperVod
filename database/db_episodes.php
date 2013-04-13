<?php
require_once('database/connect.php');
require_once('functions/util.php');

function getEpisodes($piIdSerie) {
    return fetch_all_objects(mysql_query("select titre,image as epImage,numero, lim,saison,de,realisateur,annee from episodes where episodes.cs = ".$piIdSerie."
                                        order by saison, numero"));
}
function getEpisodesWithTarifs() {
    /*
     * select episodes.ce as ep, titre,
        (select prix from fichiers,episodes where fichiers.ce = 1 and type='S' and episodes.ce=fichiers.ce)  as prixStream,
        (select prix from fichiers,episodes where fichiers.ce = 1 and type='A' and episodes.ce=fichiers.ce)  as prixAchat,
        (select prix from fichiers,episodes where fichiers.ce = 1 and type='L' and episodes.ce=fichiers.ce)  as prixLocal
        from episodes, fichiers
        where episodes.ce=fichiers.ce
     */
}
function insertionEpisode($psTitre, $piSerie,$piNumero,$piAnnee,$piSaison,$psRealisateur,$piDuree,$piLim,$psImage) {
    $sql = " INSERT INTO episodes(titre,cs,numero,annee,saison,realisateur,de,lim,image)
				VALUES('$psTitre','$piSerie','$piNumero','$piAnnee','$piSaison','$psRealisateur','$piDuree','$piLim','$psImage')";
    return (mysql_query($sql));
}

function searchEpisodes($psSerie, $piAnnee, $piSaison, $piPrix, $paType) {
    $return = array();
    $bAnnee = isset($piAnnee) && $piAnnee != '';
    $requete = 'select distinct series.cs, episodes.ce as ep, titre, saison, numero, annee, realisateur,
                                de,lim,episodes.image as epImage, series.image as seImage,
(select prix from fichiers,episodes where fichiers.ce = ep and type=\'S\' and episodes.ce=fichiers.ce) as prixStream,
(select prix from fichiers,episodes where fichiers.ce = ep and type=\'L\' and episodes.ce=fichiers.ce) as prixLocation,
(select prix from fichiers,episodes where fichiers.ce = ep and type=\'A\' and episodes.ce=fichiers.ce) as prixAchat
                from episodes, fichiers, series
                where fichiers.ce = episodes.ce and episodes.cs = series.cs';
    $requete .= ' and noms LIKE \'%'.$psSerie.'%\' ';

    if($bAnnee) {
        $requete .= ' AND annee = \''.$piAnnee.'\'';
    }
    $whereType  = '';
    $nbType = 0;
    foreach($paType as $type) {
        if($type) {
            $whereType .= ' AND fichiers.type <> \''.$type.'\'';
            ++$nbType;
        }
    }

    if($nbType != 3) { //si rien n'est coché, on ne filtre pas
        $requete .= $whereType;
    }

    if($piSaison != '') {
        $requete .= ' AND saison=\''.$piSaison.'\'';
    }

    if($piPrix != '') {
        $requete .= ' AND prix<'.$piPrix.'';
    }
    $result = mysql_query($requete) or die(mysql_error());
    while($object = mysql_fetch_object($result)) {
        $return[$object->cs][] = $object;
    }

    return $return;
}

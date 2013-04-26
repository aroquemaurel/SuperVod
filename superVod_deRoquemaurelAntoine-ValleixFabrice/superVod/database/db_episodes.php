<?php
require_once('database/connect.php');
require_once('functions/util.php');

function getEpisodes($piIdSerie) {
    return fetch_all_objects(mysql_query("select titre,image as epImage,numero, lim,saison,de,realisateur,annee
                                        from episodes where episodes.cs = ".$piIdSerie."
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
function insertionEpisode($psTitre, $piSerie,$piNumero,$piAnnee,$piSaison,$psRealisateur,$piDuree,$piLim,$psImage, $paAchats) {
    $sqlEpisode = " INSERT INTO episodes(titre,cs,numero,annee,saison,realisateur,de,lim,image)
				VALUES('$psTitre','$piSerie','$piNumero','$piAnnee','$piSaison','$psRealisateur','$piDuree','$piLim','$psImage')";
	$returnCode1 = mysql_query($sqlEpisode);
	if(!$returnCode1) {
		return $returnCode1;
	}
	$idEpisode	= mysql_insert_id();
	foreach($paAchats as $achat) {
		$sqlAchat = 'INSERT INTO fichiers(ce, type, prix) VALUES('.$idEpisode.', \''.$achat['type'].'\', \''.$achat['prix'].'\');';
		$returnCode1 = mysql_query($sqlAchat);
		if(!$returnCode1) {
			return $returnCode1;
		}
	}
    return ($returnCode1);
}

function searchEpisodes($psSerie, $piAnnee, $piSaison, $piPrix, $paType) {
    $return = array();
    $bAnnee = isset($piAnnee) && $piAnnee != '';
    $requete = 'select distinct series.cs, episodes.ce as ep, titre, saison, numero, annee, realisateur, ';
	$requete .= 'de,lim,episodes.image as epImage, series.image as seImage, ';
	$requete .= '(select prix from fichiers,episodes where fichiers.ce = ep and type=\'S\' and episodes.ce=fichiers.ce) as prixStream, ';
	$requete .= '(select prix from fichiers,episodes where fichiers.ce = ep and type=\'L\' and episodes.ce=fichiers.ce) as prixLocation, ';
	$requete .= '(select prix from fichiers,episodes where fichiers.ce = ep and type=\'A\' and episodes.ce=fichiers.ce) as prixAchat ';
    $requete .= 'from episodes
             left join fichiers
             on fichiers.ce = episodes.ce
             join series
             on series.cs = episodes.cs
             where noms LIKE LOWER(\'%'.strtolower($psSerie).'%\')';

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

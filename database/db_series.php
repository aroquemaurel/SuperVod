<?php
    require_once('database/connect.php');
    require_once('util.php');
	function getAllSeries() {
        $return = array();
		$result = (mysql_query("select distinct noms, series.image, series.cs, types, max(saison) AS nb_saisons, count(numero) as nb_episodes
							from episodes, series
							where series.cs = episodes.cs
							group by types, noms
						"));
        while($object = mysql_fetch_object($result)) {
            $return[$object->cs] = $object;
        }

        return ($return);
    }
	function getAllAnneesDiffusion() {
        return fetch_all_objects(mysql_query('SELECT distinct annee FROM episodes'));
	}
	
	function searchSeries($psType, $psTitre, $piAnnee) {
		$bTitle = isset($psTitre);
		$bType = ($psType != 'NULL');
		$bAnnee = isset($piAnnee);
		$retour = array();
		$requete = 'SELECT distinct noms FROM series,episodes';
		$requete .= ' WHERE ';
		if(!($bTitle || $bType || $bAnnee)) {
			$requete.= '1 AND 1';
		}
		
		if($bTitle) {
			$requete .= ' noms LIKE \'%'.$psTitre.'%\' ';
		}
		/* TODO ajouter add type et année */
		if($bAnnee) {
			$requete .= 'AND episodes.cs = series.cs ';
			$requete .= ' AND annee = \''.$piAnnee.'\'';
		}		

		if($bType) {
			$requete .= ' AND types = \''.$psType.'\'';
		}


		$result = mysql_query($requete);
		while($serie = mysql_fetch_object($result)) {
			$retour[] = $serie;
		}
		return $retour;
	}

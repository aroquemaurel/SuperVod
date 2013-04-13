<?php
    require_once('database/connect.php');
    require_once('functions/util.php');

	function getAllSeriesComplete($psWhereClause='') {
        $return = array();
		$result = mysql_query("select distinct noms, series.image, series.cs, types, max(saison) AS nb_saisons, count(numero) as nb_episodes
							from episodes, series
							where series.cs = episodes.cs ".$psWhereClause."
							group by types, noms ");
        while($object = mysql_fetch_object($result)) {
            $return[$object->cs] = $object;
        }

        return ($return);
    }

	function getAllSeries() {
		return fetch_all_objects((mysql_query("select distinct noms, cs, types from series order by types")));
	}
	function getAllAnneesDiffusion() {
        return fetch_all_objects(mysql_query('SELECT distinct annee FROM episodes ORDER BY annee'));
	}
	
	function searchSeries($psType, $psTitre, $piAnnee) {
		$bTitle = isset($psTitre);
		$bType = ($psType != 'NULL');
		$bAnnee = isset($piAnnee) && $piAnnee != '';
        $requete = ' AND ';
		if($bTitle) {
			$requete .= ' noms LIKE \'%'.$psTitre.'%\' ';
		}

		if($bAnnee) {
			$requete .= 'AND episodes.cs = series.cs ';
			$requete .= ' AND annee = \''.$piAnnee.'\'';
		}		

		if($bType) {
			$requete .= ' AND types = \''.$psType.'\'';
		}

		return getAllSeriesComplete($requete);
	}

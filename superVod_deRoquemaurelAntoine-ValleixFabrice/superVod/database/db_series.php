<?php
    require_once('database/connect.php');
    require_once('functions/util.php');

	function getAllSeriesComplete($psWhereClause='') {
        $return = array();
		$result = mysql_query("select distinct noms, series.image, series.cs, types, max(saison) AS nb_saisons, count(numero) as nb_episodes
							from series
							left join episodes
							on series.cs = episodes.cs
							where (1 and 1 ".$psWhereClause.")
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
	
	function searchSeries($psType, $psTitre, $piAnnee, $paAges) {
		$bTitle = isset($psTitre);
		$bType = ($psType != 'NULL');
		$bAnnee = isset($piAnnee) && $piAnnee != '';
        $requete = ' and ';
		if($bTitle) {
			$requete .= ' noms LIKE LOWER(\'%'.strtolower($psTitre).'%\') ';
		}

		if($bAnnee) {
			$requete .= 'AND episodes.cs = series.cs ';
			$requete .= ' AND annee = \''.$piAnnee.'\'';
		}		

		if($bType) {
			$requete .= ' AND types = \''.$psType.'\'';
		}
        $whereType  = '';
        $nbAge = 0;
        foreach($paAges as $age) {
            if($age != 'N/A') {
                $whereType .= ' AND ';
                $whereType .= ' lim <> \''.$age.'\'';
                ++$nbAge;
            }
        }
        if($nbAge != 5) { //si rien n'est coché, on ne filtre pas
            $requete .= $whereType;
        }

		return getAllSeriesComplete($requete);
	}

    function ajouterSerie($psNoms,$psTypes,$psImage) {
        return(mysql_query("INSERT INTO series(noms,types,image) VALUES('$psNoms','$psTypes','$psImage')"));
    }

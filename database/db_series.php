<?php
    require_once('database/connect.php');
    require_once('util.php');
	function getAllSeries() {
		$result = (mysql_query("select distinct noms, series.image, series.cs, types, max(saison) AS nb_saisons, count(numero) as nb_episodes
							from episodes, series
							where series.cs = episodes.cs
							group by noms
						"));

        return fetch_all_objects($result);
    }
	function getAllAnneesDiffusion() {
        return fetch_all_objects(mysql_query('SELECT distinct annee FROM episodes'));
	}
	
	function searchSeries($psType, $psTitre, $piAnnee) {
		$bTitle = isset($psTitre);
		$bType = $psType == 'NULL';
		$bAnnee = isset($piAnnee);
		$retour = array();
		$requete = 'SELECT distinct noms FROM series';
		if($bTitle || $bType || $bAnnee) {
			$requete .= ' WHERE ';
		}
		
		if($bTitle) {
			$requete .= ' noms LIKE \'%'.$psTitre.'%\' ';
		}
		$result = mysql_query($requete);
		while($serie = mysql_fetch_object($result)) {
			$retour[] = $serie;
		}
		/* TODO ajouter add type et année */
		
		return $retour;
	}
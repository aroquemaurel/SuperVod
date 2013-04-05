<?php
	function getAllSeries() {
		return(mysql_query("select distinct noms, types, max(saison) AS nb_saisons, count(numero) as nb_episodes
							from episodes, series
							where series.cs = episodes.cs 
							group by noms
						"));
	}
	
	function getNbSaisons($piIdSerie) {
	/*	return(mysql_query('select max(saison) 
							from series,episodes 
							where series.cs = '.$piIdSerie.' 
								AND series.cs = episodes.cs 
							group by saison'));*/
	}
	
	function getNbTotalEpisodes() {
		//return(mysql_fetch_object(mysql_query("select * from series")));
	}
	
	function getAllAnneesDiffusion() {
		$retour = array();
		$result =mysql_query('SELECT distinct annee FROM `episodes` WHERE 1');
		while($annee = mysql_fetch_object($result)) {
			$retour[] = $annee;
		}

		return $retour;
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
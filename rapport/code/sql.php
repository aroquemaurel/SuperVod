<?php
function searchEpisodes($psSerie, $piAnnee, $piSaison, $piPrix, $paType) {
	$return = array();
	$whereType  = '';
	$bAnnee = isset($piAnnee) && $piAnnee != '';
	/* construction de la requête */
	$requete  = 'select distinct series.cs, episodes.ce as ep, titre, saison, numero, annee, realisateur, ';
	$requete .= 'de,lim,episodes.image as epImage, series.image as seImage, ';
	// selection du prix des fichiers 
	$requete .= '(select prix from fichiers,episodes where fichiers.ce = ep and type=\'S\' and episodes.ce=fichiers.ce) as prixStream, ';
	$requete .= '(select prix from fichiers,episodes where fichiers.ce = ep and type=\'L\' and episodes.ce=fichiers.ce) as prixLocation, ';
	$requete .= '(select prix from fichiers,episodes where fichiers.ce = ep and type=\'A\' and episodes.ce=fichiers.ce) as prixAchat ';
	// jointures
	$requete .= 'from episodes left join fichiers on fichiers.ce = episodes.ce 
		join series on series.cs = episodes.cs';
	// Recherche du nom
	$requete .='where noms LIKE LOWER(\'%'.strtolower($psSerie).'%\')';
	/* en fonction de ce qu'a rentré l'utilisateur, on ajoute les différents critères */
	if($bAnnee) {
		$requete .= ' AND annee = \''.$piAnnee.'\'';
	}
	$nbType = 0;
	foreach($paType as $type) {
		if($type) {
			$whereType .= ' AND fichiers.type <> \''.$type.'\''; // Les types d'achat possibles
			++$nbType;
		}
	}

	if($nbType != 3) //si rien n'est coché, on ne filtre pas
		$requete .= $whereType;

	if($piSaison != '')
		$requete .= ' AND saison=\''.$piSaison.'\'';

	if($piPrix != '')
		$requete .= ' AND prix<'.$piPrix.'';
	$result = mysql_query($requete) or die(mysql_error()); // on execute la requete
	while($object = mysql_fetch_object($result)) { 
		$return[$object->cs][] = $object; // on met tout dans un tableau
	}

	return $return; 
}

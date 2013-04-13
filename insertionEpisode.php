<?php
	include_once('vues/header.php');
	require_once('database/connect.php');
    require_once('database/db_episodes.php');

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

	if(isset($_POST['image'])) {
		$image=$_POST['image'];
    } else {
        $image="";
    }


if(empty($_POST['titre'])|| $_POST['serie']=='NULL' || empty($_POST['numero']) || empty($_POST['saison'])) { 
        echo '<div class="alert alert-error">';
			echo '<strong>Erreur</strong>  le champs titre,serie, numero et saison  ne peuvent être vide !</strong>';
		echo '</div>';
	} else {
			if(insertionEpisode($titre, $serie, $numero, $annee, $saison, $realisateur, $duree, $lim, $image)) {
            echo '<div class="alert alert-success"><strong>Succès</strong> L\'épisode à bien été ajouté</div>';
                redirection('index.php');
            } else {
			die('Erreur SQL !'.$sql.'<br>'.mysql_error());
        }
	}	
?>	

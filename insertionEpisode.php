<?php
	include_once('vues/header.php');
	require_once('database/connect.php');
	if(isset($_POST['titre']))
		$titre=$_POST['titre'];
	
	if($_POST['serie'] != 'NULL') {
		$serie=$_POST['serie'];
	}

	if(isset($_POST['numero']))
		$numero=$_POST['numero'];

	if(isset($_POST['annee']))
		$annee=$_POST['annee'];

	if(isset($_POST['saison']))
		$saison=$_POST['saison'];

	if(isset($_POST['realisateur']))
		$realisateur=$_POST['realisateur'];

	if(isset($_POST['duree']))
		$duree=$_POST['duree'];

	if(isset($_POST['lim']))
		$lim=$_POST['lim'];

	if(isset($_POST['image']))
		$image=$_POST['image'];
	else $image="";


if(empty($_POST['titre'])|| $_POST['serie']=='NULL' || empty($_POST['numero']) || empty($_POST['saison'])) { 
        echo '<div class="alert alert-error">';
			echo '<font color="red">Attention,  le champs titre,serie, numero et saison  ne peuvent être vide !</font><br>'; 
		echo '</div>';
	} else {
		// on écrit la requête sql 
		$sql = "INSERT INTO episodes(ce,titre,cs,numero,annee,saison,realisateur,de,lim,image) 
				VALUES('','$titre','$serie','$numero','$annee','$saison','$realisateur','$duree','$lim','$image')"; 
     
		// on insère les informations du formulaire dans la table 
		$result=mysql_query($sql) ;
		if($result)
			echo 'Vos infos on été ajoutées.'; 
		else
			die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
	}	
?>	

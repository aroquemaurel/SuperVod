<?php
	include_once('vues/header.php');
	require_once('database/connect.php');
	
	
	if(isset($_POST['noms']))
		$noms=$_POST['noms'];


	if(isset($_POST['type']))
		$type=$_POST['type'];

	if(isset($_POST['image']))
		$image=$_POST['image'];
	else $image="";


if(empty($_POST['noms'])) 
{
 echo '<div class="alert alert-error">';

 echo '<font color="red">Attention,  le champs nom ne peut etre vide !</font><br>';
echo '</div>';

    } else{
    // on écrit la requête sql 
    $sql = "INSERT INTO series(cs,noms,types,image) VALUES('','$noms','$type','$image')"; 
     
    // on insère les informations du formulaire dans la table 
    $result=mysql_query($sql) ;
	


    // on affiche le résultat pour le visiteur 
    if($result)
		echo 'Vos infos on été ajoutées.'; 
	else
		die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
	}	
?>	

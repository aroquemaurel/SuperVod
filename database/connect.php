<?php
	define('DB_USER', 'root');
	define('DB_MDP', 'a08d11r91$');
	define('DB_DB', 'superVod');
	define('DB_HOST', 'localhost');
	
	$connexion = mysql_pconnect(DB_HOST, DB_USER,DB_MDP);
	if(!$connexion) {
		echo 'Erreur de connexion à '.DB_HOST;
		exit;
	}
	if(!mysql_select_db(DB_DB, $connexion)) {
		echo 'Accès à la base de données '.DB_DB.' impossible';
		exit;
	}		
	
?>
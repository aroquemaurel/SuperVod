﻿<?php
	function conversionType($pcType) {
		$sRetour ='';
		switch($pcType) {
			case 'A':
				$sRetour = 'Animé';
			break;
			case 'F':
				$sRetour = 'Fiction';
			break;
			case 'P':
				$sRetour = 'Policier';
			break;
			default:
				echo "Fonction conversionType: Erreur cas default du switch";
		}
		
		return $sRetour;
	}
	
?>
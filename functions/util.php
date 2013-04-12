<?php
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
			case 'N':
				$sRetour = 'Indifférent';
			break;
			default:
				echo "Fonction conversionType: Erreur cas default du switch";
		}
		
		return $sRetour;
	}

    function fetch_all_objects($poResult) {
        while($object = mysql_fetch_object($poResult)) {
            $return[] = $object;
        }

        return $return;
    }

    function redirection($psUrl, $piTime=2000) {
        echo '
        <script type="text/javascript">
            window.setTimeout("location=(\''.$psUrl.'\');",'.$piTime.')
        </script>

        ';
    }
?>

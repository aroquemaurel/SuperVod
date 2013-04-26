<?php
function uploaderImage($files) {
	if($files['error'] > 0) {
		// TODO erreur
	}
	if($files['size'] > 500000) {
		// TODO erreur
	}
	$extValides = array('jpg', 'jpeg', 'gif', 'png'); 
	$extUpload = strtolower(substr(strrchr($files['name'], '.'), 1));
	if(!in_array($extUpload, $extValides)) {
		// TODO erreur
		exit();
	}

	$fileName = md5(uniqid(rand(), true));
	$fileName = substr($fileName, -5);
	$fileName = 'images/'.$fileName.'.'.$extUpload;
	if(!move_uploaded_file($files['tmp_name'], $fileName)) {
		echo "beeeuurrk";
		// TODO erreur
	}

	return $fileName;
}

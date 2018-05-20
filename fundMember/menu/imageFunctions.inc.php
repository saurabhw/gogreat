<?php


// is_image function tests tp see of the uploaded file is an image type
function is_image($path){
	$a = getimagesize($path);
	$image_type = $a[2];
	if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP))){
		return true;
	}
		return false;
}// end is_image()

// Remove empty spaces from file name
function checkName($name){
	$nospaces = str_replace(' ','_',$name);
	$nospaces = str_replace("'", "", $nospaces); 
	$file = mb_ereg_replace("([\.]{2,})", '', $nospaces);
	$file = stripslashes($file);
	return $file;
}// end checkName()

function three(){
}

?>
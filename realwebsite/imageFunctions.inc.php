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
	return $nospaces;
}// end checkName()

function three(){
}

?>
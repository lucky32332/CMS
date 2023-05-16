<?php
session_start();

if( isset($_SESSION['loged']) && $_SESSION['loged'] ){
    //
}else{
    header('Location: /index.php');
}
define("ADMIN", true);
require_once '../includes/functions.php';
require_once '../includes/db.php';
require_once '../classes/page.php';
require_once '../classes/blog.php';
$success = 0;
$errors = 0;
//$extAllowed = array();	//
$extAllowed = array('jpg', 'jpeg', 'png');
$maxAllowedFileSize = -1;	//$maxAllowedFileSize = 500000;		//500000 bits
$extensionError = false;
$maxAllowedFileSizeError = false;
$target_dir = "../user/blog_images";
$base_target_dir = "../user/blog_images";
if( isset($_REQUEST['submited']) && $_REQUEST['submited'] == 3 ){
	if (!file_exists($target_dir)) {
		mkdir($target_dir, 0777, true);
	}
	if( !empty($_FILES) ){
		foreach($_FILES['fileToUpload']['name'] as $i => $name){
			// now $name holds the original file name
			$tmp_name = $_FILES['fileToUpload']['tmp_name'][$i];
			$error = $_FILES['fileToUpload']['error'][$i];
			$size = $_FILES['fileToUpload']['size'][$i];
			$type = $_FILES['fileToUpload']['type'][$i];

			if($error === UPLOAD_ERR_OK){
				$extension = strtolower(pathinfo($name,PATHINFO_EXTENSION));
//print_r($extension);die;
				if( !empty($extAllowed) && ! in_array(strtolower($extension), $extAllowed) ){
					// Error, invalid extension detected
					$extensionError = true;
				}else if ( $maxAllowedFileSize > 0 && $size > $maxAllowedFileSize ){
					// Error, file too large
					$maxAllowedFileSizeError = true;
				}else{
					// No errors
					$newFileName = $target_dir . "/" . basename($name);
					if(move_uploaded_file($tmp_name, $newFileName)){
						$success++;
					}else{
						$errors++;
					}
				}
			}
		}
	}
}
$files = getFiles();
include_once 'views/media-html.php';
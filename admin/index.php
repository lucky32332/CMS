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


include_once 'views/index-html.php';

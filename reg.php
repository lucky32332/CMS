<?php

session_start();
define("CMS", true);

if( isset($_SESSION['loged']) && $_SESSION['loged'] ){
    $loged = true;
}else{
    $loged = false;
}
$formerror = false;
$rformerror = false;
require_once 'includes/functions.php';
if( isset($_REQUEST['register']) && $_REQUEST['register'] == 1 && !$loged ){
    //register new user
    require_once 'includes/db.php';
    $csrf = cleanInput($_REQUEST['csrf_token']);
    $csrf = mysqli_real_escape_string($conn, $csrf);
    if( $_SESSION['csrf_token'] != $csrf ){
        die("Not found!");
    }
    $pass = cleanInput($_REQUEST['register_password']);
    $pass = mysqli_real_escape_string($conn, $pass);
    $pass2 = cleanInput($_REQUEST['register_password2']);
    $pass2 = mysqli_real_escape_string($conn, $pass2);
    $email = cleanInput($_REQUEST['register_email']);
    $email = mysqli_real_escape_string($conn, $email);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    $name = cleanInput($_REQUEST['register_name']);
    $name = mysqli_real_escape_string($conn, $name);
    $family = cleanInput($_REQUEST['register_family']);
    $family = mysqli_real_escape_string($conn, $family);
    
   

    if( !empty($email)  //not empty email
            && !empty($pass) 
            && !empty($pass2) 
            && !empty($name) 
            && !empty($family) 
            && $pass == $pass2 ){

        $pass3 = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`(`name`, `family`, `email`, `password`) 
                            VALUES ('$name','$family','$email','$pass3')";
        $result = mysqli_query($conn, $sql);
        if( empty($result) ){
            $rformerror = true;
        }
    }
}
require_once 'views/register-html.php';
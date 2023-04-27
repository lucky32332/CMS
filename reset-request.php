<?php
session_start();
define("CMS", true);
// error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);


if (isset($_SESSION['loged']) && $_SESSION['loged']) {
    $loged = true;
} else {
    $loged = false;
}
$formerror = false;
require_once 'includes/db.php';
 if (isset($_REQUEST["forgoten-pass"]) == 1 ) {
   
   $userEmail = cleanInput($_REQUEST['email']);
    $userEmail = mysqli_real_escape_string($conn, $userEmail);

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "www.cms.net/create-new-password.php?selector". $selector . "&validator" . bin2hex($token);

    $expires = date("U") + 1800;



  

    $sql = "DELETE from pwdreset WHERE pwdResetEmail = '$userEmail'";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "There was an a error";
      exit();

    }else{
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);

    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);


    $to = $userEmail;

    $subject = 'Reset your password for cms';

    $message = "<p> We received a password reset request. The link to reset your password make this request, you can ignore yhis email</p>";

    $message .= "<p> Here is your password reset link!</p> </br>";

    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $headers = "From:  cms <lucky32332@gmail.com>\r\n";
    $headers .= "Reply To:  cms lucky32332@gmail.com\r\n";
    $headers .= "Content-Type text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: fogotenpass-html.php?reset=success");

 }
 else {
    header("Location: index.php");
 }
 
 require_once 'views/fogotenpass-html.php';
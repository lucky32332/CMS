<?php
session_start();
define("CMS", true);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
if( isset($_SESSION['wrong_logins']) && $_SESSION['wrong_logins'] > 5 ){
die("Server error 500");
}

if (isset($_SESSION['loged']) && $_SESSION['loged']) {
    $loged = true;
} else {
    $loged = false;
}
$formerror = false;


require_once 'includes/functions.php';
require_once 'includes/db.php';
require_once 'classes/user.php';

if (isset($_REQUEST['login']) && $_REQUEST['login'] == 1 && !$loged) {
    //login
    $csrf = cleanInput($_REQUEST['csrf_token']);
    $csrf = mysqli_real_escape_string($conn, $csrf);
    if ($_SESSION['csrf_token'] != $csrf) {
        incrementWrongLogins();
        die("Not found!");
    }
    $pass = cleanInput($_REQUEST['password']);
    $pass = mysqli_real_escape_string($conn, $pass);
    $email = cleanInput($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!empty($email) && !empty($pass)) {
        //check for valid user
        $sql = "SELECT id, name, family, email, password, admin FROM `users` WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!empty($result)) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            if (password_verify($pass, $data[0]['password'])) {
                $loged = true;
                $_SESSION['user']['id'] = $data[0]['id'];
                $_SESSION['user']['name'] = $data[0]['name'];
                $_SESSION['user']['family'] = $data[0]['family'];
                $_SESSION['user']['email'] = $data[0]['email'];
                $_SESSION['user']['admin'] = $data[0]['admin'];
            } else {
                $formerror = true;
                incrementWrongLogins();
            }
        } else {
            die('Query error');
        }
    } else {
        $formerror = true;
    }
}

$_SESSION['loged'] = $loged;
$_SESSION['csrf_token'] = createCsrfToken();
if ($formerror) {
echo '<script>alert("Error on login!")</script>';
}
if (!$loged) {
    require_once 'views/login-html.php';
} else {
    if ($_SESSION['user']['admin'] == 1) {
        header('Location: admin/index.php');
    } else {
        if ($_SESSION['user']['user'] == 0) {
            header('Location: user/index.php');
        }
    }
}
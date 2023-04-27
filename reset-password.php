<?php
session_start();
define("CMS", true);

if (isset($_SESSION['loged']) && $_SESSION['loged']) {
    $loged = true;
} else {
    $loged = false;
}
$formerror = false;
$rformerror = false;
require_once 'includes/functions.php';
if (isset($_POST["reset-password-submit"])) {

    $csrf = cleanInput($_REQUEST['csrf_token']);
    $csrf = mysqli_real_escape_string($conn, $csrf);
    if ($_SESSION['csrf_token'] != $csrf) {
        die("Not found!");
    }

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: views/create-new-password-html.php?newpwd=empty");
        exit();
    } else if (empty($password) || empty($passwordRepeat)) {
        header("Location: views/create-new-password-html.php?newpwd=pwdnotsame");
        exit();
    }

    $currentDate = date("U");

    require_once 'includes/db.php';

    $sql = "SELECT * from pwdreset WHERE pwdResetSelector AND pwdResetExpires ";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $conn)) {
        echo "There was an error";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $selector);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo " You need to re-submit your request";
            exit();
        } else {

            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenCheck == false) {
                echo " You need to re-submit your request";
                exit();
            } elseif ($tokenCheck === true) {

                $tokenEmail = $row["pwdRestEmail"];

                $sql = "SELECT * from users where email;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $conn)) {
                    echo "There was an error";
                    exit();
                }
            } else {
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (!$row = mysqli_fetch_assoc($result)) {
                    echo " You need to re-submit your request";
                    exit();
                } else {
                    $sql = "UPDATE users SET `password=?` WHERE `email=?`";
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo " You need to re-submit your request";
                        exit();
                    } else {
                        $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ss", $tokenEmail);
                        mysqli_stmt_execute($stmt);

                        $sql = "DELETE from pwdresret WHERE pwdResetEmail=?";

                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an a error";
                            exit();

                        }else {
                            mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            header("Location: login.php?newpwd=passwordupdate");
                        }


                    }
                }
            }
        }
    }
} else {
    header("Location: index.php");
 }
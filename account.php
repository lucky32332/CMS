<?php
// error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

session_start();
if (isset($_SESSION['loged']) && $_SESSION['loged']) {
  //
} else {
  header('Location: /account.php');
}
define("USER", true);
require_once '../includes/functions.php';
require_once '../includes/db.php';
require_once '../classes/profile.php';
$formerror = false;
$rformerror = false;


if (isset($_REQUEST['edit-form']) && $_REQUEST['edit-form']) {
  require_once '../includes/functions.php';
  require_once '../includes/db.php';
  $csrf = cleanInput($_REQUEST['csrf_token']);
  $csrf = mysqli_real_escape_string($conn, $csrf);
  if ($_SESSION['csrf_token'] != $csrf) {
    die("Not found!");
  }
  $id = cleanInput($_REQUEST['id']);
  $id = mysqli_real_escape_string($conn, $id);

  $name = cleanInput($_REQUEST['name']);
  $name = mysqli_real_escape_string($conn, $name);

  $family = cleanInput($_REQUEST['family']);
  $family = mysqli_real_escape_string($conn, $family);

  $username = cleanInput($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);

  $email = cleanInput($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);

  $password = cleanInput($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);

  $password2 = cleanInput($_REQUEST['password2']);
  $password2 = mysqli_real_escape_string($conn, $password2);

  $img_name = cleanInput($_REQUEST['my_image']);
  $img_name = mysqli_real_escape_string($conn, $password2);

  if (isset($_FILES['my_image'])) {
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];
    // $folder = "./image/" . $filename;
    if ($error === 0) {
      if ($img_size > 12500000) {
        $em = "Sorry your file is too large";
        header('Location: account.php?error=$em');
      } else {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);


        $allowed_exs = array("jpg", "jpeg", "png");

        if (in_array($img_ex_lc, $allowed_exs)) {
          $new_img_name = uniqid("", true) . '.' . $img_ex_lc;
          $img_upload_path = './uploads/' . $new_img_name;

          //Instered Data
         
          $sql = "UPDATE `users` SET `image`='$new_img_name' WHERE id='$id'; ";
          mysqli_query($conn, $sql);

          if (move_uploaded_file($tmp_name, $img_upload_path)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
          header("Location: account.php?profile_updated=1");
        } else {
          $em = "You cant't upload files of this type!";
          header("Location: account.php?error=$em");
        }
      }
    } else {
      $em = "unknown error occured!";
      header("Location: account.php?error=$em");

    }

  } else {
    header('Location: account.php');
  }





  if (
    !empty($email) //not empty email
    && !empty($password)
    && !empty($password2)
    && !empty($name)
    && !empty($family)
    && $password == $password2
  ) {
    $pass3 = password_hash($password, PASSWORD_DEFAULT);
    $result = mysqli_query($conn, "UPDATE users SET `name`='$name', `family`='$family', `username`='$username',`email`='$email',`password`='$pass3' WHERE id='$id';");
    if ($result) {
      header("location:account.php?profile_updated=1");
    } else {
      $error[] = 'Something went wrong';
    }

  }
}





if (isset($error)) {

  foreach ($error as $error) {
    echo '<p class="errmsg">' . $error . '</p>';
  }
} else if (isset($_REQUEST['id'])) {
  $id = cleanInput($_REQUEST['id']);
  $id = mysqli_real_escape_string($conn, $id);
  if ($id > 0) {

    $rows = new Profile($id);
    include_once 'views/profile-html.php';
  }
} else {
  $rows = getUserId( $_SESSION['user']['id']);
  include_once 'views/account-html.php';
}



//Форма за път 

// if (isset($_GET['action']  ) && $_GET['action'] == 'edit' ) {
// }else if (isset($_GET['action']  ) && $_GET['action'] == 'changepassword' ){


//  }else {
//    $pages = getProfile();
//   include_once 'views/account-html.php';
// }

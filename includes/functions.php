<?php
function echoHr()
{
    echo "<hr>";
}
function printNumbers($numbers = array())
{
    if (!empty($numbers)) {
        foreach ($numbers as $col) {
            echo implode(', ', $col) . "\r\n";
        }
    }
}
function messageNumbers($numbers = array())
{
    $result = '';
    if (!empty($numbers)) {
        foreach ($numbers as $col) {
            $result .= implode(', ', $col) . "\r\n";
        }
    }
    return $result;
}

function sendMail($to, $message, $from = 'info@mysite.com', $subject = 'тото комбинации')
{
    //$to = $email;
    //$from = 'info@mysite.com';
    //$subject = 'тото комбинации';
    $message = wordwrap($message, 70, "\r\n");
    $headers = 'From:' . trim($from) . "\n";
    $headers .= 'Reply-To:' . trim($from) . "\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\n";
    @mail($to, $subject, $message, $headers);
}

function cleanInput($data)
{ //функция, която връща подадените данни без риск
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function createCsrfToken()
{
    $result = '';
    $result = md5('gf765sd' . time() . '2*345@#');
    return $result;
}

function incrementWrongLogins()
{
    if (!isset($_SESSION['wrong_logins'])) {
        $_SESSION['wrong_logins'] = 0;
    }
    $_SESSION['wrong_logins']++;
}
function getPages($id = 0)
{
    $res = array();
    $sql_req = "";
    if ($id > 0) {
        $sql_req = " AND id={$id} ";
    }
    if (empty($GLOBALS['SQL'])) {
        require_once 'db.php';
    } else {
        $conn = $GLOBALS['SQL'];
    }
    $sql = "SELECT * FROM `pages` WHERE 1=1 " . $sql_req . " ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    if (!empty($result)) {
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if ($id > 0) {
            $res = $res[0];
        }
    } else {
        die('Query error');
    }
    return $res;
}

function getProfile($id = 0)
{
    $res = array();
    $sql_req = "";
    if ($id > 0) {
        $sql_req = " AND id={$id} ";
    }
    if (empty($GLOBALS['SQL'])) {
        require_once 'db.php';
    } else {
        $conn = $GLOBALS['SQL'];
    }
    $sql = "SELECT * FROM `profile` WHERE 1=1 " . $sql_req . " ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    if (!empty($result)) {
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if ($id > 0) {
            $res = $res[0];
        }
    } else {
        die('Query error');
    }
    return $res;
}

function getBlog($id = 0)
{
    $res = array();
    $sql_req = "";
    if ($id > 0) {
        $sql_req = " AND id={$id} ";
    }
    if (empty($GLOBALS['SQL'])) {
        require_once 'db.php';
    } else {
        $conn = $GLOBALS['SQL'];
    }
    $sql = "SELECT * FROM `blog` WHERE 1=1 " . $sql_req . " ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    if (!empty($result)) {
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if ($id > 0) {
            $res = $res[0];
        }
    } else {
        die('Query error');
    }
    return $res;
}
function getUserId($id = 0)
{
    $res = array();
    $sql_req = "";
    if ($id > 0) {
        $sql_req = " AND id={$id} ";
    }
    if (empty($GLOBALS['SQL'])) {
        require_once 'db.php';
    } else {
        $conn = $GLOBALS['SQL'];
    }
    $sql = "SELECT `id`, `name`, `family`, `username`, `email`, `image` FROM `users` WHERE 1=1 " . $sql_req . " ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    if (!empty($result)) {
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);

    } else {
        die('Query error');
    }
    return $res;
}
function getFiles($path = "../user/blog_images")
{
    $path = str_replace("/", "\\", $path);
    $res = array();
    $res = array_diff(scandir($path), array('.', '..'));
    return $res;
}
function checkUsername($username)
{
    require_once 'db.php';
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    
        if (!empty($username)) {
            $username_query = $conn->prepare("SELECT * FROM users WHERE username;");
            $username_query->bind_param("s", $username);
            $username_query->execute();
            $count = $username_query->num_rows;
            if ($count == 0) {
                echo "Username doesn't exist";
                exit;
            } else {
                echo "Username already exists";
                exit;
            }
        }
    }
}

function checkEmail($emal)
{
    require_once 'db.php';
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    
        if (!empty($username)) {
            $email_query = $conn->prepare("SELECT * FROM users WHERE email;");
            $email->bind_param("s", $email);
            $email->execute();
            $count = $$email_query->num_rows;
            if ($count == 0) {
                echo "Email doesn't exist";
                exit;
            } else {
                echo "Email already exists";
                exit;
            }
        }
    }
}

function get_message(){
    if (isset($_SESSION['message'])) :
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        
     <?php unset($_SESSION['message']);
    endif;
    
}


    











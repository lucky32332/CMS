<?php
$dbhost = "localhost";	//$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "";
$db = "cms";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$GLOBALS['SQL'] = $conn;
mysqli_set_charset($conn, "utf8");

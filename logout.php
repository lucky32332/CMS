<?php
session_start();
define("CMS", true);
require_once 'views/logout-html.php';
if (session_destroy()) {
    // Redirecting To Home Page
    header("Location: index.php");
}
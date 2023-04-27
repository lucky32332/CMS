<?php
session_start();
define("CMS", true);
//echo "CMS is ready";
require_once 'includes/functions.php';
require_once 'includes/db.php';
$page = new Page(1);
include_once 'views/index-html.php';
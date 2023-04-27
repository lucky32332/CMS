<?php
session_start();
define("CMS", true);
require_once 'includes/functions.php';
require_once 'includes/db.php';
require_once 'classes/page.php';
$page = new Page(4);
require_once 'views/services-html.php';
<?php
session_start();
define("USER", true);
//echo "CMS is ready";
require_once '../includes/functions.php';
require_once '../includes/db.php';

// require_once 'classes/user.php';
// load user with id=1 and load his data
//$u = new User(1);
//print_r($u);die;

// create new user and save his data to database
/*
$u = new User('', 'Dan', 'Danov', 'dan@asd.rr', 0, '123');
$u->insert();
print_r($u);die;
*/

// load user with id=1 and delete him from database
// $u = new User(6);
// $u->delete();
// exit('END');

// load user with id=5, change family and save his data to database
// $u = new User(5);
// $u->family = "Fam--";
// $u->update();
// print_r($u);die;

//require_once 'classes/page.php';
// $p1 = new Page(1);
// $p2 = new Page();
// $p2->userId = 2;
// $p2->title = $p1->title;
// $p2->subtitle = $p1->subtitle;
// $p2->text = "sgdsf drtyhur rtuyry";
// $p2->update();

// $p3 = new Page(3);
// $p3->delete();
// print_r($p3);die;

// require_once 'classes/blog.php';
// $b1 = new Blog();
// $b1->categoryId = 1;
// $b1->userId = 1;
// $b1->title = "Blog 1";
// $b1->subtitle = "Blog 1 Subtitle";
// $b1->text = "Blog 1 Text";
// $b1->update();
// print_r($b1);die;


include_once 'views/index-html.php';
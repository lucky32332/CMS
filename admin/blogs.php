<?php
// error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

session_start();
if (isset($_SESSION['loged']) && $_SESSION['loged']) {
    //
} else {
    header('Location: /index.php');
}
define("ADMIN", true);

require_once '../includes/functions.php';
require_once '../includes/db.php';
require_once '../classes/blog.php';




if (isset($_REQUEST['edit-submited']) && $_REQUEST['edit-submited'] == 2) {

    $ids = cleanInput($_REQUEST['ids']);
    $ids = mysqli_real_escape_string($conn, $ids);


    $titles = cleanInput($_REQUEST['titles']);
    $titles = mysqli_real_escape_string($conn, $titles);

    $subtitles = cleanInput($_REQUEST['subtitles']);
    $subtitles = mysqli_real_escape_string($conn, $subtitles);

    $usernames = cleanInput($_REQUEST['usernames']);
    $usernames = mysqli_real_escape_string($conn, $usernames);

    $images = cleanInput($_REQUEST['images']);
    $images = mysqli_real_escape_string($conn, $images);

    $texts = cleanInput($_REQUEST['texts']);
    $texts = mysqli_real_escape_string($conn, $texts);

    $blog = new Blog($ids);
    $blog->titles = $titles;
    $blog->subtitles = $subtitles;
    $blog->usernames = $usernames;
    $blog->images = $images;
    $blog->texts = $texts;
    if (!empty($blog->titles)) {
		$blog->userIds = $_SESSION['user']['id'];
        $blog->update();
        $blogs = getBlog();
        include_once 'views/blogs-html.php';
    } else {
        include_once 'views/blogs-edit-html.php';
    }


} else if (isset($_REQUEST['id'])) {
    $ids = cleanInput($_REQUEST['id']);
    $ids = mysqli_real_escape_string($conn, $ids);
    if ($ids > 0) {
        //$page = getPages($id);
        $blog = new Blog($ids);
        include_once 'views/blogs-edit-html.php';
    }
   
} else if (isset($_REQUEST['blog_create']) && $_REQUEST['blog_create'] == 4) {
    include_once 'views/blogs-addposts-html.php';
} else if (isset($_REQUEST['blog_create']) && $_REQUEST['blog_create'] == 3) {





    $titles = cleanInput($_REQUEST['titles']);
    $titles = mysqli_real_escape_string($conn, $titles);

    $subtitles = cleanInput($_REQUEST['subtitles']);
    $subtitles = mysqli_real_escape_string($conn, $subtitles);

    $usernames = cleanInput($_REQUEST['usernames']);
    $usernames = mysqli_real_escape_string($conn, $usernames);

    $images = cleanInput($_REQUEST['images']);
    $images = mysqli_real_escape_string($conn, $images);

    $texts = cleanInput($_REQUEST['texts']);
    $texts = mysqli_real_escape_string($conn, $texts);

    $blog = new Blog();
    $blog->titles = $titles;
    $blog->subtitles = $subtitles;
    $blog->usernames = $usernames;
    $blog->images = $images;
    $blog->texts = $texts;
    if (!empty($blog->titles)) {
        $blog->ids = NULL;
        $blog->userIds = $_SESSION['user']['id'];
        
        $blog->insert();
       
        $blogs = getBlog();

        include_once 'views/blogs-html.php';
    } else {
        include_once 'views/blogs-addposts-html.php';
    }
}

 else {
    $blogs = getBlog();
    include_once 'views/blogs-html.php';
}
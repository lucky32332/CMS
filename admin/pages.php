<?php
session_start();
if( isset($_SESSION['loged']) && $_SESSION['loged'] ){
    //
}else{
    header('Location: /index.php');
}
define("ADMIN", true);
require_once '../includes/functions.php';
require_once '../includes/db.php';
require_once '../classes/page.php';



if( isset($_REQUEST['submited']) && $_REQUEST['submited'] == 2 ){
    $id = cleanInput($_REQUEST['id']);
    $id = mysqli_real_escape_string($conn, $id);
    if( $id > 0 ){
        $title = cleanInput($_REQUEST['title']);
        $title = mysqli_real_escape_string($conn, $title);
        $subtitle = cleanInput($_REQUEST['subtitle']);
        $subtitle = mysqli_real_escape_string($conn, $subtitle);
        $image = cleanInput($_REQUEST['image']);
        $image = mysqli_real_escape_string($conn, $image);
        $text = cleanInput($_REQUEST['text']);
        $text = mysqli_real_escape_string($conn, $text);

        $page = new Page($id);
        $page->title = $title;
        $page->subtitle = $subtitle;
        $page->image = $image;
        $page->text = $text;
        if( !empty($page->title) ){
            $page->update();
            $pages = getPages();
            include_once 'views/pages-html.php';
        }else{
            include_once 'views/page-edit-html.php';
        }
    }

}else if( isset($_REQUEST['id']) ){
    $id = cleanInput($_REQUEST['id']);
    $id = mysqli_real_escape_string($conn, $id);
    if( $id > 0 ){
        //$page = getPages($id);
        $page = new Page($id);
        include_once 'views/page-edit-html.php';
    }
}else{
    $pages = getPages();
    include_once 'views/pages-html.php';
}
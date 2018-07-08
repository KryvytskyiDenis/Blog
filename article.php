<?php
    session_start();
    require_once("db.php");
    require_once("model/articles.php");
    require_once("model/comments.php");

    $link = db_connection();
    $article_id = $_GET['id'];
    $article = article_get($link, $article_id);
    $comments = comments_all($link, $article_id);
    $link_to_sections = "view/";
    $path_to_images = "";

    if(!empty($_SESSION['login'])){
        $username = $_SESSION['login'];
    } else {
        $username = "";
    }

    include("view/article.php");
?>
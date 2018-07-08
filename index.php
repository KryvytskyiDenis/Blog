<?php
    session_start();
    require_once("db.php");
    require_once("model/articles.php");
    require_once("model/sections.php");

    $link = db_connection();
    $articles = articles_all($link);
    $sections = sections_all($link);
    $admin_link = "admin";
    $link_to_sections = "view/";

    include("view/articles.php");
?>

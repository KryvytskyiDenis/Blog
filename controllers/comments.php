<?php
    session_start ();

    require_once("../db.php");
    require_once("../model/comments.php");

    $link = db_connection();
    $user_id = $_SESSION['id'];

    if(isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = "";
    }

    if(isset($_GET['article_id'])){
        $article_id = $_GET['article_id'];
    }

    // Добавляем комментарий, если action=add
    if($action == "add"){
        if(!empty($_POST)){
            $article_date = date("Y-m-d");
            comment_new($link, $_POST['title'], $_POST['content'], $article_date, $user_id, $article_id);
            header("Location: ../article.php?id=$article_id");
        }

        include("../view/article.php?id=$article_id");
    } else if($action == "edit") {
        if(!isset($_GET['id'])){
            header("Location: ../articles.php");
        }

        $id = (int) $_GET['id'];

        if(!empty($_POST) && $id > 0){
            $article_date = date("Y-m-d");
            comment_edit($link, $id, $_POST['title'], $_POST['content'], $article_date, $user_id, $article_id);
            header("Location: ../article.php?id=$article_id");
        }

        $comment = comment_get($link, $id);
        include("../view/edit_comment.php"); 
    } else if($action == "delete") {
        if(!isset($_GET['id'])){
            header("Location: ../articles.php");
        }

        $id = (int) $_GET['id'];

        $article = comment_delete($link, $id);
        header("Location: ../article.php?id=$article_id");
    }

?>
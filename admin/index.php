<?php
    session_start ();
    if ($_SESSION['login']!='admin') 
        die ( "Страница не доступна!" );

    require_once("../db.php");
    require_once("../model/articles.php");
    require_once("../model/sections.php");

    $link = db_connection();
    $link_to_sections = "../view/";
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = "";
    }

    if($action == "add"){
        if(!empty($_POST)){
            $article_title = $_POST['title'];
            $article_date = date("Y-m-d");
            $section_id = section_get_id_by_name($link, $_POST['section']);

            // Сохраняем картинку в папке
            $path = 'images/'; // директория для загрузки
            
            $ext = array_pop(explode('.',$_FILES['img']['name'])); // расширение
            $new_name  = time().'.'.$ext; // новое имя с расширением
            $full_path = $path.$new_name; // полный путь с новым именем и расширением
            
            move_uploaded_file($_FILES['img']['tmp_name'], "../".$full_path);
            
            article_new($link, $article_title, $_POST['content'], $article_date, $full_path, $section_id);
            header("Location: index.php");
        }
        include("../view/add_article.php");
    } else if($action == "edit"){
        if(!isset($_GET['id'])){
            header("Location: index.php");
        }
        $id = (int) $_GET['id'];

        if(!empty($_POST) && $id > 0){
            $article_title = $_POST['title'];
            $article_date = date("Y-m-d");
            $section_id = section_get_id_by_name($link, $_POST['section']);

            // Сохраняем картинку в папке
            $path = 'images/'; // директория для загрузки
            
            $ext = array_pop(explode('.',$_FILES['img']['name'])); // расширение
            $new_name  = time().'.'.$ext; // новое имя с расширением
            $full_path = $path.$new_name; // полный путь с новым именем и расширением

            move_uploaded_file($_FILES['img']['tmp_name'], "../".$full_path);

            article_edit($link, $id, $article_title, $_POST['content'],  $article_date, $full_path, $section_id);
            header("Location: index.php");
        }

        $article = article_get($link, $id);
        include("../view/edit_article.php");  
    } else if($action == "delete"){
        $id = $_GET['id'];
        $article = article_delete($link, $id);
        header("Location: index.php");
    } else {
        $articles = articles_all($link);
        $sections = sections_all($link);

        include("../view/articles_admin.php");  
    }
?>
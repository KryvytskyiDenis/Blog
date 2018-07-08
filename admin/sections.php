<?php
    session_start ();
    if ($_SESSION['login']!='admin') 
        die ( "Страница не доступна!" );

    require_once("../db.php");
    require_once("../model/articles.php");
    require_once("../model/sections.php");

    $link = db_connection();

    if(isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = "";
    }

    if($action == "add"){
        if(!empty($_POST)){
            section_new($link, $_POST['name']);
            header("Location: index.php");
        }

        include("../view/add_section.php");
    } else if($action == "edit"){
        if(!isset($_GET['id'])){
            header("Location: index.php");
        }
        $id = (int) $_GET['id'];

        if(!empty($_POST) && $id > 0){
            section_edit($link, $id, $_POST['name']);
            header("Location: index.php");
        }

        $section = section_get($link, $id);
        include("../view/edit_section.php");  
    } else if($action == "delete"){
        $id = $_GET['id'];
        $section = section_delete($link, $id);
        header("Location: index.php");
    } else {
        $sections = sections_all($link);

        include("../view/articles_admin.php");  
    }
?>
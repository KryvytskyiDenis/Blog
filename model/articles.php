<?php

    function articles_all($link){
       //Query
       $query = "SELECT * FROM articles ORDER BY id DESC";
       $result = mysqli_query($link, $query);

       if(!$result){
           die(mysqli_error($link));
       }

       //Извлекаем данные из БД
       $n = mysqli_num_rows($result);
       $articles = array();

       for($i = 0; $i < $n; $i++){
           $row = mysqli_fetch_assoc($result);
           $articles[] = $row;
       }

       return $articles;
    }

    function articles_all_by_section_name($link, $section_name){
        //Query
        $query = sprintf("SELECT a.id, a.title, a.content, a.date, a.user_id, a.image_url, a.section_id, s.name FROM articles as a LEFT OUTER JOIN sections as s ON (s.id=a.section_id) WHERE s.name='%s'", $section_name);
        $result = mysqli_query($link, $query);
 
        if(!$result){
            die(mysqli_error($link));
        }
 
        //Извлекаем данные из БД
        $n = mysqli_num_rows($result);
        $articles = array();
 
        for($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $articles[] = $row;
        }
 
        return $articles;
    }


    function article_get($link, $article_id){
        //Query
       $query = sprintf("SELECT * FROM articles WHERE id=%d", (int) $article_id);
       $result = mysqli_query($link, $query);

       if(!$result){
           die(mysqli_error($link));
       }

       $article =  mysqli_fetch_assoc($result);

       return $article;
    }

    function article_new($link, $title, $content, $date, $image_url, $section_id){
        $admin_id = 3;
        $title = trim($title);
        $content = trim($content);

        if($title == '')
            return false;
        
        $insert = "INSERT INTO articles (title, date, content, image_url, user_id, section_id) VALUES ('%s', '%s', '%s', '%s', '%d', '%d')";
        
        $query = sprintf($insert, mysqli_real_escape_string($link, $title),
        mysqli_real_escape_string($link, $date),
        mysqli_real_escape_string($link, $content),
        mysqli_real_escape_string($link, $image_url),
        mysqli_real_escape_string($link, $admin_id),
        mysqli_real_escape_string($link, $section_id));

        $result = mysqli_query($link, $query);

        if(!$result){
            die(mysqli_error($link));
        }

        return true;
    }

    function article_edit($link, $id, $title, $content, $date, $image_url, $section_id){
        $title = trim($title);
        $content = trim($content);
        $date = trim($date);
        $id = (int) $id;

        if($title == '')
            return false;
        
        $update = "UPDATE articles SET title='%s', content='%s', date='%s', image_url='%s', section_id='%d' WHERE id='%d'";
        
        $query = sprintf($update, mysqli_real_escape_string($link, $title),
        mysqli_real_escape_string($link, $content),
        mysqli_real_escape_string($link, $date),
        mysqli_real_escape_string($link, $image_url),
        mysqli_real_escape_string($link, $section_id),
        $id);

        $result = mysqli_query($link, $query);

        if(!$result){
            die(mysqli_error($link));
        }

        return mysqli_affected_rows($link);
    }

    function article_delete($link, $id){
        $id = (int) $id;

        if($id == 0)
            return false;

        $query = sprintf("DELETE FROM articles WHERE id='%d'", $id);
        $result = mysqli_query($link, $query);

        if(!$result)
            die(mysqli_error($link));

        return mysqli_affected_rows($link);
    }

    function article_intro($text, $len = 150){
        return mb_substr($text, 0, $len);
    }
?>
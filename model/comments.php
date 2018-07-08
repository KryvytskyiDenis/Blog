<?php

    function comments_all($link, $article_id){
       //Query
       $query =  sprintf("SELECT c.id, c.title, c.content, c.date, ua.username FROM comments AS c INNER JOIN user_account as ua ON (c.user_id=ua.id)  WHERE article_id=%d ORDER BY date DESC", (int) $article_id);
       $result = mysqli_query($link, $query);

       if(!$result){
           die(mysqli_error($link));
       }

       //Извлекаем данные из БД
       $n = mysqli_num_rows($result);
       $comments = array();

       for($i = 0; $i < $n; $i++){
           $row = mysqli_fetch_assoc($result);
           $comments[] = $row;
       }

       return $comments;
    }

    function comment_new($link, $title, $content, $date, $user_id, $article_id){
        $title = trim($title);
        $content = trim($content);
        
        if($title == '')
            return false;

        $insert = "INSERT INTO comments (title, content, date, article_id, user_id) VALUES ('%s', '%s', '%s', '%d', '%d')";
        
        $query = sprintf($insert, mysqli_real_escape_string($link, $title),
        mysqli_real_escape_string($link, $content),
        mysqli_real_escape_string($link, $date),
        mysqli_real_escape_string($link, $article_id),
        mysqli_real_escape_string($link, $user_id));

        $result = mysqli_query($link, $query);

        if(!$result){
            die(mysqli_error($link));
        }

        return true;
    }

    function comment_edit($link, $id, $title, $content, $date, $user_id, $article_id){
        $title = trim($title);
        $content = trim($content);
        $date = trim($date);
        $id = (int) $id;

        if($title == '')
            return false;
        
        $update = "UPDATE comments SET title='%s', content='%s', date='%s', user_id='%d', article_id='%d' WHERE id='%d'";
        
        $query = sprintf($update, mysqli_real_escape_string($link, $title),
        mysqli_real_escape_string($link, $content),
        mysqli_real_escape_string($link, $date),
        mysqli_real_escape_string($link, $user_id),
        mysqli_real_escape_string($link, $article_id),
        $id);

        $result = mysqli_query($link, $query);

        if(!$result){
            die(mysqli_error($link));
        }

        return mysqli_affected_rows($link);
    }

    function comment_get($link, $id){
        //Query
       $query = sprintf("SELECT * FROM comments WHERE id=%d", (int) $id);
       $result = mysqli_query($link, $query);

       if(!$result){
           die(mysqli_error($link));
       }

       $comment =  mysqli_fetch_assoc($result);

       return $comment;
    }

    function comment_delete($link, $id){
        $id = (int) $id;

        if($id == 0)
            return false;

        $query = sprintf("DELETE FROM comments WHERE id='%d'", $id);
        $result = mysqli_query($link, $query);

        if(!$result)
            die(mysqli_error($link));

        return mysqli_affected_rows($link);
    }
?>
<?php

    function sections_all($link){
       //Query
       $query = "SELECT * FROM sections ORDER BY id DESC";
       $result = mysqli_query($link, $query);

       if(!$result){
           die(mysqli_error($link));
       }

       //Извлекаем данные из БД
       $n = mysqli_num_rows($result);
       $sections = array();

       for($i = 0; $i < $n; $i++){
           $row = mysqli_fetch_assoc($result);
           $sections[] = $row;
       }

       return $sections;
    }

    function section_get($link, $section_id){
        //Query
       $query = sprintf("SELECT * FROM sections WHERE id=%d", (int) $section_id);
       $result = mysqli_query($link, $query);

       if(!$result){
           die(mysqli_error($link));
       }

       $section =  mysqli_fetch_assoc($result);

       return $section;
    }

    function section_get_id_by_name($link, $section_name){
        //Query
       $query = sprintf("SELECT s.id FROM sections as s WHERE s.name='%s'",  $section_name);
       $result = mysqli_query($link, $query);

       if(!$result){
           die(mysqli_error($link));
       }

       $section =  mysqli_fetch_assoc($result);

       return $section['id'];
    }

    function section_new($link, $name){
        $name = trim($name);

        if($name == '')
            return false;
        
        $insert = "INSERT INTO sections (name) VALUES ('%s')";
        
        $query = sprintf($insert, mysqli_real_escape_string($link, $name));

        $result = mysqli_query($link, $query);

        if(!$result){
            die(mysqli_error($link));
        }

        return true;
    }

    function section_edit($link, $id, $name){
        $name = trim($name);
        $id = (int) $id;

        if($name == '')
            return false;
        
        $update = "UPDATE sections SET name='%s' WHERE id='%d'";
        
        $query = sprintf($update, mysqli_real_escape_string($link, $name), $id);

        $result = mysqli_query($link, $query);

        if(!$result){
            die(mysqli_error($link));
        }

        return mysqli_affected_rows($link);
    }

    function section_delete($link, $id){
        $id = (int) $id;

        if($id == 0)
            return false;

        $query = sprintf("DELETE FROM sections WHERE id='%d'", $id);
        $result = mysqli_query($link, $query);

        if(!$result)
            die(mysqli_error($link));

        return mysqli_affected_rows($link);
    }
?>
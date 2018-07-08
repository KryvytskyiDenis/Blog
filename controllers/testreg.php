<?php
    //вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. 
    session_start();

    require_once("../db.php");
    $link = db_connection();

    //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['login'])) { 
        $login = $_POST['login']; 
        if ($login == '') { 
            unset($login);
        } 
    } 

    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { 
        $password=$_POST['password']; 
        if ($password =='') {
            unset($password);
        } 
    }

    //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    if (empty($login) or empty($password))
    {
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }

    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
 
    //извлекаем из базы все данные о пользователе с введенным логином
    $query = sprintf("SELECT * FROM user_account WHERE username='$login'");
    $result = mysqli_query($link, $query);
    $myrow = mysqli_fetch_array($result);

    if (empty($myrow['password']))
    {
        //если пользователя с введенным логином не существует
        exit ("Извините, введённый вами login или пароль неверный.");
    }
    else {
        //если существует, то сверяем пароли
        if ($myrow['password']==$password) {
            //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
            $_SESSION['login']=$myrow['username']; 
            $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
            header("Location: ../index.php");
        }
        else {
            //если пароли не сошлись
            exit ("Извините, введённый вами login или пароль неверный.");
        }
    }
?>
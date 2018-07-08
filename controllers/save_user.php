<?php
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

    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);

    // проверка на существование пользователя с таким же логином
    $query = sprintf("SELECT id FROM user_account WHERE username='$login'");
    $result = mysqli_query($link, $query);
    $myrow = mysqli_fetch_array($result);

    if (!empty($myrow['id'])) {
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }

    // если такого нет, то сохраняем данные
    $query = sprintf("INSERT INTO user_account (username,password) VALUES('$login','$password')");
    $result2 = mysqli_query($link, $query);

    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
        header("Location: ../index.php");
    }
    else {
        echo "Ошибка! Вы не зарегистрированы.";
    }
?>
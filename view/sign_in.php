<?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/signin.css">

    <link rel="shortcut icon" href="../images/glasses.png" type="image/x-icon">
    <title>Вход</title>
</head>
<body>
    <?php if(empty($_SESSION['login']) OR empty($_SESSION['id'])) :?>   
        <div class="text-center">
            <!--****  testreg.php - это адрес обработчика. То есть, после нажатия на кнопку  "Войти", данные из полей отправятся на страничку testreg.php методом  "post" ***** -->
            <form action="../controllers/testreg.php" method="post" class="form-signin bg-light">
                <div class="form-group">
                    <h1 class="h3 mb-3 font-weight-normal">Вход</h1>
                    <p>
                        <label for="username" class="sr-only">Ваш логин:<br></label>
                        <input name="login" id="username" class="form-control" type="text" placeholder="Логин" size="15" maxlength="15" autofocus required>
                    </p>

                    <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
                    <p>
                        <label for="password" class="sr-only">Ваш пароль:<br></label>
                        <input name="password" id="password" class="form-control" type="password" placeholder="Пароль" size="15" maxlength="15" autofocus required>
                    </p>
                       
                
                    <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->
                    <p> 
                        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Войти">

                        <!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** --> 
                        <br>
                        <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** --> 
                        <a href="sign_up.php">Зарегистрироваться</a> 
                    </p>
                </div>
            </form>
        </div>
    <?php endif?>
    <!-- Для ссылок -->
    <link rel="stylesheet" href="../style/style.css">
</body>
</html>


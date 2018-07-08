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
    <title>Регистрация</title>
</head>
    <body>
        <div class="text-center">
            <form action="../controllers/save_user.php" method="post" class="form-signin bg-light">
                <div class="form-group">
                    <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
                    <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
                    <p>
                        <label for="username" class="sr-only">Ваш логин:<br></label>
                        <input name="login" id="username" class="form-control" type="text" placeholder="Логин" size="15" maxlength="15" autofocus required>
                    </p>
                    <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
                    <p>
                        <label for="password" class="sr-only">Ваш пароль:<br></label>
                        <input name="password" id="password" class="form-control" type="password" placeholder="Пароль" size="15" maxlength="15" autofocus required>
                    </p>

                    <p>
                        <label for="confirm_password" class="sr-only">Подтвердите пароль:<br></label>
                        <input name="confirm_password" id="confirm_password" class="form-control" type="password" placeholder="Подтвердите пароль" size="15" maxlength="15" autofocus required>
                    </p>

                    <p>
                        <label for="email" class="sr-only">Ваш email:<br></label>
                        <input name="email" id="email" class="form-control" type="email" placeholder="Email" autofocus required>
                    </p>

                    <p>
                        <label for="tel" class="sr-only">Ваш номер телефона:<br></label>
                        <input name="tel" id="tel" class="form-control" type="tel" pattern="\+380[0-9]{9}" placeholder="+380" size="13" maxlength="13" autofocus required>
                    </p>
                    <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** --> 
                    <p>
                        <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Зарегистрироваться">
                        <!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** --> 

                        <!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** --> 
                        <br>
                        <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** --> 
                        <a href="sign_in.php">Войти</a> 
                    </p>
                </div>
            </form>
        </div>

        <script src="../js/check_password.js"></script>

        <!-- Для ссылок -->
        <link rel="stylesheet" href="../style/style.css">
    </body>
</html>
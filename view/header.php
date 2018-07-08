<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?=$path_to_images?>images/glasses.png" type="image/x-icon">
    <title><?=$page_title?></title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="navbar-brand" href=<?=$link_to_main_page?>>Geek Peek</a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href=<?=$link_to_main_page?> class="nav-link active" id="main_page">Статьи</a>
                    </li>
                    <li class="nav-item">
                        <?php if(!empty($username) AND $username == "admin"):?>
                            <a href=<?=$admin_link?> class="nav-link" id="admin_panel">Панель администратора</a>
                        <?php endif?>
                    </li>
                    <?php foreach($sections as $s): ?>
                        <li>
                            <a href="<?=$link_to_sections?>articles_by_sections.php?section_name=<?=$s['name']?>" id=<?=$s['name']?> class="nav-link"><?=$s['name']?></a>
                        </li>
                    <?php endforeach?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if(!empty($username)):?>
                        <li class="nav-item">
                            <em class="navbar-text"><?=$username?></em>
                        </li>
                        <li class="nav-item"><a href=<?=$link_to_logout?> class="nav-link">Выход</a></li>
                    <?php else:?>
                        <li class="nav-item">
                            <a href="view/sign_in.php" class="nav-link">Вход</a>
                        </li>
                        <li class="nav-item">
                            <a href="view/sign_up.php" class="nav-link">Регистрация</a>
                        </li>
                    <?php endif?>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

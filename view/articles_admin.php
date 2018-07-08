<?php 
    $page_title = "Панель администратора";
    $link_to_main_page = "../index.php";
    $link_to_logout = "../logout.php";
    $path_to_images = "../";
    
    $admin_link = "index.php";
    if(!empty($_SESSION['login'])){
        $username = $_SESSION['login'];
    }
    
    include("header.php");
?>

    <section class="jumbotron text-center bg-white">
        <div class="container">
            <h1 class="jumbotron-heading"><a href="index.php?action=add">Добавить статью</a></h1>
        </div>
    </section>

    <div class="jumbotron">
        <table class="table table-striped bg-white">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Дата создания</th>
                <th scope="col" colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($articles as $a): ?>
                <tr>
                    <th scope="row"><?=$a['id']?></th>
                    <td><?=$a['title']?></th>
                    <td><?=$a['date']?></th>
                    <td><a href="index.php?action=edit&id=<?=$a['id']?>">Редактировать</a></td>
                    <td><a href="index.php?action=delete&id=<?=$a['id']?>">Удалить</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <section class="jumbotron text-center bg-white">
        <div class="container">
            <h1 class="jumbotron-heading"><a href="sections.php?action=add">Добавить раздел</a></h1>
        </div>
    </section>

    <div class="jumbotron">
        <table class="table table-striped bg-white">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Раздел</th>
                <th scope="col" colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($sections as $s): ?>
                <tr>
                    <th scope="row"><?=$s['id']?></th>
                    <td><?=$s['name']?></th>
                    <td><a href="sections.php?action=edit&id=<?=$s['id']?>">Редактировать</a></td>
                    <td><a href="sections.php?action=delete&id=<?=$s['id']?>">Удалить</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <?php
        include("footer.php");
    ?>
    
    <!-- Меняем активный пункт меню -->
    <script src="../js/change_active_menu_item.js"></script>
    <link rel="stylesheet" href="../style/style.css">
</body>
</html>
<?php 
    session_start();
    require_once("../db.php");
    require_once("../model/articles.php");
    require_once("../model/sections.php");

    $link = db_connection();
    $section_name = $_GET['section_name'];
    $page_title = $section_name;
    $link_to_main_page = "../index.php";
    $link_to_logout = "../logout.php";
    $admin_link = "../admin";
    $link_to_sections = "";
    $path_to_images = "../";

    $articles = articles_all_by_section_name($link, $section_name);
    $sections = sections_all($link);
    
    if(!empty($_SESSION['login'])){
        $username = $_SESSION['login'];
    }
    
    include("header.php");
?>
    <section class="jumbotron text-center bg-white">
        <div class="container">
            <h1 class="jumbotron-heading"><?=$section_name?></h1>
        </div>
    </section>
    <div class="jumbotron">
        <div class="row">
            <?php foreach($articles as $a): ?>
                <div class="col-sm-4 mb-2">
                    <div class="card">
                        <img class="card-img-top" src="../<?=$a['image_url']?>">
                        <div class="card-body">
                            <h4 class="card-title"><a href="../article.php?id=<?=$a['id']?>"><?=$a['title']?></a></h4>
                            <p class="card-text"><?=article_intro($a['content'])?></p>
                        </div>
                        <div class="align-bottom">
                            <small class="text-muted float-right mr-2 mb-2"><?=$a['date']?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <?php
        include("footer.php");
    ?>

    <script>
        <?=$section_name?>.setAttribute('class', 'nav-link active'); // активный пункт меню
        main_page.setAttribute('class', 'nav-link'); // убираем выделение
    </script>
    <!-- Для ссылок -->
    <link rel="stylesheet" href="../style/style.css">
</body>
</html>
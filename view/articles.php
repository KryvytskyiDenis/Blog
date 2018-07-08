<?php 
    $page_title = "Статьи";
    $link_to_main_page = "index.php";
    $link_to_logout = "logout.php";
    $admin_link = "admin";
    $path_to_images = "";
    if(!empty($_SESSION['login'])){
        $username = $_SESSION['login'];
    }
    
    include("header.php");
?>

    <section class="jumbotron text-center bg-white">
        <div class="container">
            <h1 class="jumbotron-heading">Самое интересное</h1>
        </div>
    </section>
    <div class="jumbotron">
        <div class="row">
            <?php foreach($articles as $a): ?>
                <div class="col-sm-4 mb-2">
                    <div class="card">
                        <img class="card-img-top" src=<?=$a['image_url']?>>
                        <div class="card-body">
                            <h4 class="card-title"><a href="article.php?id=<?=$a['id']?>"><?=$a['title']?></a></h4>
                            <p class="card-text"><?=article_intro($a['content'])?></p>
                        </div>
                        <div class="align-bottom">
                            <small class="text-muted float-right mr-2 mb-2">
                                <?php
                                    $date = date_create($a['date']); 
                                    $result = $date->format('d-m-Y');
                                ?>
                                <?=$result?>
                            </small>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <?php
        include("footer.php");
    ?>
    <!-- Для ссылок -->
    <link rel="stylesheet" href="style/style.css">
    
</body>
</html>
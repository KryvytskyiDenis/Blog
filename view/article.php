<?php 
    $page_title = $article['title'];
    $link_to_main_page = "index.php";
    $link_to_logout = "logout.php";
    
    $admin_link = "admin";
    if(!empty($_SESSION['login'])){
        $username = $_SESSION['login'];
    }
    
    require_once("model/sections.php");
    $sections = sections_all($link);

    include("header.php");
?>

    <section class="jumbotron text-center bg-white">
        <div class="container">
            <h1 class="jumbotron-heading"><?=$article['title']?></h1>
        </div>
    </section>
    <div class="jumbotron">
        <em class="small float-right"><?=$article['date']?></em>
        <p class="float-center"><?=$article['content']?></p>
    </div>

    <section class="jumbotron text-center bg-white">
        <div class="container">
            <h1 class="jumbotron-heading">Что же думают пользователи?</h1>
        </div>
    </section>

    <div class="jumbotron">
        <div class="row">
            <?php foreach($comments as $c): ?>
                <div class="col-sm-4 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?=$c['title']?></h4>
                            <p class="card-text"><?=$c['content']?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <?php if($username == $c['username']):?>
                                    <div class="btn-group">
                                        <a href="controllers/comments.php?action=edit&id=<?=$c['id']?>&article_id=<?=$article['id']?>"
                                           type="button" class="btn btn-sm btn-outline-secondary">
                                           Редактировать
                                        </a>
                                        <a href="controllers/comments.php?action=delete&id=<?=$c['id']?>&article_id=<?=$article['id']?>"
                                           type="button" class="btn btn-sm btn-outline-secondary">
                                           Удалить
                                        </a>
                                    </div>
                                <?php endif?>
                                <small class="text-muted"><?=$c['username']?></small>
                                <small class="text-muted"><?=$c['date']?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <section class="jumbotron text-center bg-white">
        <div class="container">
            <h1 class="jumbotron-heading">Поделитесь своими мыслями!</h1>
        </div>
    </section>
    <div class="jumbotron">
        <?php if(!empty($_SESSION['login'])):?>
            <div class="form-add-comment">
                <form method="post" action="controllers/comments.php?action=add&article_id=<?=$article['id']?>">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" class="form-control mb-2" name="title" required/>

                        <label for="content">Статья</label>
                        <!-- The editor container -->
                        <textarea name="content" id="editor" class="mb-2"></textarea>

                        <div class=" text-center">
                            <input type="submit" value="Поделится" class="btn btn-secondary btn-lg mt-5"/>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif?>
    </div>

    <?php
        include("footer.php");
    ?>
     <!-- Для текстового редактора -->
    <script src="ckeditor/ckeditor.js"></script>
    <script src="js/editor-settings.js"></script>
</body>
</html>
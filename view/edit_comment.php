<?php 
    $page_title = "Редактировать комментарий";
    $link_to_main_page = "../index.php";
    $link_to_logout = "logout.php";
    $path_to_images = "../";
    $admin_link = "index.php";
    if(!empty($_SESSION['login'])){
        $username = $_SESSION['login'];
    }
    
    require_once("../model/sections.php");
    $sections = sections_all($link);
    
    include("header.php");
?>
    <section class="jumbotron text-center  bg-white">
        <div class="container">
            <h1 class="jumbotron-heading">Хотите изменить свои сказания?</h1>
        </div>
    </section>
    <div class="jumbotron">
        <form method="post" action="comments.php?action=edit&id=<?=$_GET['id']?>&article_id=<?=$comment['article_id']?>">
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control mb-2" name="title" value="<?=$comment['title']?>" autofocus required/>

                <label for="content">Комментарий</label>
                <textarea name="content" id="editor" class="mb-2"><?=$comment['content']?></textarea>
                
                <div class="text-center">
                    <input type="submit" value="Редактировать" class="btn btn-secondary btn-lg mt-5"/>
                </div>
            </div>
        </form>
    </div>

    <?php
        include("footer.php");
    ?>
    
     <!-- Для текстового редактора -->
     <script src="../ckeditor/ckeditor.js"></script>
    <script src="../js/editor-settings.js"></script>
</body>
</html>
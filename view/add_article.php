<?php 
    $page_title = "Новая статья";
    $link_to_main_page = "../index.php";
    $link_to_logout = "logout.php";
    $admin_link = "index.php";
    $path_to_images = "../";
    if(!empty($_SESSION['login'])){
        $username = $_SESSION['login'];
    }
    
    require_once("../model/sections.php");
    $sections = sections_all($link);

    include("header.php");
?>
    <section class="jumbotron text-center  bg-white">   
        <div class="container">
            <h1 class="jumbotron-heading">Появилась новая идея?</h1>
        </div>
    </section>
    <div class="jumbotron">
        <form method="post" enctype="multipart/form-data" action="index.php?action=add">
            <div class="form-group">
                <label for="img">Картинка шапки статьи</label>
                <input type="file" class="form-control-file mb-2" name="img" id="img" required/>

                <label for="title">Название</label>
                <input type="text" class="form-control mb-2" name="title" autofocus required/>

                <label for="section">Раздел</label>     
                <select name="section" id="" class="form-control mb-2">
                    <?php foreach($sections as $s): ?>
                        <option><?=$s['name']?></option>
                    <?php endforeach ?>
                </select>

                <label for="content">Статья</label>
                <!-- The editor container -->
                <textarea name="content" id="editor" class="mb-2"></textarea>
                
                <div class="text-center">
                    <input type="submit" value="Добавить" class="btn btn-secondary btn-lg mt-5"/>
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
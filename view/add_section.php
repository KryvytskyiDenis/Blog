<?php 
    $page_title = "Новый раздел";
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
        <form method="post" action="sections.php?action=add">
            <div class="form-group">
                <label for="name">Название раздела</label>
                <input type="text" class="form-control mb-2" name="name" autofocus required/>

                <div class="text-center">
                    <input type="submit" value="Добавить" class="btn btn-secondary btn-lg mt-5"/>
                </div>
            </div>
        </form>
    </div>

    <?php
        include("footer.php");
    ?>
</body>
</html>
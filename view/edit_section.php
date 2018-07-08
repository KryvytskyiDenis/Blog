<?php 
    $page_title = "Редактирование раздела";
    $link_to_main_page = "../index.php";
    $link_to_logout = "../logout.php";
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
            <h1 class="jumbotron-heading">Хотите что-нибудь изменить?</h1>
        </div>
    </section>
    <div class="jumbotron">
        <form method="post" enctype="multipart/form-data" action="sections.php?action=edit&id=<?=$_GET['id']?>">
            <div class="form-group">
                <label for="name">Название раздела</label>
                <input type="text" class="form-control mb-2" name="name" value="<?=$section['name']?>" autofocus required/>

                <div class="text-center">
                    <input type="submit" value="Редактировать" class="btn btn-secondary btn-lg mt-5"/>
                </div>
            </div>
        </form>
    </div>

    <?php
        include("footer.php");
    ?>

    <script src="../js/change_active_menu_item.js"></script>
</body>
</html>
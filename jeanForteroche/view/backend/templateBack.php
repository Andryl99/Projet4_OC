<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="css/styleBack.css" rel="stylesheet" /> 
        <link rel="stylesheet" href="css/bootstrap.css"> 
	    <link rel="stylesheet" href="css/bootstrap-grid.css">
        <script src="https://cdn.tiny.cloud/1/c2w6x9i4uqtslwokaddhay6toclhnganymuwyl68kgxbte4m/tinymce/5/tinymce.min.js"></script>
        <script> tinymce.init({
            selector: '.textTiny'
            });
        </script>
    </head>
    
    <header class="container-fluid">
        <img src="pictures/logo.png" class="col-lg-12 col-sm-12" id="logo"/>
        <nav id="main-menu" class="col-lg-12 col-sm-12">
            <a href="index.php">Accueil</a>
            <?php 
                if (isset($_SESSION['authorised']) && $_SESSION['authorised'] == 1)
                {
                    echo "<a href='index.php?action=getAdminViews'>Administration du site</a>";
                } else
                {
                   echo "<a href='view/frontend/login.php'>Connection</a>";
                }
            ?>
        </nav>
    </header>
        
    <body>
        <?= $content ?>
    </body>
</html>
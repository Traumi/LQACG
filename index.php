<html lang="fr">
    <head>
    
    </head>
    <body>
    <?php  
        require_once("view/header.php");

        isset($_GET["c"]) ? $controller = $_GET["c"] : $controller = "login";
        require_once("view/".$controller.".php");

        require_once("view/footer.php");
    ?>
    </body>
</html>
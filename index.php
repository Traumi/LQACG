<html lang="fr">
    <head>
    
    </head>
    <body>
    <?php  
        session_start();
        require_once("view/header.php");

        isset($_GET["c"]) ? $controller = $_GET["c"] : $controller = "account";
        isset($_GET["a"]) ? $action = $_GET["a"] : $action = "accueil";
        require_once("controller/".$controller.".php");
        $action();

        require_once("view/footer.php");
    ?>
    </body>
</html>
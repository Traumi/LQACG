<html lang="fr">
    <head>
        <?php require_once("view/imports.php"); ?>
    </head>
    <body>
    <?php  
        session_start();

        //Imports :
        require_once("object/account.php");
        require_once("object/site.php");
        require_once("object/utils.php");

        require_once("view/header.php");
        require_once("view/profile_trophies_view.php");
        require_once("view/footer.php");
    ?>
    </body>
</html>
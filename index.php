<html lang="fr">
    <head>
        <?php require_once("view/imports.php"); ?>
    </head>
    <body>
    <?php  
        session_start();

        //Imports :
        require_once("object/account.php");


        isset($_SESSION["login"]) ? header("Location: accueil.php") : null;

        isset($_POST['login']) ? $login = $_POST['login'] : $login = "";
        isset($_POST['password']) ? $password = $_POST['password'] : $password = "";

        if(!($login == "" || $password == "")){
            $acc = new Account($login);
            if($acc->check_login($password)){
                $_SESSION["login"] = $acc->login;
                header("Location: accueil.php");
            }
        }

        require_once("view/header.php");
        require_once("view/login.php");
        require_once("view/footer.php");
    ?>
    </body>
</html>
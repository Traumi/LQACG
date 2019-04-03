<html lang="fr">
    <head>
    
    </head>
    <body>
    <?php  
        session_start();

        //Imports :
        require_once("object/account.php");


        

        isset($_POST['login']) ? $login = $_POST['login'] : $login = "";
        isset($_POST['password']) ? $password = $_POST['password'] : $password = "";

        if(!($login == "" || $password == "")){
            $acc = new Account($login, $password);
            if($acc->check_login()){
                header("Location: accueil.php");
                $_SESSION["login"] = $acc->login;
                
            }
        }

        require_once("view/header.php");
        require_once("view/login.php");
        require_once("view/footer.php");
    ?>
    </body>
</html>
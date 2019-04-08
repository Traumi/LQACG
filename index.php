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

        $errors = array();

        if(isset($_POST['spassword2'])){
            isset($_POST['slogin']) ? $login = $_POST['slogin'] : $login = "";
            isset($_POST['spassword']) ? $password = $_POST['spassword'] : $password = "";
            isset($_POST['spassword2']) ? $password2 = $_POST['spassword2'] : $password2 = "";
            if($password == $password2 && strlen($password) > 2 && strlen($login) > 2){
                $acc = new Account($login);
                $profil = $acc->get_profil();
                if($profil != null){
                    array_push($errors,"Ce compte existe déjà");
                }else{
                    if($acc->subscribe($password)){
                        $_SESSION["login"] = $acc->login;
                        header("Location: accueil.php");
                    }else{
                        array_push($errors,"Erreur lors de l'inscription");
                    }
                }
            }else{
                array_push($errors,"Veuillez remplir correctement les champs");
            }
            $login = "";
        }else{
            isset($_POST['login']) ? $login = $_POST['login'] : $login = "";
            isset($_POST['password']) ? $password = $_POST['password'] : $password = "";
            if(!($login == "" || $password == "")){
                $acc = new Account($login);
                if($acc->check_login($password)){
                    $_SESSION["login"] = $acc->login;
                    header("Location: accueil.php");
                }else{
                    array_push($errors,"Identifiants incorrects");
                }
            }
        }

        require_once("view/header.php");
        require_once("view/login.php");
        require_once("view/footer.php");
    ?>
    </body>
</html>
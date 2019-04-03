<?php

require_once("database/database.php");

    function accueil(){
        require_once("view/login.php");
    }

    function login(){
        isset($_POST['login']) ? $login = $_POST['login'] : $login = "";
        isset($_POST['password']) ? $password = $_POST['password'] : $password = "";

        $acc = new Account($login, $password);
        if($acc->check_login()){
            $_SESSION["login"] = $acc->login;
            require_once("view/accueil.php");
        }else{
            require_once("view/login.php");
        }
    }

    class Account{

        

        public function __construct($login, $password) {
            $this->login = $login;
            $this->password = $password;
            $this->db = new Database();
        }

        public function check_login(){
            return $this->db->login($this->login, $this->password);
        }
    }
?>
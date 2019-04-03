<?php

    require_once("database/database.php");

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
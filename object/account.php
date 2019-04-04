<?php

    require_once("database/database.php");

    class Account{
        public function __construct($login) {
            $this->login = $login;
            //$this->password = $password;
            $this->db = new Database();
        }

        public function check_login($password){
            return $this->db->login($this->login, $password);
        }

        public function get_profil(){
            return $this->db->profil($this->login);
        }

        public function generate_tpc($login){
            $token = openssl_random_pseudo_bytes(8);
            $token = bin2hex($token);
            $tpc = substr(hash("sha256" , $login),0,5)."-".$token;
            $this->db->set_tpc($this->login, $tpc);
            return $tpc;
        }
    }
?>
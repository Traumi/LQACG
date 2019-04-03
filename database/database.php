<?php

    class Database{

        public function __construct() {
            $user = "root";
            $pass = "";
            $this->dbh = new PDO('mysql:host=localhost;dbname=lolquests', $user, $pass);
        }

        

        public function login($login, $password){
            $sql = 'SELECT * FROM account WHERE login = :login';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':login' => $login));
            $res = $sth->fetch();

            if(password_verify($password, $res['PASSWORD'])){
                return true;
            }else{
                return false;
            }
        }

    }

?>
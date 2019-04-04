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

        public function profil($login){
            $sql = 'SELECT * FROM account WHERE login = :login';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':login' => $login));
            $res = $sth->fetch();
            return $res;
        }

        public function get_lol_acc($login){
            $sql = 'SELECT * FROM account WHERE login = :login';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':login' => $login));
            $res = $sth->fetch();

            if($res['LOL_ACCOUNT'] == null){
                return false;
            }else{
                return $res['LOL_ACCOUNT'];
            }
        }

        public function set_tpc($login, $tpc){
            $sql = 'UPDATE account SET TPC = :tpc WHERE LOGIN = :login';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':login' => $login, ':tpc' => $tpc));
        }

    }

?>
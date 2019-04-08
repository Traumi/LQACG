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

        public function subscribe($login, $pw){

            if($login == "" || $pw == "") return false;

            $options = [
                'cost' => 12,
            ];
            $pw = password_hash($pw, PASSWORD_BCRYPT, $options);
            $insc = date('Y-m-d H:i:s');

            $sql = 'SELECT * FROM account WHERE login = :login';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':login' => $login));
            if($sth->fetch()) return false;

            $sql = 'INSERT INTO account (LOGIN, PASSWORD, PROFIL, INSCRIPTION) VALUES (:login, :password, 0, :insc)';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':login' => $login, ':password' => $pw, ':insc' => $insc));

            return true;
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

        public function set_lol_account($login, $pseudo, $tpc){
            $sql = 'UPDATE account SET LOL_ACCOUNT = :pseudo WHERE LOGIN = :login AND TPC = :tpc';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':login' => $login, ':tpc' => $tpc, ':pseudo' => $pseudo));
        }

    }

?>
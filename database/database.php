<?php

    class Database{

        public function __construct() {
            $user = "root";
            $pass = "";
            $this->dbh = new PDO('mysql:host=localhost;dbname=lolquests;charset=UTF8', $user, $pass);
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

        public function get_quests_list(){
            $sql = 'SELECT * FROM quests';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute();
            return $sth->fetchAll();
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

            $sql = 'INSERT INTO lol_profil(PSEUDO) VALUES (:pseudo)';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':pseudo' => $pseudo));
        }

        public function get_lol_account($pseudo){
            $sql = 'SELECT * FROM lol_profile WHERE PSEUDO = :pseudo';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':pseudo' => $pseudo));
            return $sth->fetch();
        }

        public function update_lol_account($profil){
            //Time_stamp
            $sql = 'UPDATE lol_profile SET LAST_UPDATE = CURRENT_TIMESTAMP WHERE PSEUDO = :pseudo';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':pseudo' => $profil['PSEUDO']));

            //Multikills
            $sql = 'UPDATE lol_profile SET DOUBLE_KILL = :dk, TRIPLE_KILL = :tk, QUADRA = :quadra, PENTA = :penta WHERE PSEUDO = :pseudo';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':pseudo' => $profil['PSEUDO'], ':quadra' => $profil['QUADRA'], ':penta' => $profil['PENTA'], ':tk' => $profil['TRIPLE_KILL'], ':dk' => $profil['DOUBLE_KILL']));

            //KDA
            $sql = 'UPDATE lol_profile SET SIMPLE_KILL = :kills, DEATH = :deaths, ASSIST = :assists WHERE PSEUDO = :pseudo';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':pseudo' => $profil['PSEUDO'], ':kills' => $profil['SIMPLE_KILL'], ':deaths' => $profil['DEATH'], ':assists' => $profil['ASSIST']));

            //Farm
            $sql = 'UPDATE lol_profile SET FARM = :farm, TOWER = :tower, INHIB = :inhib WHERE PSEUDO = :pseudo';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':farm' => $profil['FARM'], ':tower' => $profil['TOWER'], ':inhib' => $profil['INHIB'], ':pseudo' => $profil['PSEUDO']));

            //Role
            $sql = 'UPDATE lol_profile SET TANK = :tank, MAGE = :mage, SUPPORT = :support, FIGHTER = :fighter, ASSASSIN = :assassin, MARKSMAN = :marksman WHERE PSEUDO = :pseudo';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':tank' => $profil['TANK'], ':mage' => $profil['MAGE'], ':support' => $profil['SUPPORT'], ':fighter' => $profil['FIGHTER'], ':assassin' => $profil['ASSASSIN'], ':marksman' => $profil['MARKSMAN'], ':pseudo' => $profil['PSEUDO']));

        }

    }

?>
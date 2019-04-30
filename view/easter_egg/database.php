<?php

    class Database{

        public function __construct() {
            $user = "root";
            $pass = "";
            $this->dbh = new PDO('mysql:host=localhost;dbname=easter_egg;charset=UTF8', $user, $pass);
        }

        public function get($pseudo){
            $sql = 'SELECT * FROM profil WHERE pseudo = :pseudo';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':pseudo' => $pseudo));
            return $sth->fetch();
        }

        public function getEaster($pseudo){
            $sql = 'SELECT * FROM easter WHERE pseudo = :pseudo';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':pseudo' => $pseudo));
            return $sth->fetch();
        }

        public function updateEaster($pseudo, $easter){
            $sql = 'UPDATE easter SET easter = :string WHERE pseudo = :pseudo';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':pseudo' => $pseudo, ':string' => $easter));
        }

        public function count(){
            $sql = "SELECT count(pseudo) as 'rank' FROM profil";
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute();
            return $sth->fetch();
        }

        public function rank($pseudo){
            $sql = "SELECT count(pseudo) as 'rank' FROM profil WHERE id <= (SELECT id FROM profil WHERE pseudo = :pseudo)";
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':pseudo' => $pseudo));
            return $sth->fetch();
        }

        public function create($pseudo, $ip){
            $sql = 'INSERT INTO profil (PSEUDO, IP) VALUES (:pseudo, :ip)';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':pseudo' => $pseudo, ':ip' => $ip));
        }

        public function createEaster($pseudo, $ip){
            $sql = 'INSERT INTO easter (PSEUDO, IP) VALUES (:pseudo, :ip)';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':pseudo' => $pseudo, ':ip' => $ip));
        }

        public function easter_egg($pseudo, $easter){
            $sql = 'UPDATE profil SET '.$easter.'=1 WHERE pseudo = :pseudo';
            $sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':pseudo' => $pseudo));
        }
    }

?>
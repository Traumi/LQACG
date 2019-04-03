<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT");
    header("Access-Control-Allow-Headers: Content-Type");
    mb_internal_encoding("UTF-8");

    /*$postdata = file_get_contents("php://input");
    $request = json_decode($postdata, true);*/

    isset($_GET['login']) ? $login = $_GET['login'] : $login = "";
    isset($_GET['pw']) ? $pw = $_GET['pw'] : $pw = "";

    if($login == "" || $pw == "") die();

    $user = "root";
    $pass = "";
    $insc = date('Y-m-d H:i:s');
    $dbh = new PDO('mysql:host=localhost;dbname=lolquests', $user, $pass);

    $sql = 'SELECT * FROM account WHERE login = :login';
    $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':login' => $login));
    $res = $sth->fetch();

    if(password_verify($pw, $res['PASSWORD'])){
        echo '{"status":"200"}';
    }else{
        die();
    }

?>
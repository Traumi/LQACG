<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT");
    header("Access-Control-Allow-Headers: Content-Type");

    $postdata = file_get_contents("php://input");
	$request = json_decode($postdata, true);

    $message = $request["message"];
    $pseudo = $request["pseudo"];
    $num = $request["number"];
    $token = $request["token"];

    $response = "";
    $status = 0;

    $quest = array();
    $quest[0] = array();
    $quest[0]["name"] = "Quand est-ce que cette version du serveur a ouvert ses portes au public?";
    $quest[0]["rep"] = "08/04/2019";
    $quest[0]["token"] = "";
    $quest[1] = array();
    $quest[1]["name"] = "Parfois il faut regarder hors de la boîte...";
    $quest[1]["rep"] = "aC7Q4ij%";
    $quest[1]["token"] = "M1oLp645";
    $quest[2]["name"] = "\\n";
    $quest[2]["name"] .= "  ,ad8888ba,    ,ad8888ba,\\n";
    $quest[2]["name"] .= " d8^'    `^8b  d8^'    `^8b\\n";
    $quest[2]["name"] .= "d8'           d8'\\n";
    $quest[2]["name"] .= "88            88\\n";
    $quest[2]["name"] .= "88      88888 88      88888\\n";
    $quest[2]["name"] .= "Y8,        88 Y8,        88\\n";
    $quest[2]["name"] .= " Y8a.    .a88  Y8a.    .a88\\n";
    $quest[2]["name"] .= "  `^Y88888P¨    `^Y88888P¨\\n";
    $quest[2]["rep"] = "gg";
    $quest[2]["token"] = "AFK45";

    if(strtolower($message) == "kfc"){
        $response = "So good...";
    }else if(strtolower($message) == "traumination"){
        $response = "Someone awesome !";
    }else if(strtolower($message) == "/ci"){
        $response = "/ban ".$pseudo." 1y";
    }else if(strtolower($message) == "/win"){
        $response = "Félicitation, vous avez gagné";
    }else if(strtolower($message) == "win"){
        $response = "Félicitation, vous avez gagné";
    }else if(strtolower($message) == "x"){
        $response = "X to doubt";
    }else if(strtolower($message) == "gign"){
        $response = "/ignore @a";
    }else if(strtolower($message) == "418"){
        $response = "I'm a teapot";
    }else{
        if($num < sizeof($quest)){
            if($token == $quest[$num]["token"]){
                if($message == $quest[$num]["rep"]){
                    $status = 1;
                    if(($num+1) >= sizeof($quest)){
                        $response = "Y a plus rien :(";
                        $token = "";
                    }else{
                        $response = $quest[$num+1]["name"];
                        $token = $quest[$num+1]["token"];
                    }
                }else{
                    $response = "Nope";
                }
            }else{
                $response = "Tricheur de ses morts";
            }
        }else{
            $response = "Ce quizz est déjà terminé";
        }
        
    }

    if($status == 0){
        echo '{"status":'.$status.',"message":"'.$response.'"}';
    }else{
        echo '{"status":'.$status.',"message":"'.$response.'","token":"'.$token.'"}';
    }
    

?>
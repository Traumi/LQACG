<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT");
    header("Access-Control-Allow-Headers: Content-Type");

    $postdata = file_get_contents("php://input");
	$request = json_decode($postdata, true);

    $message = $request["message"];
    $pseudo = $request["pseudo"];
    $ip = $request["ip"];
    $num = $request["number"];
    $token = $request["token"];

    $response = "";
    $status = 0;
    $bsod = false;
    $rsod = false;
    $gsod = false;

    $quest = array();
    $quest[0]["name"] = "Quand est-ce que cette version du serveur a ouvert ses portes au public ? (JJ/MM/AAAA)";
    $quest[0]["rep"] = ["08/04/2019"];
    $quest[0]["token"] = "";
    /*$quest[1]["name"] = "Parfois il faut regarder hors de la boîte...";
    $quest[1]["rep"] = ["aC7Q4ij%"];
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
    $quest[2]["rep"] = ["GG","gg"];
    $quest[2]["token"] = "AFK45";
    $quest[3]["name"] = "Bravo! Tu sais donc lire! Allez, plus dur : Je suis caché sur l'ile du spawn, à toi de me dire ce qu'il y a à savoir !";
    $quest[3]["rep"] = ["..."];//x y z
    $quest[3]["token"] = "MLa6KnT";
    $quest[4]["name"] = "C'était facile, non? Et sinon, peux-tu me donner le pseudo de ton administratrice préférée?";
    $quest[4]["rep"] = ["Haxana","haxana","ChloeAs","Chloeas","chloeas"];
    $quest[4]["token"] = "GKCDCDLCNRV";
    $quest[5]["name"] = "·−− · ··· ···· ·− ·−·· −−− ·−· ···";
    $quest[5]["rep"] = ["Wesh Alors","WESHALORS","weshalors","WESH ALORS"];
    $quest[5]["token"] = "Kp9Az8aD";
    $quest[6]["name"] = "Un peu plus simple, II+IVxIII";
    $quest[6]["rep"] = ["14","XIV"];
    $quest[6]["token"] = "M%9alKp1";
    $quest[7]["name"] = "Aller, c'est cadeau, quel est le biome de base d'une île sur ce skyblock?";
    $quest[7]["rep"] = ["ocean","océan","Océan","Ocean"];
    $quest[7]["token"] = "CKD0MDL0L";
    $quest[8]["name"] = "Mais dis moi, quel est le pseudo complet de notre Fondateur préféré?";
    $quest[8]["rep"] = ["dig95"];
    $quest[8]["token"] = "CF4C1L";
    $quest[9]["name"] = "Ok, je pense que tu es prêt, pour ne pas oublier la réponse à cette question mon créateur a mis un panneau sur son île, je te laisse chercher...\\n(indice : ne pas prendre en compte la 4e ligne)";
    $quest[9]["rep"] = ["Pain au chocolat"];
    $quest[9]["token"] = "HoLc65AsQ";
    $quest[10]["name"] = "Aller, un petit tour sur le Discord, si tu n'y es pas c'est le moment de nous rejoindre ;) (https://discord.gg/7hwGEFK)\\nQuelle est la date du premier message de Traumination ? (JJ/MM/AAAA)";
    $quest[10]["rep"] = ["24/03/2019"];
    $quest[10]["token"] = "LKAm2S89";*/

    $error_messages = array();
    $error_messages[0] = "Nope !";
    $error_messages[1] = "Je suis pas trop sûr pour le coup...";
    $error_messages[2] = "On pourrait presque croire que tu le fais exprès...";
    $error_messages[3] = "L'espoir fait vivre";
    $error_messages[4] = "Tu arrives à donner des réponses, maintenant va falloir donner la bonne !";
    $error_messages[5] = "Courage, ça va finir par marcher";
    $error_messages[6] = "L'échec ça fait partis de l'apprentissage";
    $error_messages[7] = "Fatal Error : Bad Answer";
    $error_messages[8] = "Bonne réponse ! Ou pas...";
    $error_messages[9] = "Tu connais l'histoire du mec qui arrivait pas à avoir la bonne réponse ?";
    $error_messages[10] = "Essaye autre chose";
    $error_messages[11] = "La légende raconte qu'il parvint à trouver la bonne réponse, une fois...";
    $error_messages[12] = "Même les contes de mon enfance sonnent plus vrais...";
    $error_messages[13] = "C'est à cause de ce genre de réponse qu'on en est la !";
    $error_messages[14] = "Je pensais que le but était de gagner...";
    $error_messages[15] = "On dirait que ça t'amuse...";

    function joke(){
        $joke_list = [
            "Qu'est-ce qui n'est pas un steak ? Une pas steak ! (Pastèque)\\n",
            "Qu'est-ce qui est jaune et qui attends ? Jaune attends ! (Jonathan)\\n",
            "Pourquoi il faut toujours faire confiance aux plombiers ? Car ils te donnent toujours les bons tuyaux !\\n",
            "Comment appelle-t-on un boomerang qui ne revient pas ? Un bout de bois !\\n",
            "Comment appelle-t-on un postier d'1m40 (4,757 ft pour les québécois) ? Un nain posteur !\\n",
            "Qu'est-ce qu'un Indien demande dans une pharmacie ? Hindou Liprane ! (Un doliprane)\\n",
            "Quel est le point commun entre un boulanger et un voleur ? Ils finissent toujours dans le pétrin !\\n",
            "Qu'est-ce qu'un canife ? Un petit fien !\\n",
            "Il y a 10 types de personnes sur cette planète, ceux qui comprennent le binaire et les autres...\\n",
            "Que fait un informaticien quand il est triste ? Il se console !\\n",
            "J'ai une très bonne blague sur les erreurs 404... Mais je la retrouve plus -[p_p]-\\n",
            "Tu connais la blague de la chaise? Dommage, elle est pliante !\\n",
            "Quelles sont les 3 lettres préférées de Traumination ? O Q P\\n",
            "J'ai créé ma propre marque de soda, je l'ai appelé F5 car ça raffraichit !\\n"
        ];
        $index = rand(0, sizeof($joke_list)-1);
        return $joke_list[$index];
    }

    $easter_eggs = [
        "kfc" => "So good...",
        "traumination" => "Sans conteste la personne la plus géniale !",
        "traumibot" => "A votre service '-[^_^]-'",
        "/ci" => "/ban ".$pseudo,
        "/win" => "Félicitation, vous avez gagné !",
        "win" => "Félicitation, vous avez gagné !",
        "x" => "X to doubt",
        "gign" => "/ignore @a",
        "418" => "I'm a teapot",
        "sms" => "omg m8 u r so obvious, c u l8tR",
        "chocolatine" => "Franchement, qui pourrait croire que c'est une réponse valable? Cherche encore!",
        "joke" => joke()."Ah on me dit dans l'oreillette que Traumination s'est fait derank...",
        "pwet" => "pwet",
        "cd .." => "Certainement pas!",
        "rm traumibot" => "Tu mériterais que je te vire de cet event !",
        "cd traumination" => "Ce dossier n'existe pas.",
        "rm traumination" => "Personne ne peut supprimer Traumination !",
        "cd answer" => "Bien essayé !",
        "wesh" => "Wesh gros bien ou quoi ?",
        "pipe et jambe de bois" => "Incroyable du cul"
    ];

    if(strtolower($message) == "help" || strtolower($message) == "oskour" || strtolower($message) == "aide"){
        $response = "Ah bah c'est pas de pot ça, je vais te donner un petit coup de pouce : \\n";
        $response .= "1 - Toutes les réponses sont à donner sur ce module, sans exception ! \\n";
        $response .= "2 - Chaque réponse tient sur une seule ligne ! \\n";
        $response .= "3 - Demander des indices à Traumination n'aboutira surement à rien ! \\n";
        $response .= "4 - Le gagnant sera le premier à terminer cet event ! \\n";
        $response .= "5 - Quelques easter eggs sont cachés dans ce module, à toi d'en découvrir le plus possible ;) !\\n";
        $response .= "6 - Voici quelques commandes qui te seront utiles : \\n";
        $response .= "  • help : Affiche ce message.\\n";
        $response .= "  • repeat : Répète la question en cours.\\n";
        $response .= "  • clear : Efface le contenu de la console.\\n";
    }else if(strtolower($message) == "repeat"){
        if($num >= sizeof($quest)){
            $response = "Je ne peux pas vous aider -[u_u]-";
        }else{
            $response = $quest[$num]["name"];
        }
        /*try{
            
        }catch(Exception $e){
            
        }*/
    }else if(array_key_exists(strtolower($message), $easter_eggs)){
        $response = $easter_eggs[$message];
    }else{
        if($num < sizeof($quest)){
            if($token == $quest[$num]["token"]){
                $good = false;
                for($i = 0 ; $i < sizeof($quest[$num]["rep"]) ; $i++){
                    if($message == $quest[$num]["rep"][$i]){
                        $status = 1;
                        if(($num+1) >= sizeof($quest)){
                            $response = "Y a plus rien à voir. (Bien joué)";
                            $token = "Kj_9PoqS";
                            $bsod = true;
                        }else{
                            $response = $quest[$num+1]["name"];
                            $token = $quest[$num+1]["token"];
                        }
                        $good = true;
                    }
                }
                if(!$good){
                    $index = rand(0, sizeof($error_messages)-1);
                    $response = $error_messages[$index];
                }
                
            }else{
                $response = "Tricheur de ses morts";
            }
        }else{
            if($num == sizeof($quest)){
                if($message == "0" && $token=="Kj_9PoqS"){
                    $status = 1;
                    $rsod = true;
                    $token = "FINAL_LINE_12387@";
                    $response = "";
                }else if($token!="Kj_9PoqS"){
                    $response = "Sale tricheur";
                }else{
                    $response = "SYSTEM FAILURE";
                }
            }else if($num == sizeof($quest)+1){
                if($message == "123456789" && $token=="FINAL_LINE_12387@"){
                    $status = 1;
                    $gsod = true;
                    $token = "";
                    $response = "Fin du quiz !";
                }else if($token!="FINAL_LINE_12387@"){
                    $response = "Sale tricheur";
                }else{
                    $response = "SYSTEM FAILURE";
                }
            }else{
                $response = "Ce quiz est déjà terminé !";
            }
        }
    }

    if($status == 0){
        echo '{"status":'.$status.',"message":"'.$response.'"}';
    }else if($bsod){
        echo '{"status":'.$status.',"message":"'.$response.'","BSOD":"ON","token":"'.$token.'"}';
    }else if($rsod){
        echo '{"status":'.$status.',"message":"'.$response.'","RSOD":"ON","token":"'.$token.'"}';
    }else if($gsod){
        echo '{"status":'.$status.',"message":"'.$response.'","GSOD":"ON","token":"'.$token.'"}';
    }else{
        echo '{"status":'.$status.',"message":"'.$response.'","token":"'.$token.'"}';
    }
    

?>
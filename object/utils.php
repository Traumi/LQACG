<?php

    function getTrophyLevel($i){
        switch($i){
            case 0 :
                $level="wood";
                break;
            case 1 :
                $level="iron";
                break;
            case 2 :
                $level="bronze";
                break;
            case 3 :
                $level="silver";
                break;
            case 4 :
                $level="gold";
                break;
            case 5 :
                $level="platinum";
                break;
            default :
                $level="base";
                break;
        }
        return $level;
    }

    function getTrophyLevelName($i){
        switch($i){
            case 0 :
                $nlvl = "Bois";
                break;
            case 1 :
                $nlvl = "Fer";
                break;
            case 2 :
                $nlvl = "Bronze";
                break;
            case 3 :
                $nlvl = "Argent";
                break;
            case 4 :
                $nlvl = "Or";
                break;
            case 5 :
                $nlvl = "Platine";
                break;
            default :
                $nlvl = "/";
                break;
        }
        return $nlvl;
    }

?>
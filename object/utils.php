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

    function display_stars($i){
        if($i >= 1){
            echo '
            <g transform="translate(450,410)">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="94" viewbox="0 0 260 245">
                    <path d="m55,237 74-228 74,228L9,96h240"/>
                </svg>
            </g>';
        }
        if($i >= 2){
            echo '
            <g transform="translate(325,375)">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="94" viewbox="0 0 260 245">
                    <path d="m55,237 74-228 74,228L9,96h240"/>
                </svg>
            </g>
            <g transform="translate(575,375)">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="94" viewbox="0 0 260 245">
                    <path d="m55,237 74-228 74,228L9,96h240"/>
                </svg>
            </g>';
        }
        if($i >= 3){
            echo '
            <g transform="translate(235,300)">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="94" viewbox="0 0 260 245">
                    <path d="m55,237 74-228 74,228L9,96h240"/>
                </svg>
            </g>
            <g transform="translate(665,300)">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="94" viewbox="0 0 260 245">
                    <path d="m55,237 74-228 74,228L9,96h240"/>
                </svg>
            </g>';
        }
        if($i >= 4){
            echo '
            <g transform="translate(200,190)">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="94" viewbox="0 0 260 245">
                    <path d="m55,237 74-228 74,228L9,96h240"/>
                </svg>
            </g>
            <g transform="translate(700,190)">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="94" viewbox="0 0 260 245">
                    <path d="m55,237 74-228 74,228L9,96h240"/>
                </svg>
            </g>';
        }
    }

?>
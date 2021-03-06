<svg width="0" height="0">
    <defs>
        <filter id="dropshadow2" height="1000%" width="1000%">
            <feGaussianBlur in="SourceGraphic" stdDeviation="15"/>
            <feOffset dx="0" dy="0" result="offsetblur"/>
            <feComponentTransfer>
                <feFuncA type="linear" slope="2.25"/>
            </feComponentTransfer>
            <feMerge>
                <feMergeNode/>
                <feMergeNode in="SourceGraphic"/>
            </feMerge>
        </filter>
        <filter id="dropshadow" height="130%">
            <feGaussianBlur in="SourceGraphic" stdDeviation="10"/>
            <feOffset dx="0" dy="0" result="offsetblur"/>
            <feComponentTransfer>
                <feFuncA type="linear" slope="1"/>
            </feComponentTransfer>
            <feMerge>
                <feMergeNode/>
                <feMergeNode in="SourceGraphic"/>
            </feMerge>
        </filter>
    </defs>
</svg>
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
            case 6 :
                $level="master";
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
            case 6 :
                $nlvl = "Master";
                break;
            default :
                $nlvl = "/";
                break;
        }
        return $nlvl;
    }

    function display_stars($i){
        if($i >= 1 && $i < 5){
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
        if($i >= 4 && $i < 6){
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
        if($i == 5){
            echo '
            <g transform="translate(420,375)">
                <svg xmlns="http://www.w3.org/2000/svg" width="160" height="150" viewbox="0 0 260 245">
                    <path d="m55,237 74-228 74,228L9,96h240"/>
                </svg>
            </g>';
        }
        if($i == 6){
            echo '
            <g transform="translate(420,375)">
                <svg xmlns="http://www.w3.org/2000/svg" width="160" height="150" viewbox="0 0 260 245">
                    <path d="m55,237 74-228 74,228L9,96h240" class="master_star"  style="filter:url(#dropshadow2)"/>
                </svg>
            </g>
            <g transform="translate(200,190)">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="94" viewbox="0 0 260 245">
                    <path d="m55,237 74-228 74,228L9,96h240" class="master_star"/>
                </svg>
            </g>
            <g transform="translate(700,190)">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="94" viewbox="0 0 260 245">
                    <path d="m55,237 74-228 74,228L9,96h240" class="master_star"/>
                </svg>
            </g>';
        }
    }

?>
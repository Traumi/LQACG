<?php
    $site = new Site();

    isset($_SESSION["login"]) ? $login = $_SESSION["login"] : header("Location: index.php");
    $acc = new Account($login);
    
    $profil = $acc->get_profil();
    if($profil == null){
        header("Location: index.php");
    }
    if($profil['TPC'] == ""){
        header("Location: accueil.php");
    }
    if($profil['LOL_ACCOUNT'] == ""){
        header("Location: accueil.php");
    }

    $pseudo = $profil['LOL_ACCOUNT'];
    $lol_profil = $acc->getLoLAccount($pseudo);

?>

<?php

    $request = file_get_contents("https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/".$pseudo."?api_key=".$site->key);
    $player = json_decode($request, true);
    //var_dump($player);
    $request = file_get_contents("https://euw1.api.riotgames.com/lol/match/v4/matchlists/by-account/".$player['accountId']."?endIndex=100&beginIndex=0&api_key=".$site->key);
    $matches = json_decode($request, true);

    $last_update = new DateTime($lol_profil['LAST_UPDATE']);
    $now = new DateTime();

    $beginIndex = 100;
    $diff = $now->getTimestamp() - $last_update->getTimestamp();
    if($diff > 240){
        $continue = true;
        while($continue){
            for($i = 0 ; $i < 100 ; ++$i){
                if(!file_exists("./data/matches/".$matches['matches'][$i]['gameId'].".json")){
                    $request = file_get_contents("https://euw1.api.riotgames.com/lol/match/v4/matches/".$matches['matches'][$i]['gameId']."?api_key=".$site->key);
                    if($request != ""){
                        $myfile = fopen("./data/matches/".$matches['matches'][$i]['gameId'].".json", "w");
                        fwrite($myfile, $request);
                        fclose($myfile);
                    }
                    sleep(0.75);
                }
        
                $request = file_get_contents("./data/matches/".$matches['matches'][$i]['gameId'].".json");
                $match = json_decode($request, true);
        
                $date = new DateTime();
                $date->setTimestamp(floor($match['gameCreation']/1000));
                $diff = $date->getTimestamp() - $last_update->getTimestamp();
    
                if($diff < 0){
                    $continue = false;
                    break;
                } 
        
                foreach($match['participantIdentities'] as $values){
                    if($player['accountId'] == $values["player"]["accountId"]){
                        $id = $values["participantId"];
                    }
                }
        
                foreach($match['participants'] as $values){
                    if($id == $values["participantId"]){
                        $lol_profil['QUADRA'] += $values['stats']['quadraKills'];
                        $lol_profil['PENTA'] += $values['stats']['pentaKills'];
                        $lol_profil['FARM'] += ($values['stats']['totalMinionsKilled'] + $values['stats']['neutralMinionsKilled']);
                        $lol_profil['TOWER'] += $values['stats']['turretKills'];
                        $lol_profil['INHIB'] += $values['stats']['inhibitorKills'];
                    }
                }
            }
            $request = file_get_contents("https://euw1.api.riotgames.com/lol/match/v4/matchlists/by-account/".$player['accountId']."?endIndex=".($beginIndex+100)."&beginIndex=".$beginIndex."&api_key=".$site->key);
            $matches = json_decode($request, true);
            $beginIndex += 100;
            //$continue = false;
        }
        
        $acc->update_lol_profile($lol_profil);
    }
        
    //var_dump($lol_profil);

    //Affichage des trophées
    $levels_values = json_decode(file_get_contents("./data/static/levels.json"),true);
    
    ?>

    <div class="row">
        <!-- FARM -->
        <?php 
            for($i = 0 ; $i < 6 ; ++$i){
                if($levels_values["farm"][$i] > $lol_profil['FARM']){
                    $i -= 1;
                    break;
                }
                
            }
            ($i != -1) ? $level_value = $levels_values["farm"][$i] : $level_value = 0;
            $level=getTrophyLevel($i);
            $nlvl=getTrophyLevelName($i);
            if($i >= 0){
        ?>
        <div class="col-2  <?php echo $level; ?>">
            <svg viewbox="0 0 1000 1000" style="width:100%;">
                <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
                <image xlink:href="./images/minions/<?php echo $level; ?>.png" x="100" y="50" height="450" width="800" /> 
                <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
                <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['FARM']; ?></text>
                <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Farm : <?php echo $nlvl ?></text>
                <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["farm"][$i+1] ?></text>
            </svg>
        </div>
        <?php } ?>
        <!-- TOWER -->
        <?php 
            for($i = 0 ; $i < 6 ; ++$i){
                if($levels_values["tower"][$i] > $lol_profil['TOWER']){
                    $i -= 1;
                    break;
                }
                
            }
            ($i != -1) ? $level_value = $levels_values["tower"][$i] : $level_value = 0;
            $level=getTrophyLevel($i);
            $nlvl=getTrophyLevelName($i);
            if($i >= 0){
        ?>
        <div class="col-2  <?php echo $level; ?>">
            <svg viewbox="0 0 1000 1000" style="width:100%;">
                <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
                <image xlink:href="./images/minions/<?php echo $level; ?>.png" x="100" y="50" height="450" width="800" /> 
                <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
                <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['TOWER']; ?></text>
                <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Tower : <?php echo $nlvl ?></text>
                <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["tower"][$i+1] ?></text>
            </svg>
        </div>
        <?php } ?>
        <!-- INHIB -->
        <?php 
            for($i = 0 ; $i < 6 ; ++$i){
                if($levels_values["inhib"][$i] > $lol_profil['INHIB']){
                    $i -= 1;
                    break;
                }
                
            }
            ($i != -1) ? $level_value = $levels_values["inhib"][$i] : $level_value = 0;
            $level=getTrophyLevel($i);
            $nlvl=getTrophyLevelName($i);
            if($i >= 0){
        ?>
        <div class="col-2  <?php echo $level; ?>">
            <svg viewbox="0 0 1000 1000" style="width:100%;">
                <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
                <image xlink:href="./images/minions/<?php echo $level; ?>.png" x="100" y="50" height="450" width="800" /> 
                <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
                <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['INHIB']; ?></text>
                <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Inhibitors : <?php echo $nlvl ?></text>
                <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["inhib"][$i+1] ?></text>
            </svg>
        </div>
        <?php } ?>
        <!-- PENTA -->
        <?php 
            for($i = 0 ; $i < 6 ; ++$i){
                if($levels_values["penta"][$i] > $lol_profil['PENTA']){
                    $i -= 1;
                    break;
                }
                
            }
            ($i != -1) ? $level_value = $levels_values["penta"][$i] : $level_value = 0;
            $level=getTrophyLevel($i);
            $nlvl=getTrophyLevelName($i);
            if($i >= 0){
        ?>
        <div class="col-2  <?php echo $level; ?>">
            <svg viewbox="0 0 1000 1000" style="width:100%;">
                <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
                <image xlink:href="./images/penta/<?php echo $level; ?>.png" x="100" y="50" height="500" width="800" /> 
                <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
                <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['PENTA']; ?></text>
                <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Penta : <?php echo $nlvl ?></text>
                <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["penta"][$i+1] ?></text>
            </svg>
        </div>
        <?php } ?>
        <!-- QUADRA -->
        <?php 
            for($i = 0 ; $i < 6 ; ++$i){
                if($levels_values["quadra"][$i] > $lol_profil['QUADRA']){
                    $i -= 1;
                    break;
                }
                
            }
            ($i != -1) ? $level_value = $levels_values["quadra"][$i] : $level_value = 0;
            $level=getTrophyLevel($i);
            $nlvl=getTrophyLevelName($i);
            if($i >= 0){
        ?>
        <div class="col-2  <?php echo $level; ?>">
            <svg viewbox="0 0 1000 1000" style="width:100%;">
                <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
                <image xlink:href="./images/quadra/<?php echo $level; ?>.png" x="100" y="0" height="650" width="800" /> 
                <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
                <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['QUADRA']; ?></text>
                <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Quadra : <?php echo $nlvl ?></text>
                <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["quadra"][$i+1] ?></text>
            </svg>
        </div>
        <?php } ?>
    </div>

    <?php

         // Can have a use later : ["combatPlayerScore"]=> int(0) ["objectivePlayerScore"]=> int(0) ["totalPlayerScore"]=> int(0) ["totalScoreRank"]=> int(0) ["playerScore0"]=> int(0) ["playerScore1"]=> int(0) ["playerScore2"]=> int(0) ["playerScore3"]=> int(7) ["playerScore4"]=> int(0) ["playerScore5"]=> int(0) ["playerScore6"]=> int(0) ["playerScore7"]=> int(0) ["playerScore8"]=> int(0) ["playerScore9"]=> int(0) ["perk0"]=> int(8128) ["perk0Var1"]=> int(1102) ["perk0Var2"]=> int(17) ["perk0Var3"]=> int(521) ["perk1"]=> int(8126) ["perk1Var1"]=> int(493) ["perk1Var2"]=> int(0) ["perk1Var3"]=> int(0) ["perk2"]=> int(8138) ["perk2Var1"]=> int(30) ["perk2Var2"]=> int(0) ["perk2Var3"]=> int(0) ["perk3"]=> int(8106) ["perk3Var1"]=> int(5) ["perk3Var2"]=> int(0) ["perk3Var3"]=> int(0) ["perk4"]=> int(8236) ["perk4Var1"]=> int(48) ["perk4Var2"]=> int(0) ["perk4Var3"]=> int(0) ["perk5"]=> int(8224) ["perk5Var1"]=> int(957) ["perk5Var2"]=> int(0) ["perk5Var3"]=> int(0) ["perkPrimaryStyle"]=> int(8100) ["perkSubStyle"]=> int(8200) ["statPerk0"]=> int(5008) ["statPerk1"]=> int(5008) ["statPerk2"]=> int(5001) } ["timeline"]=> array(7) { ["participantId"]=> int(7) ["creepsPerMinDeltas"]=> array(2) { ["10-20"]=> float(2.1) ["0-10"]=> float(0.6) } ["xpPerMinDeltas"]=> array(2) { ["10-20"]=> float(1149.2) ["0-10"]=> float(630.2) } ["goldPerMinDeltas"]=> array(2) { ["10-20"]=> float(651.1) ["0-10"]=> float(402.5) } ["damageTakenPerMinDeltas"]=> array(2) { ["10-20"]=> float(1952.8) ["0-10"]=> float(831.1) } ["role"]=> string(11) "DUO_SUPPORT" ["lane"]=> string(6) "MIDDLE"
            /*
                DOC MATCH CONTENT
                teamId (100/200)
                championId
                spell1Id spell2Id
                highestAchievedSeasonTier
                ['stats'] => 
                participantId win champLevel
                item0 item1 item2 item3 item4 item5 item6
                kills deaths assists
                largestKillingSpree largestMultiKill killingSprees
                longestTimeSpentLiving
                doubleKills tripleKills quadraKills pentaKills unrealKills
                totalDamageDealt magicDamageDealt physicalDamageDealt trueDamageDealt largestCriticalStrike 
                totalDamageDealtToChampions magicDamageDealtToChampions physicalDamageDealtToChampions trueDamageDealtToChampions
                totalHeal totalUnitsHealed damageSelfMitigated
                damageDealtToObjectives damageDealtToTurrets
                visionScore visionWardsBoughtInGame sightWardsBoughtInGame
                timeCCingOthers totalTimeCrowdControlDealt
                totalDamageTaken magicalDamageTaken physicalDamageTaken trueDamageTaken
                goldEarned goldSpent
                turretKills inhibitorKills
                totalMinionsKilled neutralMinionsKilled
                firstBloodKill firstBloodAssist firstTowerKill firstTowerAssist firstInhibitorKill firstInhibitorAssist
            */
?>
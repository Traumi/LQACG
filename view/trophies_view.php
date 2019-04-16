<?php
    $site = new Site();

    $champions = json_decode(file_get_contents("./ddragon/9.7.1/data/fr_FR/championFull.json"),true);

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

    $banGames = array(83,800,810,820,830,840,850,1030,1040,1050,1060,1070);

    if($diff > 240){
        $continue = true;
        while($continue){
            for($i = 0 ; $i < 100 ; ++$i){
                if(in_array($matches['matches'][$i]['queue'], $banGames)){
                    continue;
                }
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
                //TODO : Retirer les coop vs AI
        
                foreach($match['participantIdentities'] as $values){
                    if($player['accountId'] == $values["player"]["accountId"]){
                        $id = $values["participantId"];
                    }
                }
        
                foreach($match['participants'] as $values){
                    if($id == $values["participantId"]){

                        //KDA MEANS A LOT
                        $lol_profil['ASSIST'] += $values['stats']['assists'];
                        $lol_profil['DEATH'] += $values['stats']['deaths'];

                        //Multikills
                        $lol_profil['SIMPLE_KILL'] += $values['stats']['kills'];
                        $lol_profil['DOUBLE_KILL'] += $values['stats']['doubleKills'];
                        $lol_profil['TRIPLE_KILL'] += $values['stats']['tripleKills'];
                        $lol_profil['QUADRA'] += $values['stats']['quadraKills'];
                        $lol_profil['PENTA'] += $values['stats']['pentaKills'];

                        //Farm
                        $lol_profil['FARM'] += ($values['stats']['totalMinionsKilled'] + $values['stats']['neutralMinionsKilled']);
                        $lol_profil['TOWER'] += $values['stats']['turretKills'];
                        $lol_profil['INHIB'] += $values['stats']['inhibitorKills'];

                        //History
                        $lol_profil['GAMES'] += 1;
                        foreach($match['teams'] as $team){
                            if($values['teamId'] == $team['teamId']){
                                if($team['win'] == "Win") $lol_profil['WIN'] += 1;
                                //Teamwork
                                $lol_profil['T_RiftHerald'] += $team['riftHeraldKills'];
                                $lol_profil['T_Drake'] += $team['dragonKills'];
                                $lol_profil['T_Baron'] += $team['baronKills'];
                                $lol_profil['T_Vilemaw'] += $team['vilemawKills'];
                            }
                        }

                        

                        //Roles
                        foreach($champions['data'] as $champ){
                            if($champ['key'] == $values['championId']){
                                foreach($champ['tags'] as $tag){
                                    switch($tag){
                                        case "Mage" :
                                            $lol_profil['MAGE'] += 1;
                                            break;
                                        case "Tank" :
                                            $lol_profil['TANK'] += 1;
                                            break;
                                        case "Fighter" :
                                            $lol_profil['FIGHTER'] += 1;
                                            break;
                                        case "Support" :
                                            $lol_profil['SUPPORT'] += 1;
                                            break;
                                        case "Assassin" :
                                            $lol_profil['ASSASSIN'] += 1;
                                            break;
                                        case "Marksman" :
                                            $lol_profil['MARKSMAN'] += 1;
                                            break;
                                    }
                                }
                                break;
                            } 
                        }
                    }
                }
            }
            $request = file_get_contents("https://euw1.api.riotgames.com/lol/match/v4/matchlists/by-account/".$player['accountId']."?endIndex=".($beginIndex+100)."&beginIndex=".$beginIndex."&api_key=".$site->key);
            $matches = json_decode($request, true);
            $beginIndex += 100;
        }
        
        $acc->update_lol_profile($lol_profil);
    }
        
    //var_dump($lol_profil);

    //Affichage des trophées
    $levels_values = json_decode(file_get_contents("./data/static/levels.json"),true);
    $level_max = 6;
    ?>
    <div class="row" style="width:90%;margin:auto;">
        <div class="col-12"><h3 class="text-center">In Game</h3></div>
        <div class="col-12">
            <h5 class="text-center">Farming</h5>
            <div class="row trophy-table">
                <?php require_once("./view/trophies/trophy_farming.php") ?>
            </div>
        </div>
        <div class="col-12">
            <h5 class="text-center">Multikill</h5>
            <div class="row trophy-table">
                <?php require_once("./view/trophies/trophy_multikill.php") ?>
            </div>
        </div>
        <div class="col-12">
            <h5 class="text-center">KDA</h5>
            <div class="row trophy-table">
                <?php require_once("./view/trophies/trophy_kda.php") ?>
            </div>
        </div>
        <div class="col-12">
            <h5 class="text-center">Roles</h5>
            <div class="row trophy-table">
                <?php require_once("./view/trophies/trophy_role.php") ?>
            </div>
        </div>

        <!--
            UPDATE lol_profile 
            SET `LAST_UPDATE` = '2018-12-01 00:00:00',`PENTA`=0, `FARM`=0, `QUADRA`=0, `TRIPLE_KILL`=0, `DOUBLE_KILL`=0, `SIMPLE_KILL`=0, `DEATH`=0, `ASSIST`=0, 
            `TOWER`=0, `INHIB`=0, `TANK`=0, `SUPPORT`=0, `MARKSMAN`=0, `MAGE`=0, `FIGHTER`=0, `ASSASSIN`=0, `WIN`=0, `GAMES`=0,
            `T_RiftHerald`=0, `T_Drake`=0, `T_Baron`=0, `T_Vilemaw`=0
            WHERE `PSEUDO`='Traumination'
        -->
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
<?php
    $site = new Site();
    $quests = new Quests();

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

?>
<div class="row justify-content-center">
    <div class="col-lg-8 col-sm-10">
        <h3 class="text-center">Quètes</h3>
        <table class="table table-hover">
            <thead>
                <tr><th>Id</th><th>Description</th><th>XP</th><th>Expire</th><th>Condition</th></tr>
            </thead>
            <tbody>
                <?php
                foreach ($quests->quests as $value){
                ?>
                <tr>
                    <td><?php echo $value['ID'] ?></td>
                    <td><?php echo $value['DESCRIPTION'] ?></td>
                    <td><?php echo $value['XP'] ?></td>
                    <td><?php echo $value['EXPIRE'] ?></td>
                    <td><?php echo $value['COND'] ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php

    $request = file_get_contents("https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/".$pseudo."?api_key=".$site->key);
    $player = json_decode($request, true);
    //var_dump($player);
    $request = file_get_contents("https://euw1.api.riotgames.com/lol/match/v4/matchlists/by-account/".$player['accountId']."?api_key=".$site->key);
    $matches = json_decode($request, true);
    
    for($i = 0 ; $i < 2 ; ++$i){
        if(!file_exists("./data/matches/".$matches['matches'][$i]['gameId'].".json")){
            $request = file_get_contents("https://euw1.api.riotgames.com/lol/match/v4/matches/".$matches['matches'][$i]['gameId']."?api_key=".$site->key);
            $myfile = fopen("./data/matches/".$matches['matches'][$i]['gameId'].".json", "w");
            fwrite($myfile, $request);
            fclose($myfile);
            sleep(0.5);
        }
        $request = file_get_contents("./data/matches/".$matches['matches'][$i]['gameId'].".json");
        $match = json_decode($request, true);
        var_dump($match);
        echo '<br/>';
        
    }
?>

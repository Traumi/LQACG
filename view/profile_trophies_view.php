<?php
    $site = new Site();

    isset($_GET['pseudo'])? $pseudo = $_GET['pseudo'] : header("Location: index.php");

    $champions = json_decode(file_get_contents("./ddragon/9.7.1/data/fr_FR/championFull.json"),true);

    isset($_SESSION["login"]) ? $login = $_SESSION["login"] : header("Location: index.php");
    $acc = new Account($login);

    $pseudo = str_replace(" ","",$pseudo);
    $lol_profil = $acc->getLoLAccount($pseudo);

    if($lol_profil == false) header("Location: index.php");

?>

<?php

    $request = file_get_contents("https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/".$pseudo."?api_key=".$site->key);
    $player = json_decode($request, true);
        
    //var_dump($player);

    //Affichage des trophées
    $levels_values = json_decode(file_get_contents("./data/static/levels.json"),true);
    $level_max = 6;
    ?>
    <div class="row" style="width:90%;margin:auto;">
        <div class="col-12"><h3 class="text-center">Profil de <?php echo $player['name']; ?></h3></div>
        <div class="col-12">
            <h5 class="text-center">Match history</h5>
            <div class="row trophy-table">
                <?php require_once("./view/trophies/trophy_history.php") ?>
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
        <div class="col-12">
            <h5 class="text-center">Multikill</h5>
            <div class="row trophy-table">
                <?php require_once("./view/trophies/trophy_multikill.php") ?>
            </div>
        </div>
        <div class="col-12">
            <h5 class="text-center">Teamwork</h5>
            <div class="row trophy-table">
                <?php require_once("./view/trophies/trophy_teamwork.php") ?>
            </div>
        </div>
        <div class="col-12">
            <h5 class="text-center">Farming</h5>
            <div class="row trophy-table">
                <?php require_once("./view/trophies/trophy_farming.php") ?>
            </div>
        </div>
    </div>

    <?php
?>
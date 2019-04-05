<div>
    <h3>Mon profil</h3>

    <?php

        $site = new Site();

        isset($_SESSION["login"]) ? $login = $_SESSION["login"] : header("Location: index.php");
        $acc = new Account($login);
        
        $profil = $acc->get_profil();
        if($profil == null){
            header("Location: index.php");
        }
        if($profil['TPC'] == ""){
            $profil['TPC'] = $acc->generate_tpc($login);
        }


        if(isset($_POST["pseudo"])){
            $pseudo = str_replace(" ", "", $_POST["pseudo"]); 
            $request = file_get_contents("https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/".$pseudo."?api_key=".$site->key);
            $player = json_decode($request, true);
            //var_dump($player);
            $request = file_get_contents("https://euw1.api.riotgames.com/lol/platform/v4/third-party-code/by-summoner/".$player['id']."?api_key=".$site->key);
            $tpc = json_decode($request, true);
            var_dump($tpc);
        }
        
        //file_get_contents('https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/'.$pseudo.'?api_key='.$key

        if($profil['LOL_ACCOUNT'] == null){
    ?>
        <div>
            <h4>Associer votre compte : </h4>
            <p>- Votre Third-Party-Code : <input value="<?php echo $profil['TPC']; ?>" onclick="this.focus();this.select()" readonly="readonly"/></p>
            <p>Pour associer votre compte LoL :</p>
             <!-- Mémo pour savoir où mettre les balises UL et LI : Il manque ul sur ton li -->
            <ul>
                <li>Aller dans le client LoL</li>
                <li>Aller dans Paramètres > Vérification</li>
                <li>Coller le Third-Party-Code</li>
                <li>Entrer votre pseudo ici puis valider</li>
            </ul>
            <form action="" method="post">
                <input name="pseudo" placeholder="Pseudo LoL"/>
                <input type="submit"/>
            </form>
        </div>
    <?php
        }else{
    ?>
        <div>
            <h4>Quêtes et challenges :</h4>
            <ul>
                <li>Quêtes effectuées : 0</li>
                <li>Challenges gagnés : 0</li>
            </ul>
        </div>
        <div>
            <h4>Succès :</h4>
            KEDAL
        </div>
        <div>
            <h4>Développeur :</h4>
            <p>Clé de développement : ##############</p>
        </div>
    <?php
        }
    ?>

    

</div>
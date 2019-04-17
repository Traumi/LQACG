<div>
    <h3 class="text-center">Mon profil</h3>

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
            $request = file_get_contents("https://euw1.api.riotgames.com/lol/platform/v4/third-party-code/by-summoner/".$player['id']."?api_key=".$site->key);
            $tpc = json_decode($request, true);
            if($tpc == $profil['TPC']){
                $acc->setLoLAccount($pseudo, $tpc);
                $profil = $acc->get_profil();
            }
        }

        if($profil['LOL_ACCOUNT'] == null){
    ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <h4>Associer votre compte : </h4>
                <div>
                    <div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="font-weight:500;">Third Party Code</span>
                            </div>
                            <input value="<?php echo $profil['TPC']; ?>" id="tpc" type="text" class="form-control" placeholder="Third Party Code" onclick="this.focus();this.select()" readonly="readonly">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" onclick="copy_tpc()" type="button">Copier</button>
                            </div>
                        </div>
                        <script>
                            function copy_tpc() {
                            /* Get the text field */
                            var copyText = document.getElementById("tpc");
                            copyText.select();
                            document.execCommand("copy");
                            }
                        </script>
                    </div>
                    
                </div>
                <p>Pour associer votre compte LoL :</p>
                <!-- Mémo pour savoir où mettre les balises <ul> et <li> : Il manque ul sur ton li -->
                <ul>
                    <li>Aller dans le client LoL</li>
                    <li>Aller dans Paramètres > Vérification</li>
                    <li>Coller le Third-Party-Code</li>
                    <li>Entrer votre pseudo ici puis valider</li>
                </ul>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="font-weight:500;">Pseudo</span>
                        </div>
                        <input name="pseudo" type="text" class="form-control" placeholder="Pseudo LoL">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" onclick="copy_tpc()" type="button">Valider</button>
                        </div>
                    </div>
                </form>
            </div>
            
            
            
        </div>
    <?php
        }else{
            $pseudo = str_replace(" ", "", $profil['LOL_ACCOUNT']);
    ?>
        <div>
            <h4>Quêtes et challenges :</h4>
            <ul>
                <li>Quêtes effectuées : 0</li>
                <li>Challenges gagnés : 0</li>
            </ul>
        </div>
        <div>
            Accédez à vos succès en cliquant sur votre pseudo (en haut à droite) puis trophées.
        </div>
        <div>
            <h4>Développeur :</h4>
            <p>Clé de développement : ##############</p>
        </div>
        <div style="height:200vh;"></div>
    <?php
        }
    ?>

    

</div>
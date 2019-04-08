<header style="margin-bottom:60px;">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="accueil.php">LQACG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ">
            <!--<li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>-->
            <?php  
                if(isset($_SESSION["login"])){
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION["login"]; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="accueil.php">Mon profil</a>
                    <a class="dropdown-item" href="quests.php">Quètes</a>
                    <a class="dropdown-item" href="disconnect.php">Déconnexion</a>
                </div>
            </li>
            <?php
                }
            ?>
            </ul>
        </div>
    </nav>
</header>
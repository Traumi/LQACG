<header>
    <?php  
        if(isset($_SESSION["login"])){
            echo $_SESSION["login"];
            echo '<a href="disconnect.php"><button>Déconnexion</button></a>';
        }
    ?>
    
</header>
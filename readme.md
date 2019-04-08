# LQACG
LoL Quest And Challenges Generator
## Use
- Create a "site.php" file in object folder and paste this : 
```PHP
<?php

    class Site{
        public function __construct() {
            $this->version = "0.1";
            $this->riotPatch = "9.6.1";
            $this->key = "YOUR-API-KEY";
        }
    }
    
?>
```
- Add a ddragon folder and paste your patch version of ddragon : [https://ddragon.leagueoflegends.com/cdn/dragontail-9.7.1.tgz](9.7.1 Patch)
- Create a database with the sql file available here
- Simply run it on an Apache Server

## API 
- Will be implemented yet, you'll have to submit for an access to it, then you'll have a development key
# LQACG
LoL Quest And Challenges Generator
## Use
- Create a "site.php" file in object folder and paste this : 
```PHP
<?php

    class Site{
        public function __construct() {
            $this->version = "0.1";
            $this->riotPatch = "9.7.1";
            $this->key = "YOUR-API-KEY";
        }
    }
    
?>
```
- Add a ddragon folder and paste your patch version of ddragon : [9.7.1 Patch](https://ddragon.leagueoflegends.com/cdn/dragontail-9.7.1.tgz)
- Create a database with the sql file available here
- Simply run it on an Apache Server

## API 
- Not implemented yet, you'll have to submit for an access to it, then you'll have a development key

## Versions releases
| Version |    Date   |                       Content                         |
|:-------:|:---------:|:-----------------------------------------------------:|
|         |SUSPENDED  |Link between data and quests.                          |
|0.3      |IN PROGRESS|Trophies.                                              |
|0.2      |09/04/2019 |Quests display, API use & first values.                |
|0.1      |08/04/2019 |Project initialization, basical functionnalities added.|
<!-- ASSASSIN -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["role"][$i] > $lol_profil['ASSASSIN']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["role"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2 trophy <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <defs><filter id="dropshadow" height="130%"><feGaussianBlur in="SourceGraphic" stdDeviation="8"/><feOffset dx="0" dy="0" result="offsetblur"/><feComponentTransfer><feFuncA type="linear" slope="1"/></feComponentTransfer><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/></feMerge></filter></defs>
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <image xlink:href="./images/roles/assassin/<?php echo $level; ?>.png" x="100" y="70" height="250" width="800" style="filter:url(#dropshadow)" />
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['ASSASSIN']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Assassin : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["role"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- FIGHTER -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["role"][$i] > $lol_profil['FIGHTER']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["role"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2 trophy <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <defs><filter id="dropshadow" height="130%"><feGaussianBlur in="SourceGraphic" stdDeviation="8"/><feOffset dx="0" dy="0" result="offsetblur"/><feComponentTransfer><feFuncA type="linear" slope="1"/></feComponentTransfer><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/></feMerge></filter></defs>
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <image xlink:href="./images/roles/fighter/<?php echo $level; ?>.png" x="100" y="70" height="250" width="800" style="filter:url(#dropshadow)" />
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['FIGHTER']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Combattant : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["role"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- MAGE -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["role"][$i] > $lol_profil['MAGE']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["role"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2 trophy <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <defs><filter id="dropshadow" height="130%"><feGaussianBlur in="SourceGraphic" stdDeviation="8"/><feOffset dx="0" dy="0" result="offsetblur"/><feComponentTransfer><feFuncA type="linear" slope="1"/></feComponentTransfer><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/></feMerge></filter></defs>
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <image xlink:href="./images/roles/mage/<?php echo $level; ?>.png" x="100" y="70" height="250" width="800" style="filter:url(#dropshadow)" />
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['MAGE']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Mage : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["role"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- MARKSMAN -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["role"][$i] > $lol_profil['MARKSMAN']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["role"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2 trophy <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <defs><filter id="dropshadow" height="130%"><feGaussianBlur in="SourceGraphic" stdDeviation="8"/><feOffset dx="0" dy="0" result="offsetblur"/><feComponentTransfer><feFuncA type="linear" slope="1"/></feComponentTransfer><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/></feMerge></filter></defs>
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <image xlink:href="./images/roles/marksman/<?php echo $level; ?>.png" x="100" y="70" height="250" width="800" style="filter:url(#dropshadow)" />
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['MARKSMAN']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Tireur : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["role"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- SUPPORT -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["role"][$i] > $lol_profil['SUPPORT']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["role"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2 trophy <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <defs><filter id="dropshadow" height="130%"><feGaussianBlur in="SourceGraphic" stdDeviation="8"/><feOffset dx="0" dy="0" result="offsetblur"/><feComponentTransfer><feFuncA type="linear" slope="1"/></feComponentTransfer><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/></feMerge></filter></defs>
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <image xlink:href="./images/roles/support/<?php echo $level; ?>.png" x="100" y="70" height="250" width="800" style="filter:url(#dropshadow)" />
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['SUPPORT']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Support : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["role"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- TANK -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["role"][$i] > $lol_profil['TANK']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["role"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2 trophy <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <defs><filter id="dropshadow" height="130%"><feGaussianBlur in="SourceGraphic" stdDeviation="8"/><feOffset dx="0" dy="0" result="offsetblur"/><feComponentTransfer><feFuncA type="linear" slope="1"/></feComponentTransfer><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/></feMerge></filter></defs>
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <image xlink:href="./images/roles/tank/<?php echo $level; ?>.png" x="100" y="70" height="250" width="800" style="filter:url(#dropshadow)" />
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['TANK']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Tank : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["role"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- RIFT HERALD -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["riftherald"][$i] > $lol_profil['T_RiftHerald']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["riftherald"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-6 col-sm-4 col-md-3 col-xl-2 <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <image xlink:href="./images/herald/<?php echo $level; ?>.png" x="100" y="50" height="315" width="800" style="filter:url(#dropshadow)" />
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['T_RiftHerald']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Rift Herald : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["riftherald"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- DRAKES -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["drake"][$i] > $lol_profil['T_Drake']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["drake"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-6 col-sm-4 col-md-3 col-xl-2 <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <image xlink:href="./images/drake/<?php echo $level; ?>.png" x="100" y="50" height="315" width="800" style="filter:url(#dropshadow)" />
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['T_Drake']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Dragons : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["drake"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- BARON -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["baron"][$i] > $lol_profil['T_Baron']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["baron"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-6 col-sm-4 col-md-3 col-xl-2 <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <image xlink:href="./images/baron/<?php echo $level; ?>.png" x="100" y="50" height="315" width="800" style="filter:url(#dropshadow)" />
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['T_Baron']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Barons : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["baron"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- VILEMAW -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["vilemaw"][$i] > $lol_profil['T_Vilemaw']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["vilemaw"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-6 col-sm-4 col-md-3 col-xl-2 <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <image xlink:href="./images/vilemaw/<?php echo $level; ?>.png" x="100" y="50" height="315" width="800" style="filter:url(#dropshadow)" />
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['T_Vilemaw']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Vilemaw : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["vilemaw"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
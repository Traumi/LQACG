<!-- FARM -->
<?php 
    for($i = 0 ; $i < 6 ; ++$i){
        if($levels_values["farm"][$i] > $lol_profil['FARM']){
            $i -= 1;
            break;
        }
        
    }
    ($i != -1) ? $level_value = $levels_values["farm"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2 trophy <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <image xlink:href="./images/minions/<?php echo $level; ?>.png" x="100" y="50" height="450" width="800" /> 
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['FARM']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Farm : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["farm"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- TOWER -->
<?php 
    for($i = 0 ; $i < 6 ; ++$i){
        if($levels_values["tower"][$i] > $lol_profil['TOWER']){
            $i -= 1;
            break;
        }
        
    }
    ($i != -1) ? $level_value = $levels_values["tower"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2  <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <!--<image xlink:href="./images/minions/<?php echo $level; ?>.png" x="100" y="50" height="450" width="800" /> -->
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['TOWER']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Tower : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["tower"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- INHIB -->
<?php 
    for($i = 0 ; $i < 6 ; ++$i){
        if($levels_values["inhib"][$i] > $lol_profil['INHIB']){
            $i -= 1;
            break;
        }
        
    }
    ($i != -1) ? $level_value = $levels_values["inhib"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2  <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <!--<image xlink:href="./images/minions/<?php echo $level; ?>.png" x="100" y="50" height="450" width="800" /> -->
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['INHIB']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Inhibitors : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["inhib"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
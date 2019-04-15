<!-- KILLS -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["kill"][$i] > $lol_profil['SIMPLE_KILL']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["kill"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2  <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <!--<image xlink:href="./images/kill/<?php echo $level; ?>.png" x="100" y="0" height="650" width="800" /> -->
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['SIMPLE_KILL']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Kills : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["kill"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- DEATH -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["death"][$i] > $lol_profil['DEATH']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["death"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2  <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <!--<image xlink:href="./images/death/<?php echo $level; ?>.png" x="100" y="0" height="650" width="800" /> -->
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['DEATH']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Morts : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["death"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- ASSISTS -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["assist"][$i] > $lol_profil['ASSIST']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["assist"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2  <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <!--<image xlink:href="./images/assist/<?php echo $level; ?>.png" x="100" y="0" height="650" width="800" /> -->
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['ASSIST']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Assists : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["assist"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- KDA -->
<?php 
    if($lol_profil['SIMPLE_KILL'] == 0 && $lol_profil['ASSIST'] == 0){
        $kda = 0;
    }
    else if($lol_profil['DEATH'] == 0){
        $kda = ($lol_profil['SIMPLE_KILL']+$lol_profil['ASSIST'])/1;
        if($kda < $levels_values["kda"][5]) $kda = $levels_values["kda"][5];
    }else{
        $kda = ($lol_profil['SIMPLE_KILL']+$lol_profil['ASSIST'])/$lol_profil['DEATH'];
    }

    $kda = number_format((float)$kda, 2, '.', '');
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["kda"][$i] > $kda){
            $i -= 1;
            break;
        }
        
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["kda"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2  <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <!--<image xlink:href="./images/kda/<?php echo $level; ?>.png" x="100" y="0" height="650" width="800" /> -->
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $kda; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">KDA : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["kda"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
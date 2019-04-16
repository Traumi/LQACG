<!-- GAMES -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["games"][$i] > $lol_profil['GAMES']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["games"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2 trophy <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <!--<image xlink:href="./images/games/<?php echo $level; ?>.png" x="100" y="50" height="315" width="800" /> -->
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['GAMES']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Parties : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["games"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
<!-- WINS -->
<?php 
    for($i = 0 ; $i < $level_max ; ++$i){
        if($levels_values["win"][$i] > $lol_profil['WIN']){
            $i -= 1;
            break;
        }
    }
    ($i == $level_max) ? $i = $level_max-1 : null;
    ($i != -1) ? $level_value = $levels_values["win"][$i] : $level_value = 0;
    $level=getTrophyLevel($i);
    $nlvl=getTrophyLevelName($i);
    if($i >= 0){
?>
<div class="col-2  <?php echo $level; ?>">
    <svg viewbox="0 0 1000 1000" style="width:100%;">
        <circle cx="500" cy="400" r="390" stroke="black" stroke-width="10" fill="transparent"/>
        <!--<image xlink:href="./images/win/<?php echo $level; ?>.png" x="100" y="50" height="315" width="800" />-->
        <?php display_stars($i); ?>
        <text x="500" y="625" text-anchor="middle" font-weight="800" font-size="125"><?php echo $level_value; ?></text>
        <text x="500" y="725" text-anchor="middle" font-weight="600" font-size="75"><?php echo $lol_profil['WIN']; ?></text>
        <text x="500" y="900" text-anchor="middle" font-weight="600" font-size="100">Victoires : <?php echo $nlvl ?></text>
        <text x="500" y="990" text-anchor="middle" font-weight="600" font-size="60">Prochain niveau : <?php echo $levels_values["win"][$i+1] ?></text>
    </svg>
</div>
<?php } ?>
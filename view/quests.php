<?php
    $site = new Site();
    $quests = new Quests();
?>
<div class="row justify-content-center">
    <div class="col-lg-8 col-sm-10">
        <h3 class="text-center">Quètes</h3>
        <table class="table table-hover">
            <thead>
                <tr><th>Id</th><th>Description</th><th>XP</th><th>Expire</th><th>Condition</th></tr>
            </thead>
            <tbody>
                <?php
                foreach ($quests->quests as $value){
                ?>
                <tr>
                    <td><?php echo $value['ID'] ?></td>
                    <td><?php echo $value['DESCRIPTION'] ?></td>
                    <td><?php echo $value['XP'] ?></td>
                    <td><?php echo $value['EXPIRE'] ?></td>
                    <td><?php echo $value['COND'] ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

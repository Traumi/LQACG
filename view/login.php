<div class="row justify-content-center">
    <div class="col-8">
        <?php
            if(sizeof($errors) > 0){
        ?>
            <div class="alert alert-danger" role="alert">
                <?php
                    for($i = 0 ; $i < sizeof($errors) ; $i++){
                        echo $errors[$i].'<br/>';
                    }
                ?>
            </div>
        <?php
            }
        ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-4">
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="login">Login</label>
                <input aria-describedby="loginHelp" class="form-control" type="text" id="login" name="login" placeholder="Login" value="<?php echo $login; ?>"/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input aria-describedby="pwHelp" class="form-control" type="password" id="password" name="password" placeholder="Password"/>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
    <div class="col-4 tr-right-panel" style="border-left:solid black 1px;">
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="slogin">Login</label>
                <input aria-describedby="loginHelp" class="form-control" type="text" id="slogin" name="slogin" placeholder="Login"/>
            </div>
            <div class="form-group">
                <label for="spassword">Password</label>
                <input aria-describedby="pwHelp" class="form-control" type="password" id="spassword" name="spassword" placeholder="Password"/>
            </div>
            <div class="form-group">
                <label for="spassword2">Confirm Password</label>
                <input aria-describedby="pwHelp" class="form-control" type="password" id="spassword2" name="spassword2" placeholder="Confirm Password"/>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
</div>

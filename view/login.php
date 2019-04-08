<div class="row justify-content-center">
    <div class="col-4">
        <form action="index.php" method="post">
            <input type="text" name="login" placeholder="Login" value="<?php echo $login; ?>"/>
            <input type="password" name="password" placeholder="Password"/>
            <input type="submit"/>
        </form>
    </div>
    <div class="col-4">
        <form action="index.php" method="post">
            <input type="text" name="login" placeholder="Login"/>
            <input type="password" name="password" placeholder="Password"/>
            <input type="password" name="password2" placeholder="Confirm Password"/>
            <input type="submit"/>
        </form>
    </div>
</div>

<?php if (!isset($_SESSION['username'])) {
?>
<form class="col-md-12" method="post" action="logincheck.php" >
    <div class="form-group">
        <input id="txt_Username" name="login_username" type="text" aria-labelledby="Username-ariaLabel" class="form-control input-lg" placeholder="Username">
    </div>
    <div class="form-group">
        <input id="pwd_Password" name="login_password" type="password" aria-labelledby="Password-ariaLabel" class="form-control input-lg" placeholder="Password">
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-lg btn-block">Login</button>
    </div>
</form>

<?php } else { echo "Already logged in"; } ?>

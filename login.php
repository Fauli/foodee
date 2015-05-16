<?php if (!isset($_SESSION['username'])) {
?>
<form method="post" action="logincheck.php" class="loginform">
	<div class="formrow requiredRow">
		<label for="txt_Username" id="Username-ariaLabel">Username</label>
		<input id="txt_Username" name="login_username" type="text" aria-labelledby="Username-ariaLabel" class="required" title="Username. This is a required field" />
	</div>
	<div class="formrow requiredRow">
		<label for="pwd_Password" id="Password-ariaLabel">Password</label>
		<input id="pwd_Password" name="login_password" type="password" aria-labelledby="Password-ariaLabel" class="required" title="Password. This is a required field" />
	</div>
	<div class="row">
		<input type="submit" value="Login" />
	</div>
</form>
<?php } else { echo "Already logged in"; } ?>

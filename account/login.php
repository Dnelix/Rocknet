<?php
include_once 'includes/constants.php';
if($_GET['msg']=="success"){
	$log_prompt = '<font color="green">You Have successfully registered. Login Now!</font>';
}

?>
<?php
// AJAX CALLS THIS LOGIN CODE TO EXECUTE
if(isset($_POST["u"]) && isset($_POST["p"])){
	// CONNECT TO THE DATABASE
	include_once("includes/constants.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
	$u = $_POST['u'];
	$p_hash = md5($_POST['p']);
	$k = $_POST['keep'];
	
	// FORM DATA ERROR HANDLING
	if($u == "" || $p_hash == ""){
		echo "login_failed";
        exit();
	} else {
		//confirm existence
		$check = "SELECT * from users WHERE email = '$u' OR username = '$u' AND password = '$p_hash' LIMIT 1";
		$result = mysqli_query($link, $check);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			if($k==true || $k=="true"){
				setcookie("id", $row['id'], strtotime( '+30 days' ), "/", "", "", TRUE);
				setcookie("user", $row['username'], strtotime( '+30 days' ), "/", "", "", TRUE);
			}
			echo $row['username'];
		} else {
			echo "login_failed";
		}
	}
	exit();
}
?>
<?php include_once('includes/headinc.php'); ?>
 
<body>
	<div class="login-background">
		<div class="login-page">
			<div class="main-login-contain">
				<div class="login-circul text-xs-center">
					<i class="icon_lock_alt login-icon-circul"></i>
				</div>
				<div class="login-form">
					<?php if (isset($log_prompt)) { ?>
						<div class="alert alert-info">
							<button class="close" data-close="alert"></button>
							<span><?= $log_prompt; ?> </span>
						</div>
					<?php } ?>
					<form onSubmit="return false;">
						<div class="login_input">
							<input type="text" class="login-form-border" id="un" name="u" placeholder="Enter Username or Email">
							<span class="login-right-icon"><i class="icon icon_mail"></i></span>
						</div>
						<div class="login_input">
							<input type="password" class="login-form-border" id="pw" name="p" placeholder="Password">
							<span class="login-right-icon"><i class="icon icon_key"></i></span>
						</div>
						<div class="checkbox checkbox-login-v1">
							<input value="yes" id="checkbox-squared1" name="keep" class="keep" type="checkbox">
							<label for="checkbox-squared1"></label>
							<span>Remember me</span>
						</div>
						<p id="stat" style="color:red"></p>
						<button type="submit" class="btn btn-primary btn-login" id="loginbtn" onclick="javascript:logcheck()">Submit</button>
						<div class="goto-login">
							<div class="sign-up-login">
								<i class="arrow_back"></i>
								Go to <a href="register">Sign up</a>
							</div>
							<div class="forgot-password-login">
								<a href="forgot_pass">
								Forgot password?
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	 
	</div>
</body>

<script src="./assets/global/js/ajax.js" type="text/javascript"></script>
<script src="./assets/global/js/main.js" type="text/javascript"></script>

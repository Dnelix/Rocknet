<?php
if (isset($_POST['password_change'])) {
    $old = strtolower(filter_input(INPUT_POST, 'Password'));
    $new = strtolower(filter_input(INPUT_POST, 'PasswordNew'));
    $new2 = strtolower(filter_input(INPUT_POST, 'PasswordNewConfirm'));
    $old_hash = md5($old);
    $new_hash = md5($new);
    $new_hash2 = md5($new2);
	
    //check if correct
    $pass = mysqli_query($link, "SELECT password FROM users WHERE id = '$user_id'");
    if ($rope = mysqli_fetch_array($pass, MYSQL_ASSOC)) {
        $old_pass = $rope['password'];
    }
    if ($old_pass != $old_hash) {
        $pass_prompt = "<div class='alert alert-danger alert-dismissable'>PREVIOUS PASSWORD INCORRECT</div>";
    } else {
        if ($new_hash != $new_hash2) {
            $pass_prompt = "<div class='alert alert-danger alert-dismissable'>PASSWORD DOES NOT MATCH</div>";
        } else {
            if ($old == "" || $new == "" || $new2 == "") {
                $pass_prompt = "<div class='alert alert-danger alert-dismissable'>CHECK FIELDS</div>";
            } else {
                $up_pass = mysqli_query($link, "UPDATE users SET password = '$new_hash' WHERE id = '$user_id'");
                if ($up_pass) {
                    $pass_prompt = "<div class='alert alert-success alert-dismissable'>PASSWORD CHANGED SUCCESSFULLY</div>";
                } else {
                    die(mysqli_error());
                }
            }
        }
    }
}
?>
	<section id="content-wrapper" class="form-elements">
		<div class="site-content-title">
			<h2 class="float-xs-left content-title-main">Change Password</h2>
		 
			<ol class="breadcrumb float-xs-right">
				<li class="breadcrumb-item">
					<span class="fs1" aria-hidden="true" data-icon="?"></span>
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item"><a href="?link=profile">Profile</a></li>
				<li class="breadcrumb-item"><?= $_GET['link']; ?></li>
			</ol>
		 
		</div>
		<div class="card col-md-8">
			<div class="card-block"><p>
			<?php if (isset($pass_prompt)) { ?>
				<div class="row">
					<div class="col-md-12">
						<p><?= $pass_prompt; ?></p>
					</div>
				</div>
			<?php } ?>
				<form method="post">
					<div class="form-group">
						<label class="control-label">Current Password</label>
						<input type="password" class="form-control" name="Password"/>
					</div>
					<div class="form-group">
						<label class="control-label">New Password</label>
						<input type="password" class="form-control" name="PasswordNew"/>
					</div>
					<div class="form-group">
						<label class="control-label">Re-type New Password</label>
						<input type="password" class="form-control" name="PasswordNewConfirm"/>
					</div>
					<div class="margin-top-10">
						<button type="submit" class="btn btn-primary" name="password_change">
						Change Password </button>
						<button type="reset" class="btn btn-default">Cancel </button>
					</div>
				</form>
			</p></div>
		</div>
	</section>
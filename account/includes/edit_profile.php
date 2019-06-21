<?php
if (isset($_POST['edit_profile'])) {
    $fullname = filter_input(INPUT_POST, 'fullname');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $gender = filter_input(INPUT_POST, 'gender');
    $dob = filter_input(INPUT_POST, 'dob');
    $address = filter_input(INPUT_POST, 'address');


    if ($fullname == "" || $email == "" || $phone == "" || $gender == "" || $dob == "" || $address == "") {
        $msg1 = "<div class='alert alert-danger'>* Some fields are missing</div>";
    } else {
        $query = "UPDATE users SET fullname = '$fullname', email = '$email', phone_number = '$phone', gender = '$gender', d_o_b = '$dob', address  = '$address' WHERE id = '$user_id'";
        $update_result = mysqli_query($link, $query);

        if ($update_result) {
            $msg1 = "<div class='alert alert-success'>Your Profile has been successfully updated. Changes will reflect after a while.</div>";
        } else {
            $msg1 = "<div class='alert alert-danger'>Profile Update Failed, Try again later</div>";
        }
    }
}
?>
	<section id="content-wrapper" class="form-elements">
		<div class="site-content-title">
			<h2 class="float-xs-left content-title-main">Edit Profile</h2>
		 
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
			<?php if (isset($msg1)) { ?>
				<div class="row">
					<div class="col-md-12">
						<p><?= $msg1; ?></p>
					</div>
				</div>
			<?php } ?>
				<form method="post">
					<div class="form-group">
						<label class="control-label">Full Name</label>
						<input type="text" placeholder="Surname First" class="form-control" value="<?= $user['fullname']; ?>" name="fullname"/>
					</div>
					<div class="form-group">
						<label class="control-label">Mobile Number</label>
						<input type="text" placeholder="+1234567890" class="form-control" value="<?= $user['phone_number']; ?>" name="phone"/>
					</div>
					<div class="form-group">
						<label class="control-label">Email</label>
						<input type="email" placeholder="Your Email Address" class="form-control" value="<?= $user['email']; ?>" name="email"/>
					</div>
					<div class="form-group">
						<label class="control-label">Gender</label>
						<label class="uniform-inline"><input type="radio" name="gender" value="Male" checked />Male </label>
						<label class="uniform-inline"><input type="radio" name="gender" value="Female"/>Female </label>
					</div>
					<div class="form-group">
						<label class="control-label">Date of Birth</label>
						<input type="date" placeholder="mm-dd-yyyy" class="form-control" value="<?= $user['d_o_b']; ?>" name="dob"/>
					</div>
					<div class="form-group">
						<label class="control-label">Address</label>
						<textarea class="form-control" rows="3" placeholder="Your Address" name="address"><?= $user['address']; ?></textarea>
					</div>
					<div class="margiv-top-10">
						<button type="submit" class="btn btn-primary" name="edit_profile">Save Changes</button>
						<button type="reset" class="btn btn-default">Cancel </button> &nbsp;
						<button type="button" class="btn btn-primary" onClick="goTo('?link=profile')">Back to My Profile </button>
					</div>
				</form>
			</p></div>
		</div>
	</section>
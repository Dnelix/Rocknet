<?php
if (isset($_POST['edit_profile'])) {
    $fullname = filter_input(INPUT_POST, 'fullname');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $gender = filter_input(INPUT_POST, 'gender');
    $dob = filter_input(INPUT_POST, 'dob');
    $address = filter_input(INPUT_POST, 'address');


    if ($fullname == "" || $email == "" || $phone == "" || $dob == "" || $address == "") {
        $msg1 = "<div class='note note-danger'>* Some fields are missing</div>";
    } else {
        $query = "UPDATE users SET fullname = '$fullname', email = '$email', phone_number = '$phone', gender = '$gender', d_o_b = '$dob', address  = '$address' WHERE id = '$user_id'";
        $update_result = mysqli_query($link, $query);

        if ($update_result) {
            $msg1 = "<div class='note note-success'>Your Profile has been successfully updated. Changes will reflect after a while.</div>";
        } else {
            $msg1 = "<div class='note note-danger'>Profile Update Failed, Try again later</div>";
        }
    }
}
?>
<?php
	($user['photo']!='') ? $avatar_src = "uploads/".$user['photo'] : $avatar_src = "uploads/avatar.gif";

	$img_message = ''; 
	$pic1_file_name = '';
if (isset($_FILES["photo"]["name"]) && $_FILES["photo"]["tmp_name"] != ""){
	$pic1Name = $_FILES["photo"]["name"];
	$pic1TmpLoc = $_FILES["photo"]["tmp_name"];
	$pic1Type = $_FILES["photo"]["type"];
	$pic1Size = $_FILES["photo"]["size"];
	$pic1ErrorMsg = $_FILES["photo"]["error"];
	$getext1 = explode(".", $pic1Name);
	$fileExt1 = end($getext1);
	$pic1_file_name = $user['username'].date("Y-m-d_H-i-s").".".$fileExt1;

	if (!preg_match("/\.(gif|jpg|png)$/i", $pic1Name)) {
		$img_message = "<div class='note note-danger'>ERROR: Your image file must be JPG, GIF or PNG type</div>";
	} else if($pic1Size > 1048400) {
		$img_message ="<div class='note note-danger'>ERROR: Image cannot be larger than 1mb</div>";
	} else if ($pic1ErrorMsg == 1) {
		$img_message = "<div class='note note-danger'>An unknown error occurred with Upload</div>";
	} else {
		$moveResult = move_uploaded_file($pic1TmpLoc, "uploads/$pic1_file_name");
		if ($moveResult != true) {
			$img_message = "<div class='note note-danger'>ERROR: File upload failed</div>";
		} else {
		$query = "UPDATE users SET photo = '$pic1_file_name' WHERE id = '$user_id'";
        $update_result = mysqli_query($link, $query);
			if ($update_result) {
            $img_message = "<div class='note note-success'>Your Profile Photo has been Updated Successfully. Changes may take a while to reflect.</div>";
			} else {
				$img_message = "<div class='note note-danger'>Photo Update Failed, Try again later</div>";
			}
		}
	}
}
?>
<?php
if (isset($_POST['password_change'])) {
    $old = filter_input(INPUT_POST, 'Password');
    $new = filter_input(INPUT_POST, 'PasswordNew');
    $new2 = filter_input(INPUT_POST, 'PasswordNewConfirm');
    $old_hash = md5($old);
    $new_hash = md5($new);
    $new_hash2 = md5($new2);
	
	//include_once("constants.php");
    //check if correct
    $pass = mysqli_query($link, "SELECT password FROM users WHERE id = '$user_id'");
    if ($rope = mysqli_fetch_array($pass, MYSQL_ASSOC)) {
        $old_pass = $rope['password'];
    }
    if ($old_pass != $old_hash) {
        $pass_prompt = "<div class='note note-danger'>PREVIOUS PASSWORD INCORRECT</div>";
    } else {
        if ($new_hash != $new_hash2) {
            $pass_prompt = "<div class='note note-danger'>PASSWORD DOES NOT MATCH</div>";
        } else {
            if ($old == "" || $new == "" || $new2 == "") {
                $pass_prompt = "<div class='note note-danger'>CHECK FIELDS</div>";
            } else {
                $up_pass = mysqli_query($link, "UPDATE users SET password = '$new_hash' WHERE id = '$user_id'");
                if ($up_pass) {
                    $pass_prompt = "<div class='note note-success'>PASSWORD CHANGED SUCCESSFULLY</div>";
                } else {
                    die(mysqli_error());
                }
            }
        }
    }
}
?>
<!-- BEGIN PAGE HEADER-->
		<div class="page-content-wrapper">
			<div class="page-content">
				<h3 class="page-title">
				Profile <small>User Profile</small>
				</h3>
				<div class="page-bar">
					<ul class="page-breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.php">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">User Profile</a>
						</li>
					</ul>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row profile">
					<div class="col-md-12">
						<!--BEGIN TABS-->
						<div class="tabbable tabbable-custom tabbable-border">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_1" data-toggle="tab">Overview </a>
								</li>
								<li>
									<a href="#tab_1_3" data-toggle="tab">Manage Profile </a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1_1">
									<div class="row">
										<div class="col-md-3">
											<ul class="list-unstyled profile-nav">
												<li>
													<img src="<?= $avatar_src; ?>" class="img-responsive" alt="Profile Photo" style="width:200px; min-height:150px"/>
													<h1><?= $user['username']; ?></h1>
													<h3><a href="#"><?= $user['email']; ?></a></h3>
												</li>
											</ul>
										</div>
										<div class="col-md-9">
											<div class="row">
												<div class="col-md-12 profile-info">
													
													<div class="col-md-6">
														<div><span class="btn default btn-xs red-stripe">USERNAME </span> <?= $user['username']; ?>.</div><br/>
														<div><span class="btn default btn-xs red-stripe">FULL NAME </span> <?= $user['fullname']; ?>.</div><br/>
														<div><span class="btn default btn-xs red-stripe">PHONE </span> <?= $user['phone_number']; ?>.</div><br/>
														<div><span class="btn default btn-xs red-stripe">EMAIL </span> <?= $user['email']; ?>.</div><br/>
														<div><span class="btn default btn-xs red-stripe">GENDER </span> <?= $user['gender']; ?>.</div><br/>
														<div><span class="btn default btn-xs red-stripe">DATE OF BIRTH </span> <?= $user['d_o_b']; ?>.</div><br/>
														<div><span class="btn default btn-xs red-stripe">ADDRESS </span> <?= $user['address']; ?>.</div><br/>
														<hr/>
														<div><span class="btn default btn-xs red-stripe">REFEREE </span> <?= $user['referee']; ?>.</div><br/>
														<div><span class="btn default btn-xs red-stripe">MY REFERRAL LINK </span> <a href="<?= $c_web.'?ref='.$user['email']; ?>"><?= $c_web.'?ref='.$user['email']; ?></a></div><br/>
														
													</div>
													<div class="col-md-6">
														<div><span class="btn default btn-xs green-stripe">ACCOUNT PLAN </span> <?= $user['plan']; ?>.</div><br/>
														<div><span class="btn default btn-xs green-stripe">REGISTRATION DATE </span> <?= $user['reg_date']; ?> at <?= $user['reg_time']; ?></div><br/>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--tab_1_2-->
								<div class="tab-pane" id="tab_1_3">
									<div class="row profile-account">
										<div class="col-md-3">
											<ul class="ver-inline-menu tabbable margin-bottom-10">
												<li class="active">
													<a data-toggle="tab" href="#tab_1-1">
													<i class="fa fa-cog"></i> Personal info </a>
													<span class="after">
													</span>
												</li>
												<li>
													<a data-toggle="tab" href="#tab_2-2">
													<i class="fa fa-picture-o"></i> Change Avatar </a>
												</li>
												<li>
													<a data-toggle="tab" href="#tab_3-3">
													<i class="fa fa-lock"></i> Change Password </a>
												</li>
												<li>
													<a data-toggle="tab" href="#tab_4-4">
													<i class="fa fa-eye"></i> Privacy Settings </a>
												</li>
											</ul>
										</div>
										<div class="col-md-9">
											<div class="tab-content">
												<div id="tab_1-1" class="tab-pane active">
												<?php if (isset($msg1)) { ?>
													<div class="row">
														<div class="col-md-12">
															<p><?= $msg1; ?></p>
														</div>
													</div>
												<?php } ?>
													<form role="form" method="post" action="index.php?link=profile#tab_1_3">
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
															<label class="uniform-inline"><input type="radio" name="gender" value="Male" />Male </label>
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
															<button type="submit" class="btn green" name="edit_profile">Save Changes</button>
															<button type="reset" class="btn default">Cancel </button>
														</div>
													</form>
												</div>
												<div id="tab_2-2" class="tab-pane">
													<?php if (isset($img_message)) { ?>
														<div class="row">
															<div class="col-md-12">
																<p><?= $img_message; ?></p>
															</div>
														</div>
													<?php } else { ?> <p> Select or change your profile display image here.</p> <?php } ?>
													
													<form action="index.php?link=profile#tab_2-2" role="form" method="post" enctype="multipart/form-data">
														<div class="form-group">
															<div class="fileinput fileinput-new" data-provides="fileinput">
																<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																	<img src="<?= $avatar_src; ?>" alt=""/>
																</div>
																<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
																<div>
																	<span class="btn default btn-file">
																		<span class="fileinput-new">Select image </span>
																		<span class="fileinput-exists">Change </span>
																		<input type="file" name="photo">
																	</span>
																	<a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">Remove </a>
																</div>
															</div>
															<div class="clearfix margin-top-10">
																<span class="label label-danger">NOTE! </span>
																<span>Image thumbnail preview is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
															</div>
														</div>
														<div class="margin-top-10">
															<button type="submit" class="btn green" name="photo_upd">Update Profile Photo </button>
															<button type="reset" class="btn default">Cancel </button>
														</div>
													</form>
												</div>
												<div id="tab_3-3" class="tab-pane">
												<?php if (isset($pass_prompt)) { ?>
													<div class="row">
														<div class="col-md-12">
															<p><?= $pass_prompt; ?></p>
														</div>
													</div>
												<?php } ?>
													<form method="post" action="index.php?link=profile#tab_3-3">
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
															<button type="submit" class="btn green" name="password_change">
															Change Password </button>
															<button type="reset" class="btn default">Cancel </button>
														</div>
													</form>
												</div>
												<div id="tab_4-4" class="tab-pane">
													<form action="index.php?link=profile#tab_4-4">
														<table class="table table-bordered table-striped">
														<tr>
															<td>
																 Log me out of the account if I am inactive for 30 minutes
															</td>
															<td>
																<label class="uniform-inline">
																<input type="radio" name="optionsRadios1" value="option1"/>
																Yes </label>
																<label class="uniform-inline">
																<input type="radio" name="optionsRadios1" value="option2" checked/>
																No </label>
															</td>
														</tr>
														<tr>
															<td>
																 Enable Funds Withdrawal
															</td>
															<td>
																<label class="uniform-inline">
																<input type="checkbox" value="" checked /> Yes </label>
															</td>
														</tr>
														<tr>
															<td>
																 Enable Profile Security
															</td>
															<td>
																<label class="uniform-inline">
																<input type="checkbox" value="" checked /> Yes </label>
															</td>
														</tr>
														<tr>
															<td>
																 Enable Password Change
															</td>
															<td>
																<label class="uniform-inline">
																<input type="checkbox" value="" checked /> Yes </label>
															</td>
														</tr>
														</table>
														<!--end profile-settings-->
														<div class="margin-top-10">
															<a href="#" class="btn green">
															Save Changes </a>
															<a href="#" class="btn default">
															Cancel </a>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!--end col-md-9-->
									</div>
								</div>
								<!--end tab-pane-->
							</div>
						</div>
						<!--END TABS-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
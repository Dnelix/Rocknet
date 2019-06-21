<?php

	$pic1_file_name = '';
if (isset($_FILES["photo"]["name"]) && $_FILES["photo"]["tmp_name"] != ""){
	$pic1Name = $_FILES["photo"]["name"];
	$pic1TmpLoc = $_FILES["photo"]["tmp_name"];
	$pic1Type = $_FILES["photo"]["type"];
	$pic1Size = $_FILES["photo"]["size"];
	$pic1ErrorMsg = $_FILES["photo"]["error"];
	$getext1 = explode(".", $pic1Name);
	$fileExt1 = end($getext1);
	$pic1_file_name = $user['username'].date("Y-m-d_H-i").".".$fileExt1;

	if (!preg_match("/\.(gif|jpg|png)$/i", $pic1Name)) {
		$img_message = "<div class='alert alert-danger'>ERROR: Your image file must be JPG, GIF or PNG type</div>";
	} else if($pic1Size > 1048400) {
		$img_message ="<div class='alert alert-danger'>ERROR: Image cannot be larger than 1mb</div>";
	} else if ($pic1ErrorMsg == 1) {
		$img_message = "<div class='alert alert-danger'>An unknown error occurred with Upload</div>";
	} else {
		$moveResult = move_uploaded_file($pic1TmpLoc, "uploads/$pic1_file_name");
		if ($moveResult != true) {
			$img_message = "<div class='alert alert-danger'>ERROR: File upload failed</div>";
		} else {
		
		resize(300, "uploads/$pic1_file_name", "uploads/$pic1_file_name");
		
		$query = "UPDATE users SET photo = '$pic1_file_name' WHERE id = '$user_id'";
        $update_result = mysqli_query($link, $query);
			if ($update_result) {
            $img_message = "<div class='alert alert-success'>Your Profile Photo has been Updated Successfully. Changes may take a while to reflect.</div>";
			} else {
				$img_message = "<div class='alert alert-danger'>Photo Update Failed, Try again later</div>";
			}
		}
	}
}
?>
	<section id="content-wrapper" class="form-elements">
		<div class="site-content-title">
			<h2 class="float-xs-left content-title-main">Change Photo</h2>
		 
			<ol class="breadcrumb float-xs-right">
				<li class="breadcrumb-item">
					<span class="fs1" aria-hidden="true" data-icon="?"></span>
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item"><a href="?link=profile">Profile</a></li>
				<li class="breadcrumb-item"><?= $_GET['link']; ?></li>
			</ol>
		 
		</div>
		<div class="card col-md-6">
			<div class="card-block"><p>
			<?php if (isset($img_message)) { ?>
				<div class="row">
					<div class="col-md-12">
						<p><?= $img_message; ?></p>
					</div>
				</div>
			<?php } else { ?> <p> Select or change your profile display image here.</p> <?php } ?>
				<form method="post" enctype="multipart/form-data">
					<input type="file" name="photo" class="dropify" data-plugin="dropify" data-height="350" data-default-file="<?= $avatar_src; ?>">
					<p><b>Click on the image above or drag and drop another photo to replace.</b></p>
					<div class="divider15">
						<button type="submit" class="btn btn-primary" name="photo_upd">Update Profile Photo </button>
						<button type="reset" class="btn btn-default" onClick="goTo('?link=profile')">Cancel </button> &nbsp;
						<button type="button" class="btn btn-primary" onClick="goTo('?link=profile')">Back to My Profile </button>
					</div>
				</form>
			</p></div>
		</div>
	</section>
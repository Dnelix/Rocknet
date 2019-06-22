	<section id="content-wrapper" class="form-elements">
		<div class="site-content-title">
			<h2 class="float-xs-left content-title-main">My Profile</h2>
		 
			<ol class="breadcrumb float-xs-right">
				<li class="breadcrumb-item">
					<span class="fs1" aria-hidden="true" data-icon="?"></span>
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item"><a href="#">User</a></li>
				<li class="breadcrumb-item"><?= $_GET['link']; ?></li>
			</ol>
		 
		</div>
		
		<div class="col-md-12 profile-contain">
			<div class="row">
				<div class="col-xl-3 col-md-5 col-xs-12 contacts">
					<div class="content text-xs-center">
						<div class="image-profile"><img src="<?= $avatar_src; ?>" alt="Profile image"/></div>
						<h3 class="name-profile"><?= $user['username']; ?></h3>
						<h6 class="email-profile"><?= $user['email']; ?></h6>
						<div class="profile-icon text-xs-center">
							<a href="#">
							<i class="icon social_facebook"></i>
							</a>
							<a href="#">
							<i class="icon social_twitter "></i>
							</a>
							<a href="#">
							<i class="icon social_instagram"></i>
							</a>
						</div>
					</div>
					<div class="content">
						<div data-plugin="custom-scroll" data-height="200">
							<div>
								<h4 class="page-content-title">Settings</h4>
								<div class="divider15"></div>
								<ul class="setting-profile">
									<li><a href="?link=avatar"><span class="icon_camera" aria-hidden="true"></span>Change Profile Photo</a></li>
									<li><a href="?link=edit_profile"><span class="icon_profile" aria-hidden="true"></span>Edit Profile</a></li>
									<li><a href="?link=change_pass"><span class="icon_key" aria-hidden="true"></span>Change Password</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xl-9 col-md-7 col-xs-12">
					<div class="content">
						<div class="row">
							<div class="col-md-12">
								<h4 class="page-content-title">Personal Information</h4>
								<div class="divider15"></div>
								<div class="personal-info-box">
									<div class="row">
										<div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
											<div class="left-name-profile float-xs-left">User Name :</div>
											<div class="detail-profile float-xs-right"><?= $user['username']; ?></div>
										</div>
										<div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
											<div class="left-name-profile float-xs-left">Full Name :</div>
											<div class="detail-profile float-xs-right"><?= $user['fullname']; ?></div>
										</div>
										<div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
											<div class="left-name-profile float-xs-left">Gender :</div>
											<div class="detail-profile float-xs-right"><?= $user['gender']; ?></div>
										</div>
										<div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
											<div class="left-name-profile float-xs-left">Date of Birth:</div>
											<div class="detail-profile float-xs-right"><?= $user['d_o_b']; ?></div>
										</div>
										<div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
											<div class="left-name-profile float-xs-left">Country :</div>
											<div class="detail-profile float-xs-right">USA</div>
										</div>
										
									</div>
								</div>
							</div>
							<div class="divider-lg-spacing"></div>
							<div class="col-md-12">
								<h4 class="page-content-title">Contact Information</h4>
								<div class="divider15"></div>
								<div class="personal-info-box">
									<div class="row">
										<div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
											<div class="left-name-profile float-xs-left">Email :</div>
											<div class="detail-profile float-xs-right"><?= $user['email']; ?></div>
										</div>
										<div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
											<div class="left-name-profile float-xs-left">Mobile No :</div>
											<div class="detail-profile float-xs-right"><?= $user['phone_number']; ?></div>
										</div>
										<div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
											<div class="left-name-profile float-xs-left">Tel 2 :</div>
											<div class="detail-profile float-xs-right"> </div>
										</div>
										<div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
											<div class="left-name-profile float-xs-left">Address :</div>
											<div class="detail-profile float-xs-right"><?= $user['address']; ?></div>
										</div>
									</div>
								</div>
							</div>
							<div class="divider-lg-spacing"></div>
							<div class="col-md-12">
								<h4 class="page-content-title">Account Information</h4>
								<div class="divider15"></div>
								<div class="personal-info-box">
									<div class="row">
										<div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
											<div class="left-name-profile float-xs-left">Referee :</div>
											<div class="detail-profile float-xs-right"><?= $user['referee']; ?></div>
										</div>
										<div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
											<div class="left-name-profile float-xs-left">My Referral Link :</div>
											<div class="detail-profile float-xs-right"><a href="<?= $c_web.'?ref='.$user['username']; ?>"><?= $c_web.'?ref='.$user['username']; ?></a></div>
										</div>
										<div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
											<div class="left-name-profile float-xs-left">Account Plan :</div>
											<div class="detail-profile float-xs-right"> <?= $user['plan']; ?> </div>
										</div>
										<div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
											<div class="left-name-profile float-xs-left">Registration Date :</div>
											<div class="detail-profile float-xs-right"><?= $user['reg_date']; ?> at <?= $user['reg_time']; ?></div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					<div class="content text-xs-center">
						<div class="activities-count float-xs-left">
							<a href="#">
								<h5>Tweets</h5>
								<span class="social_twitter" aria-hidden="true"></span>
								<h6><?= rand(0,120); ?></h6>
							</a>
						</div>
						<div class="activities-count float-xs-left">
							<a href="#">
								<h5>Share</h5>
								<span class="social_share" aria-hidden="true"></span>
								<h6><?= rand(0,120); ?></h6>
							</a>
						</div>
						<div class="activities-count float-xs-left">
							<a href="#">
								<h5>Activities</h5>
								<span class="icon_hourglass" aria-hidden="true"></span>
								<h6><?= rand(0,120); ?></h6>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
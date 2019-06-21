<?php include_once('includes/headinc.php');?>
<body>
	<div class="loader-overlay">
		<div class="loader-preview-area">
			<div class="spinners">
				<div class="loader">
					<div class="rotating-plane"></div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="wrapper">
		<header id="header">
			<div class="row">
				<div class="col-sm-4 col-xl-2 header-left">
					<div class="logo float-xs-left">
						<!--a href="../"><img src="./assets/global/image/web-logo.png" alt="logo"></a-->
						<a href="../" style="color:#fff; font:16pt bold;"><img src="./assets/img/logo.png" alt="logo" style="height:25px; background-color:#fff; padding: 0px 5px;">.</a>
					</div>
					<button class="left-menu-toggle float-xs-right">
						<i class="icon_menu toggle-icon"></i>
					</button>
					<button class="right-menu-toggle float-xs-right">
						<i class="arrow_carrot-left toggle-icon"></i>
					</button>
				</div>
				<div class="col-sm-8 col-xl-10 header-right">
					<div class="header-inner-right">
						<div class="float-default searchbox">
							<div class="right-icon">
								<a href="javascript:void(0)">
									<i class="icon_search"></i>
								</a>
							</div>
						</div>
						<div class="float-default mail">
						<div class="right-icon">
							<a href="javascript:void(0)" data-toggle="dropdown" data-open="true" aria-expanded="true">
								<i class="icon_mail_alt"></i><span class="mail-no"><?= msgCount('USERS')+1; ?></span>
							</a>
							<div class="dropdown-menu messagetoggle" role="menu">
								<div class="nav-tab-horizontal">
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#messages" role="tab">Message</a>
										</li>
									</ul>
								</div>
								<div class="tab-content">
									<div class="tab-pane active" id="messages" role="tabpanel" data-plugin="custom-scroll" data-height="320">
										<ul class="userMessagedrop">
											<li>
												<a href="?link=inbox">
													<div class="media">
														<div class="media-left float-xs-left">
															<span class="label label-primary"><i class="icon_plus"></i></span>
														</div>
														<div class="media-body">
															<h6>Stay up-to-date with your inbox</h6>
															<p>You have <?= msgCount('USERS')+1; ?> total messages in your inbox. Click to view.</p>
														</div>
													</div>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!--div class="float-default chat">
						<div class="right-icon">
							<a href="javascript:void(0)" data-toggle="dropdown" data-open="true" data-animation="slideOutUp" aria-expanded="false">
								<i class="icon_chat_alt"></i><span class="mail-no">8</span>
							</a>
							<ul class="dropdown-menu userChat">
								<li>
									<a href="#">
										<div class="media">
											<div class="media-left float-xs-left">
												<img src="./assets/global/image/image1-profile.jpg" alt="message"/>
											</div>
											<div class="media-body">
												<h5>Judy Fowler</h5>
												<p>Dummy text of the printing...</p>
												<div class="status online"></div>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div-->
					
					<div class="float-default chat">
						<div class="right-icon">
							<a href="#" data-plugin="fullscreen">
								<i class="arrow_expand"></i>
							</a>
						</div>
					</div>
					
					<div class="user-dropdown">
						<div class="btn-group">
							<a href="#" class="user-header dropdown-toggle" data-toggle="dropdown" data-animation="slideOutUp" aria-haspopup="true" aria-expanded="false">
								<img src="<?= $avatar_src; ?>" alt="Profile image"/>
							</a>
							<div class="dropdown-menu drop-profile">
								<div class="userProfile">
									<img src="<?= $avatar_src; ?>" alt="Profile image"/>
									<h5><?= $user['username']; ?></h5>
									<p><?= $user['email']; ?></p>
								</div>
								<div class="dropdown-divider"></div>
								<a class="btn left-spacing link-btn" href="?link=profile" role="button">My profile</a>
								<!--a class="btn left-second-spacing link-btn" href="?link=change_pass" role="button">Change Password</a-->
								<a class="btn btn-primary float-xs-right right-spacing" href="?link=logout" role="button">Logout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
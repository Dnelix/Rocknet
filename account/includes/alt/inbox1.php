<!-- BEGIN PAGE HEADER-->
		<div class="page-content-wrapper">
			<div class="page-content">
				<h3 class="page-title">
				Inbox <small>My Notifications</small>
				</h3>
				<div class="page-bar">
					<ul class="page-breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.php">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Inbox</a>
						</li>
					</ul>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="portlet light">
					<div class="portlet-body">
						<div class="row">
							<div class="col-md-12">
								<ul class="timeline">
								<?php
								$sql = "SELECT * FROM inbox ORDER BY id DESC";
								$query = mysqli_query($link, $sql);
								while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
								?>
									<li class="timeline-grey">
										<div class="timeline-time">
											<span class="date"><?= $row["date"]; ?> </span>
											<span class="time"><?= $row["time"]; ?> </span>
										</div>
										<div class="timeline-icon">
											<i class="fa fa-comments"></i>
										</div>
										<div class="timeline-body">
											<h2><?= $row["title"]; ?></h2>
											<div class="timeline-content">
												<?= $row["body"]; ?>
											</div>
										</div>
									</li>
								<?php } ?>
								
									<li class="timeline-grey timeline-noline">
										<div class="timeline-time">
											<span class="date">Intro </span>
											<span class="time">12:00 </span>
										</div>
										<div class="timeline-icon">
											<i class="fa fa-comments"></i>
										</div>
										<div class="timeline-body">
											<h2>Welcome</h2>
											<div class="timeline-content">
												 We welcome you on behalf of the entire <?=$company; ?> team, thank you for joining us.<br/>We are pleased to inform you that your account is ready for live trading in the market as soon as possible. Please refer to the website front end for more information regarding funding and account activation procedures. <br/>If you have any questions, please send us a mail. Our expert customer service team are always ready to attend to you.
											</div>
										</div>
									</li>
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
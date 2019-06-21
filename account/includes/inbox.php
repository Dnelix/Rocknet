	
	<section id="content-wrapper" class="form-elements">
		<div class="site-content-title">
			<h2 class="float-xs-left content-title-main">Inbox</h2>
		 
			<ol class="breadcrumb float-xs-right">
				<li class="breadcrumb-item">
					<span class="fs1" aria-hidden="true" data-icon="?"></span>
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item"><a href="#">User</a></li>
				<li class="breadcrumb-item"><?= $_GET['link']; ?></li>
			</ol>
		 
		</div>
		
		<div class="col-md-12 mailbox_main">
			<div class="row">
				<div class="col-xl-2 col-lg-4 col-md-4 sidebar_block">
					<button aria-controls="collapseExample" aria-expanded="false" data-target="#collapseExample" data-toggle="collapse" type="button" class="mail-toggle">
						Mailbox Menu
						<span class="icon arrow_carrot-down float-xs-right"></span>
					</button>
					<div class="mail-divider-sm"></div>
					<div class="sidebar_contain collapse" id="collapseExample">
						<div class="mail_btn">
							<button type="button" class="btn btn-primary btn-block mail_compose_btn" id="compose_mail">Compose</button>
						</div>
						<ul class="mailbox_sidebar_contain">
							<li><a href="?link=inbox">Inbox</a><span class="badge float-xs-right "><?= msgCount('USERS')+1; ?></span></li>
							<li><a href="#">Draft</a></li>
							<li><a href="#">Sent</a></li>
							<li><a href="#">Archive</a></li>
							<li><a href="#">Trash</a></li>
						</ul>
					</div>
				</div>

				<!-- Notification for admin message -->
				<?php if (isset($_GET['adm'])){ ?>
				<div class="col-xl-10 col-lg-8 col-md-8 right-sidebar_block">
					<div class="content right_sidebar_contain">
						<div class="mailbox_right_contain">
							<div style="padding:20px; font-weight:bold; color:#c00">Please click on the [COMPOSE] button in the menu to send a message to support. </div>
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- Notification ends -->

				<?php if (isset($_GET['mid'])){ 
					$m_id = $_GET['mid']; 
					$msql = "SELECT * FROM inbox WHERE id=$m_id LIMIT 1";
					$mquery = mysqli_query($link, $msql);
					while($row = mysqli_fetch_array($mquery, MYSQLI_ASSOC)){ 
				?>
					
				<div class="col-xl-10 col-lg-8 col-md-8 right-sidebar_block">
					<div class="content right_sidebar_contain">
						<div class="mailbox_nav_bar">
							<div style="font-weight:bold; text-transform:uppercase;">
								<?= $row["title"]; ?>
							</div>
						</div>
						
						<div class="mailbox_right_contain">
							<div style="padding:20px;"><?= $row["body"]; ?></div>
							<div style="padding:20px;"><b>SENT BY:</b><br/><i>ADMIN on <span style="color:#ca0"><?= $row["date"]; ?> [<?= $row["time"]; ?>]</span></i></div>
						</div>
					</div>
				</div>

				<?php } } else { ?>

				<div class="col-xl-10 col-lg-8 col-md-8 right-sidebar_block">
					<div class="content right_sidebar_contain">
						<div class="mailbox_nav_bar">
							<div class="float-xs-right search_xs">
								<form action="#" class="mail_search">
									<div class="input-group">
										<input id="search" type="text" class="form-control" name="search" placeholder="search..">
										<a href="#" class="input-group-addon search_icon"><i class="icon icon_search"></i></a>
									</div>
								</form>
								<div class="dropdown mail_setting mailbox_drop_down float-xs-none">
									<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sort by</button>
									<ul class="dropdown-menu right-open-dropdown">
										<li><a href="#">Newest date</a></li>
										<li><a href="#">Oldest date</a></li>
										<li><a href="#">Unread</a></li>
										<li><a href="#">More setting</a></li>
									</ul>
								</div>
							</div>
							<div class="float-xs-left search_xs">
								<div class="mail_check float-xs-left">
									<div class="checkbox-squared">
										<input type="checkbox" class="check_all" value="None" id="checkbox-squared" name="check"/>
										<label for="checkbox-squared"></label>
										<span>All</span>
									</div>
								</div>
								<div class="dropdown mailbox_drop_down">
									<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">More</button>
									<ul class="dropdown-menu">
										<li><a href="#">Mark as read</a></li>
										<li><a href="#">Unread</a></li>
										<li><a href="#">Block</a></li>
										<li><a href="#">Archive</a></li>
										<li><a href="#">Delete</a></li>
									</ul>
								</div>
								<a onClick="reloadPage()" class="mailbox_refresh"><i class="icon icon_refresh"></i></a>
							</div>
						</div>
						
						<div class="mailbox_right_contain">
							<table class="table mail_table">
								<tbody>
									
								<?php
								$sql = "SELECT * FROM inbox WHERE receiver='USERS' OR receiver='{$username}' ORDER BY id DESC";
								$query = mysqli_query($link, $sql);
								$msg_count = mysqli_num_rows($query);
								$x=1;
								while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){ 
								?>
									<tr>
										<td class="mail_message">
											<div class="checkbox-squared float-xs-left">
												<input type="checkbox" value="None" id="checkbox-squared<?=$x;?>" name="check"/>
												<label for="checkbox-squared<?=$x;?>"></label>
											</div>
											<a href="?link=inbox&mid=<?= $row['id']; ?>">
												<div style="font-weight:bold"><?= $row["title"]; ?></div>
												<div style="color:#ca0"><?= $row["date"]; ?> [<?= $row["time"]; ?>]</div>
												<div><?= limit_text($row["body"], 5); ?></div>
											</a>
										</td>
										<!--td class="mail_favorite text-xs-center">
											<a href="javascript:void(0)" class="rated"><i class="icon icon_star_alt"></i></a>
										</td>
										<td class="mail_link text-xs-center">
											<a href="javascript:void(0)"><i class="icon icon_link_alt"></i></a>
										</td-->
									</tr>
								<?php $x++;} ?>
									
									<tr>
										<td class="mail_message">
											<div class="checkbox-squared float-xs-left">
												<input type="checkbox" value="None" id="checkbox-squared2" name="check"/>
												<label for="checkbox-squared2"></label>
											</div>
											<a href="#">
												<div style="font-weight:bold">Welcome</div>
												<div style="color:#ca0">00-00-00 [00:00:00]</div>
												<div>We welcome you on behalf of the entire <?=$company; ?> team, thank you for joining us.<br/>We are pleased to inform you that your account is ready for live trading in the market as soon as possible. Please refer to the website front end for more information regarding funding and account activation procedures. <br/>If you have any questions, please click the [<b>COMPOSE</b>] button above to send us a mail. Our expert customer service team are always ready to attend to you.</span>
											</a>
										</td>
									</tr>
								</tbody>
							</table>
							
							<div class="pagination_with_gap text-xs-right mail_pagination">
								<ul class="pagination">
									<li class="page-item">
										<a href="javascript:void(0)" class="page-link pagination_link" aria-label="Previous">
											<span aria-hidden="true">&lt;&lt;</span>
										</a>
									</li>
									<li class="page-item active"><a href="javascript:void(0)" class="page-link pagination_link">1</a></li>
									<li class="page-item"><a href="javascript:void(0)" class="page-link pagination_link">2</a></li>
									<li class="page-item"><a href="javascript:void(0)" class="page-link pagination_link">3</a></li>
									<li class="page-item"><a href="javascript:void(0)" class="page-link pagination_link">4</a></li>
									<li class="page-item">
										<a href="javascript:void(0)" class="page-link pagination_link" aria-label="Next">
											<span aria-hidden="true">&gt;&gt;</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<?php } ?>

				<div class="clearfix"></div>
				<div class="mail_compose_main pop">
					<div class="content">
					<form onSubmit="return false">
						<div class="mail_view_title compose_title">
							<a href="javascript:void(0)" class="compose_close float-xs-right"><i class="icon icon_close"></i></a>
							<span>To :</span><input type="text" id="to" name="to" value="ADMIN" disabled>
							<div class="compose_subject">
								<span>Subject :</span><input type="text" id="subj" name="subject">
							</div>
						</div>
						
						<div style="color:red; font-weight:bold" id="cmp"></div>
						
						<div class="compose_message">
							<span>Message :</span>
							<textarea rows="7" name="message" id="msg" width="100" data-spell-checker="true"></textarea>
						</div>
						<div class="compose_btn">
							<button type="submit" class="btn btn-primary" id="cmp_btn" name="compose" onClick="inbx()">Send</button>
							<input name="file_link[]" id="file_link" multiple="" type="file"/>
							<label for="file_link" class="btn btn-primary"><i class="icon icon_link_alt"></i></label>
							<button type="reset" class="mail_trash float-xs-right"><i class="icon icon_trash_alt"></i></button>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</section>

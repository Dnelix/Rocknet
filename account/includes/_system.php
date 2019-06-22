	<section id="content-wrapper" class="form-elements" style="background-color:#ffc">
		<div class="site-content-title">
			<h2 class="float-xs-left content-title-main">Dashboard</h2>
		 
			<ol class="breadcrumb float-xs-right">
				<li class="breadcrumb-item">
					<span class="fs1" aria-hidden="true" data-icon="?"></span>
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item">Dashboard</li>
			</ol>
		 
		</div>
		 
		<div class="contain-inner dashboard-v1 dashboard-v2">
						
			<div class="divider25"></div>

			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="row">
						<div class="col-md-6 col-lg-6 col-xl-3">
							<a href="?link=_users" style="color:#fff">
							<div class="dashboard-widget widget-box dashboard-xs-widget">
								<div class="widget-content text-xs-right">
									<div class="product-icon bg-danger">
										<i class="product-hover fa fa-users"></i>
										<i class="display-icon fa fa-users"></i>
									</div>
									<span>Users</span>
									<h4 class="text-danger"><?= numRows('users'); ?></h4>
									<span class="search_ad bg-info">View All</span> <span>Total Users</span>
								</div>
							</div>
							</a>
						</div>
						<div class="col-md-6 col-lg-6 col-xl-3">
							<a href="?link=_transactions" style="color:#fff">
							<div class="dashboard-widget widget-box">
								<div class="widget-content text-xs-right">
								<div class="product-icon bg-success">
									<i class="product-hover icon_document"></i>
									<i class="display-icon icon_document"></i>
								</div>
								<span>Transactions</span>
								<h4 class="text-success"><?= numRows('transaction'); ?></h4>
								<span class="search_ad bg-danger">System</span><span>Total Transactions</span>
								</div>
							</div>
							</a>
						</div>
						<div class="divider-lg-spacing"></div>
						<div class="col-md-6 col-lg-6 col-xl-3">
							<a href="?link=_withdraw" style="color:#fff">
							<div class="dashboard-widget widget-box dashboard-xs-widget">
								<div class="widget-content text-xs-right">
									<div class="product-icon bg-primary">
										<i class="product-hover icon_contacts"></i>
										<i class="display-icon icon_contacts"></i>
									</div>
									<span>Withdrawals</span>
									<h4 class="text-primary"><?= numRows('withdraw'); ?></h4>
									<span class="search_ad bg-success">View</span><span>Withdrawal Requests</span>
								</div>
							</div>
							</a>
						</div>
						<div class="col-md-6 col-lg-6 col-xl-3">
							<a href="?link=_mailbox" style="color:#fff">
							<div class="dashboard-widget widget-box">
								<div class="widget-content text-xs-right">
									<div class="product-icon bg-info">
										<i class="product-hover icon_mail"></i>
										<i class="display-icon icon_mail"></i>
									</div>
									<span>Mailbox</span>
									<h4 class="text-info"><?= numRows('inbox')+1; ?></h4>
									<span class="search_ad">View All</span><span>User Messages</span>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="divider25"></div>

			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-4">
					<div class="content form-bootstrap-datetime">
						<div class="calender-icon">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</div>
						<div id="startdate"></div>
						<div class="dashboard-calender">
							<div class="inline-calendar">
								<div data-plugin="flatpickr" data-enable-time="true" data-inline="true"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="content">
						<div class="dashboard-header">
							<h4 class="page-content-title float-xs-left">Newest Users <span class="btn btn-primary" onclick="goTo('?link=_users')">View All</span></h4>
							<div class="dashboard-action">
								<ul class="right-action float-xs-right">
									<li data-widget="collapse"><a href="javascript:void(0)" aria-hidden="true"><span class="icon_minus-06" aria-hidden="true"></span></a></li>
									<li data-widget="close"><a href="javascript:void(0)"><span class="icon_close" aria-hidden="true"></span></a></li>
								</ul>
							</div>
						</div>
						<div class="dashboard-box">
							<div class="basic_table basic_table_responsive table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Username</th>
											<th>User Plan</th>
											<th>Account Balance</th>
											<th>Registered Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$sn = 1;
											$sql = "SELECT * FROM users ORDER BY id DESC LIMIT 8";
											$query = mysqli_query($link, $sql);
											while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
										?>
										<tr>
											<td><?= $sn; ?></td>
											<td><?= $row["username"]; ?></td>
											<td><?= $row["plan"]; ?></td>
											<td><?= $row["amount"]; ?>$</td>
											<td>
												<span class="basic_table_icon"><?= $row["reg_time"]; ?></span> |
												<span class="basic_table_icon"><?= $row["reg_date"]; ?></span>
											</td>
										</tr>
										<?php $sn++; } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="content content-datatable datatable-width col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h4 class="page-content-title">Latest Transactions <span class="btn btn-primary" onclick="goTo('?link=_transactions')">View All</span></h4>
					<div class="row">
						<div class="col-md-12">
							<table data-plugin="datatable" data-scroll-y="150px", data-scroll-collapse="true" data-responsive="true" class="table table-striped table-hover dt-responsive">
								<thead>
									<tr>
										<th>S/N</th>
										<th>User</th>
										<th>Amount</th>
										<th>Profit</th>
										<th>Commission</th>
										<th>Transaction Time</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql = "SELECT * FROM transaction ORDER BY id DESC LIMIT 10";
										$query = mysqli_query($link, $sql);
										while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
									?>
									<tr class="odd gradeX">
										<td><?= $row["id"]; ?></td>
										<td><?= getUsername($row["user_id"]); ?></td>
										<td><?= ($row["amount"]<=10) ? '<span class="tag square-tag tag-danger">'.$row["amount"].' $</span>' : '<span class="tag square-tag tag-success">'.$row["amount"].' $</span>'; ?></td>
										<td><?= ($row["bonus"]<=1) ? '<span class="tag square-tag tag-danger">'.$row["bonus"].' $</span>' : '<span class="tag square-tag tag-success">'.$row["bonus"].' $</span>'; ?></td>
										<td><label class="label label-primary"> <?= $row["commission"]; ?>$ </label></td>
										<td><span class="basic_table_icon"><?= $row["time"]; ?> | <?= $row["date"]; ?> </span></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="content clock-content">
						<div class="dashboard-header">
							<h4 class="page-content-title float-xs-left">Clock time</h4>
							<div class="dashboard-action">
								<ul class="right-action float-xs-right">
									<li data-widget="collapse"><a href="javascript:void(0)" aria-hidden="true"><span class="icon_minus-06" aria-hidden="true"></span></a></li>
									<li data-widget="close"><a href="javascript:void(0)"><span class="icon_close" aria-hidden="true"></span></a></li>
								</ul>
							</div>
						</div>
						<div class="dashboard-box">
							<div onload="CoolClock.findAndCreateClocks()" class="text-xs-center">
								<canvas class="CoolClock:classic"></canvas>
							</div>
							<div class="clock-section">
								<div class="col-xs-3">
									<span class="pe-7s-clock text-white"></span>
									<p class="text-white">Clock</p>
								</div>
								<div class="col-xs-3">
									<span class="pe-7s-alarm"></span>
									<p>Alarm</p>
								</div>
								<div class="col-xs-3">
									<span class="pe-7s-timer"></span>
									<p>Timer</p>
								</div>
								<div class="col-xs-3">
									<span class="pe-7s-wristwatch"></span>
									<p>Watch</p>
								</div>
							</div>
						</div>
					</div>
				</div>
							
			</div>
			
		</div>
	</section>
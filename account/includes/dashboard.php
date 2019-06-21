<style>
div.o_l {
    position:absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-color:rgba(0, 0, 0, 0.5);
    background: url(data:;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAYAAABytg0kAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAABl0RVh0U29mdHdhcmUAUGFpbnQuTkVUIHYzLjUuNUmK/OAAAAATSURBVBhXY2RgYNgHxGAAYuwDAA78AjwwRoQYAAAAAElFTkSuQmCC) repeat scroll transparent\9; /* ie fallback png background image */
    z-index:1000;
    color:white;
	text-align:center;
}
.o_l-text{
	color:white;
	z-index:2000;
	margin: 50px auto;
	vertical-align:middle;
}
</style>
	<section id="content-wrapper" class="form-elements">
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
						<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 col-xs-12">
							<div class="dashboard-widget widget-box dashboard-xs-widget">
								<div class="widget-content text-xs-right">
									<div class="product-icon bg-danger">
										<i class="product-hover icon_printer"></i>
										<i class="display-icon icon_printer"></i>
									</div>
									<span>Package</span>
									<h4 class="text-danger"><?= $user['plan']; ?></h4>
									<span class="search_ad">account</span> <span>User Plan</span>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 col-xs-12">
							<div class="dashboard-widget widget-box">
								<div class="widget-content text-xs-right">
								<div class="product-icon bg-success">
									<i class="product-hover icon_document"></i>
									<i class="display-icon icon_document"></i>
								</div>
								<span>Amount</span>
								<h4 class="text-success"><?= $user['amount']; ?>$</h4>
								<span class="search_ad bg-danger">account</span><span>Working Balance</span>
								</div>
							</div>
						</div>
						<div class="divider-lg-spacing"></div>
						<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 col-xs-12">
							<div class="dashboard-widget widget-box dashboard-xs-widget">
								<div class="widget-content text-xs-right">
									<div class="product-icon bg-primary">
										<i class="product-hover icon_contacts"></i>
										<i class="display-icon icon_contacts"></i>
									</div>
									<span>Profit/Loss</span>
									<?= ($profit<5) ? '<h4 class="text-danger">'. $profit .'$</h4>' : '<h4 class="text-primary">'. $profit .'$</h4>'; ?>
									<span class="search_ad bg-success">Trade</span>
									<span>Transactions</span>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 col-xs-12">
							<div class="dashboard-widget widget-box">
								<div class="widget-content text-xs-right">
									<div class="product-icon bg-info">
										<i class="product-hover icon_bag"></i>
										<i class="display-icon icon_bag"></i>
									</div>
									<span>Commissions</span>
									<h4 class="text-info"><?= ($comm=='') ? 0 : $comm; ?>$</h4>
									<span class="search_ad">View</span><span>Account Commissions</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="divider25"></div>

			<div class="row">
				<div class="col-md-4 col-lg-4 col-xl-4">
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
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="content">
						<div class="dashboard-header">
							<h4 class="page-content-title float-xs-left">Transaction Details</h4>
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
											<th>Account Balance</th>
											<th>Profit/Loss</th>
											<th>Commission</th>
											<th>Transaction Time</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$Tid = $user['id'];
											$sql = "SELECT * FROM transaction WHERE user_id=$Tid ORDER BY id DESC LIMIT 8";
											$query = mysqli_query($link, $sql);
											$x=7;
											while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
										?>
										<tr>
											<td><?= $x; ?></td>
											<td><?= $row["amount"]; ?>$</td>
											<td><?= ($row["bonus"]<=0) ? '<span class="tag square-tag tag-danger">'.$row["bonus"].' $</span>' : '<span class="tag square-tag tag-success">'.$row["bonus"].' $</span>'; ?></td>
											<td><?= ($row["commission"]==0) ? '--' : $row["commission"].'$'; ?></td>
											<td>
												<span class="basic_table_icon"><?= $row["time"]; ?></span> |
												<span class="basic_table_icon"><?= $row["date"]; ?></span>
											</td>
										</tr>
										<?php $x--; } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="content">
						<div class="dashboard-header">
							<h4 class="page-content-title float-xs-left">Contact details</h4>
							<div class="dashboard-action">
									<ul class="right-action float-xs-right">
									<li data-widget="collapse"><a href="javascript:void(0)" aria-hidden="true"><span class="icon_minus-06" aria-hidden="true"></span></a></li>
									<li data-widget="close"><a href="javascript:void(0)"><span class="icon_close" aria-hidden="true"></span></a></li>
								</ul>
							</div>
						</div>
						<div class="dashboard-box">
							<div class="cover-widget" style="background:url(<?= $avatar_src; ?>) top no-repeat; height:300px">
								<div class="cover-widget-detail">
									<div class="profile-image">
										<img src="<?= $avatar_src; ?>" alt="tag image">
									</div>
									<div class="text-xs-center text-secondary">
										<h4 class="text-secondary"><?= $user['username']; ?></h4>
										<span>Trader</span>
										<button href="?link=profile" class="btn btn-primary" onClick="goTo('?link=profile')">Change profile</button>
									</div>
								</div>
								<!--div class="social-icon-box">
									<div class="row m-0">
										<div class="col-xs-6 col-sm-3 p-0">
											<a href="#" class="text-xs-center social-icon-widget social-facebook">
												<i class="fa fa-facebook"></i>
												<span>344</span>
											</a>
										</div>
										
									</div>
								</div-->
							</div>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
	</section>
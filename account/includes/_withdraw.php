	<section id="content-wrapper" class="form-elements" style="background-color:#ffc">
		<div class="site-content-title">
			<h2 class="float-xs-left content-title-main">Dashboard</h2>
		 
			<ol class="breadcrumb float-xs-right">
				<li class="breadcrumb-item">
					<span class="fs1" aria-hidden="true" data-icon="?"></span>
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item"><?= $_GET['link']; ?></li>
			</ol>
		 
		</div>
		 
		<div class="contain-inner dashboard-v1 dashboard-v2">
						
			<div class="divider25"></div>
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12">
					<div class="dashboard-widget widget-box dashboard-xs-widget">
						<div class="widget-content text-xs-right">
							<div class="product-icon bg-primary">
								<i class="product-hover icon_contacts"></i>
								<i class="display-icon icon_contacts"></i>
							</div>
							<span>Withdrawals</span>
							<h4 class="text-primary"><?= numRows('withdraw'); ?></h4>
							<span>Withdrawal Requests</span>
						</div>
					</div>
				</div>
			</div>
			<div class="divider25"></div>

			<div class="row">
				<div class="content content-datatable datatable-width col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h4 class="page-content-title">Withdrawal Requests</h4>
					<div class="row">
						<div class="col-md-12">
							<table data-plugin="datatable" data-scroll-y="400px", data-scroll-collapse="true" data-responsive="true" class="table table-striped table-hover dt-responsive">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Username</th>
										<th>Amount</th>
										<th>Wallet Type</th>
										<th>Wallet Address</th>
										<th>Email</th>
										<th>Request Time</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql = "SELECT * FROM withdraw ORDER BY id DESC";
										$query = mysqli_query($link, $sql);
										while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
									?>
									<tr class="odd gradeX">
										<td><?= $row["id"]; ?></td>
										<td><?= $row["username"]; ?></td>
										<td><span class="tag square-tag tag-danger"><?= $row["amount"]; ?></span></td>
										<td><span class="tag square-tag tag-info"><?= $row["wallet"]; ?></span></td>
										<td style="font-weight: bold; color:#a00"><?= $row["wal_adr"]; ?></td>
										<td><?= $row["email"]; ?></td>
										<td><?= $row["time"]; ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
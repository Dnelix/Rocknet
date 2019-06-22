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
							<div class="product-icon bg-danger">
								<i class="product-hover icon_contacts"></i>
								<i class="display-icon icon_contacts"></i>
							</div>
							<span>Transactions</span>
							<h4 class="text-danger"><?= numRows('transaction'); ?></h4>
							<span>System Transactions</span>
						</div>
					</div>
				</div>
			</div>
			<div class="divider25"></div>

			<div class="row">
				<div class="content content-datatable datatable-width col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h4 class="page-content-title">All Transactions</h4>
					<div class="row">
						<div class="col-md-12">
							<table data-plugin="datatable" data-scroll-y="400px", data-scroll-collapse="true" data-responsive="true" class="table table-striped table-hover dt-responsive">
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
										$sql = "SELECT * FROM transaction ORDER BY id ASC";
										$query = mysqli_query($link, $sql);
										while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
									?>
									<tr class="odd gradeX">
										<td><?= $row["id"]; ?></td>
										<td><?= getUsername($row["user_id"]); ?></td>
										<td><?= ($row["amount"]<=10) ? '<span class="tag square-tag tag-danger">'.$row["amount"].' $</span>' : '<span class="tag square-tag tag-success">'.$row["amount"].' $</span>'; ?></td>
										<td><?= ($row["bonus"]<=1) ? '<span class="tag square-tag tag-danger">'.$row["bonus"].' $</span>' : '<span class="tag square-tag tag-success">'.$row["bonus"].' $</span>'; ?></td>
										<td><span class="tag square-tag tag-info"> $<?= $row["commission"]; ?> </span></td>
										<td><span class="basic_table_icon"><?= $row["time"]; ?> | <?= $row["date"]; ?> </span></td>
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
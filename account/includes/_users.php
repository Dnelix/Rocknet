<?php
//getting all users
$select_user = mysqli_query($link, "select * from users where username!='Don' order by id desc");
$count = mysqli_num_rows($select_user);
while ($user = mysqli_fetch_array($select_user)) {
    $usr_id[] = $user['id'];
    $user_photo[] = $user['photo'];
    $user_username[] = $user['username'];
    $user_fullname[] = $user['fullname'];
    $user_referer[] = $user['referee'];
    $user_plan[] = $user['plan'];
    $user_bal[] = $user['amount'];
    $user_email[] = $user['email'];
    $user_phone[] = $user['phone_number'];
    $user_act[] = $user['activated'];
    $u_reg_date[] = $user['reg_date'];
    $u_reg_time[] = $user['reg_time'];
}

?>
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
							<div class="product-icon bg-success">
								<i class="product-hover icon_contacts"></i>
								<i class="display-icon icon_contacts"></i>
							</div>
							<span>All Users</span>
							<h4 class="text-success"><?= numRows('users'); ?></h4>
							<span>Registered System Users</span>
						</div>
					</div>
				</div>
			</div>
			<div class="divider25"></div>

			<div class="row">
				<div class="content content-datatable datatable-width col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h4 class="page-content-title">All Users</h4>
					<div class="row">
						<div class="col-md-12">
							<table data-plugin="datatable" data-scroll-y="400px", data-scroll-collapse="true" data-responsive="true" class="table table-striped table-hover dt-responsive">
								<thead>
									<tr>
										<th>Photo</th>
										<th>Username</th>
										<th>User Plan</th>
										<th>Balance</th>
										<th>Full Name</th>
										<th>Email</th>
										<th>Phone</th>
										<!--th>Referee</th>
										<th>Status</th-->
										<th>Reg. Date</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php for ($s = 0; $s < $count; $s++) { ?>
									<tr class="odd gradeX">
										<td>
											<?= ($user_photo[$s]=='') ? '<img alt="photo" src="uploads/avatar2.png" style="width:50px; height:50px;"/>' : '<img alt="photo" src="uploads/'.$user_photo[$s].'" style="width:50px; height:50px;"/>'; ?>
										</td>
										<td><?= ucfirst($user_username[$s]); ?></td>
										<td><a href="javascript:;" title="Change User Plan" onClick="changePlan('<?=$usr_id[$s];?>','<?=$user_plan[$s];?>')">[<span class="tag square-tag tag-info"><?= ucfirst($user_plan[$s]); ?></span>]</a></td>
										<td><a href="javascript:;" title="Credit/Debit User" onClick="goTo('?link=_credit_users&usr=<?=$usr_id[$s];?>')">[<span class="tag square-tag tag-success"><?= $user_bal[$s]; ?></span>]</a></td>
										<td><?= ucfirst($user_fullname[$s]); ?></td>
										<td><a href="mailto:<?= strtolower($user_email[$s]); ?>"><?= strtolower($user_email[$s]); ?> </a></td>
										<td><?= $user_phone[$s]; ?></td>
										<!--td><?//= $user_referer[$s]; ?></td>
										<td>
											<?//= ($user_act[$s]=='1') ? '<span class="tag square-tag tag-danger">Activated </span>' : '<span class="tag square-tag tag-primary">Inactive </span>'; ?>
										</td-->
										<td><?= $u_reg_date[$s]; ?><br/><span class="tag square-tag tag-primary"><?= $u_reg_time[$s]; ?></span></td>
										<td>
											<span class="btn btn-danger" onClick="deleteuser('<?= $usr_id[$s];?>')" id="del_btn<?= $usr_id[$s];?>">Delete User</span>
										</td>
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
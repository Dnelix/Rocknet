<?php
//getting all users
$select_user = mysqli_query($link, "select id,username,isAdmin from users where username!='Don' order by id desc");
$count = mysqli_num_rows($select_user);
while ($user = mysqli_fetch_array($select_user)) {
    $usr_id[] = $user['id'];
		$user_username[] = $user['username'];
		$user_isAdmin[] = $user['isAdmin'];
}
?>
	<section id="content-wrapper" class="form-elements" style="background-color:#ffc">
		<div class="site-content-title">
			<h2 class="float-xs-left content-title-main">Add Admin</h2>
		 
			<ol class="breadcrumb float-xs-right">
				<li class="breadcrumb-item">
					<span class="fs1" aria-hidden="true" data-icon="?"></span>
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item"><?= $_GET['link']; ?></li>
			</ol>
		 
		</div>
		<div class="card col-md-8">
			<div class="card-block"><p>
				<h4 class="page-content-title">Select or search for a user</h4>
				<table data-plugin="datatable" data-scroll-y="400px", data-scroll-collapse="true" data-responsive="true" class="table table-striped table-hover dt-responsive">
					<thead>
						<tr>
							<th>Username</th>
							<th style="text-align:right">Add/Remove Admin</th>
						</tr>
					</thead>
					<tbody>
						<?php for ($s = 0; $s < $count; $s++) { ?>
						<tr class="odd gradeX">
							<td><?= ucfirst($user_username[$s]); ?></td>
							<td style="text-align:right">
						<?php if($user_isAdmin[$s] == 1) { ?><span class="btn btn-success" onClick="toggleAdmin('<?=$usr_id[$s];?>','<?=$user_isAdmin[$s];?>')">Remove Admin</span>
						<?php } else { ?> <span class="btn btn-danger" onClick="toggleAdmin('<?=$usr_id[$s];?>')">Make Admin</span> <?php } ?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</p></div>
		</div>
	</section>
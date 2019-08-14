<section id="content-wrapper" class="form-elements">
		<div class="site-content-title">
			<h2 class="float-xs-left content-title-main">My Referrals</h2>
		 
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
				<div class="col-xl-5 col-md-5 col-xs-12 contacts">
          <div class="content text-xs-center">
            <div class="user-name-profile col-xl-12 col-md-12 col-xs-12">
              <div style="font-size:9pt"><i>Tell new users to register with your referral link or ask them to type your <b>USERNAME</b> as their referee while registering.</i></div><br/>
              <div class="left-name-profile float-xs-left">My Referral Link:</div>
              <div class="detail-profile float-xs-right"><a href="<?= $c_web.'?ref='.$user['username']; ?>"><?= $c_web.'?ref='.$user['username']; ?></a></div>
            </div>
            <div class="user-name-profile col-xl-12 col-md-12 col-xs-12">
              <div class="left-name-profile float-xs-left">Total Referrals:</div>
              <div class="detail-profile float-xs-right"><h2><?= numRefs($user['username'])+numRefs($user['email']); ?></h2></div>
            </div>
            <div class="user-name-profile col-xl-12 col-md-12 col-xs-12">
              <div class="left-name-profile float-xs-left">Commissions Earned:</div>
              <div class="detail-profile float-xs-right"><h3>$<?= ($ref_bonus)*(numRefs($user['username'])+numRefs($user['email'])); ?></h3></div>
            </div>

          </div>
        </div>
        
        <div class="col-xl-7 col-md-7 col-xs-12">
					<div class="content">
            <h4 class="page-content-title">My Referrals</h4>
            <div class="row">
              <div class="col-md-12">
                <table data-scroll-y="400px" data-scroll-collapse="true" data-responsive="true" class="table table-striped table-hover dt-responsive">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Referral</th>
                      <th>Commission</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT * FROM users WHERE referee='{$user['username']}' OR referee='{$user['email']}' ORDER BY id DESC";
                      $query = mysqli_query($link, $sql);
                      if(mysqli_num_rows($query)<1){
                    ?>
                      <div class="col-md-12">You have no active referrals yet. Keep referring!</div>
                    <?php
                      } else { $x=1;
                      while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                    ?>
                    <tr class="odd gradeX">
                      <td><?= $x; ?></td>
                      <td><?= $row["username"]." (".$row["email"].")"; ?></td>
                      <td><span class="tag square-tag tag-danger">$ <?= $ref_bonus; ?></span></td>
                    </tr>
                    <?php $x++; } } ?>
					</tbody>
				</table>
            </div>
            
          </div>
        </div>
      </div>
    </div>
</section/>
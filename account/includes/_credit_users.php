<?php
//getting form data
if (isset($_POST['amount'])) {
    $userTransactionId = filter_input(INPUT_POST, 'user');
    $transactionAmount = filter_input(INPUT_POST, 'amount');
    $bonus = filter_input(INPUT_POST, 'bonus');
    $commission = filter_input(INPUT_POST, 'commission');
    $d_b = filter_input(INPUT_POST, 'daily');
    $date = date('m/d/Y');
    $time = date('H:i:s');
    $bal = mysqli_query($link, "SELECT * FROM users WHERE id = '$userTransactionId'");
    if ($ret = mysqli_fetch_assoc($bal)) {
        $user_amount = $ret['amount'];
    }
    $balance = $transactionAmount; //+ $user_amount;

    if ($userTransactionId == "" || $transactionAmount == "") {
        $prompt = '<div class="alert alert-danger">Error selecting user, select a valid customer and input Amount</div>';
    } else {
        $tranQuery = "INSERT INTO transaction (user_id, amount, bonus, dailybonus, commission, date, time) VALUES ('$userTransactionId', '$transactionAmount', '$bonus', '$d_b', '$commission', now(), now())";
        $transactionResult = mysqli_query($link, $tranQuery);
        $balQuery = mysqli_query($link, "UPDATE users SET amount = '$balance' WHERE id = '$userTransactionId'");
        if (isset($transactionResult) && isset($balQuery)) {
            $prompt = '<div class="alert alert-success">User successfully Credited</div>';
        } else {
            $prompt = '<div class="alert alert-danger">*User cannot be credited at the moment try again later</div>';
        }
    }
}
?>
<?php
//getting all users
$select_user = mysqli_query($link, "select id,username,plan,amount from users order by id desc");
$count = mysqli_num_rows($select_user);
while ($user = mysqli_fetch_array($select_user)) {
    $usr_id[] = $user['id'];
	$user_username[] = $user['username'];
    $user_plan[] = $user['plan'];
    $user_bal[] = $user['amount'];
}
?>
	<section id="content-wrapper" class="form-elements" style="background-color:#ffc">
		<div class="site-content-title">
			<h2 class="float-xs-left content-title-main">Credit/Debit Users</h2>
			<ol class="breadcrumb float-xs-right">
				<li class="breadcrumb-item">
					<span class="fs1" aria-hidden="true" data-icon="?"></span>
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item"><?= $_GET['link']; ?></li>
			</ol>
		</div>
		<div class="card col-md-12">
			<div class="card-block"><p>
				
			<?php
				if(isset($_GET["usr"]) || isset($prompt)){
				include_once("includes/constants.php");
				$uz = $_GET["usr"];

				$sql = "SELECT * FROM transaction WHERE user_id='{$uz}' ORDER BY id DESC LIMIT 1";
				$query = mysqli_query($link, $sql);
				$counts = mysqli_num_rows($query);
				$u = getUsername($uz);
				
				if(!$query){echo mysqli_error($link); exit();}
				
				if($counts<1){
					$amt = 0;
					$profit = 0;
					$comm = 0;
					$daily = 0;
				} else
				while($row=mysqli_fetch_array($query)){
				$amt = ($row['amount'] == '') ? 0 : $row['amount'];
				$profit = ($row['bonus'] == '') ? 0 : $row['bonus'];
				$comm = ($row['commission'] == '') ? 0 : $row['commission'];
				$daily = ($row['dailybonus'] == '') ? 0 : $row['dailybonus'];
				}
			?>
				<form method="post">
					<div>
						<h4>CREDIT USER: [<span style="color:red"><?= strtoupper($u['username']);?></span>]</h4>
					</div>
					<?php if (isset($prompt)) { ?>
						<div class="row">
							<div class="col-md-12">
								<p><?= $prompt; ?></p>
							</div>
						</div>
					<?php } ?>
					<div class="form-group">
						<label>Amount</label>
						<input id="user" name="user" type="hidden" value="<?=$uz;?>">
						<input id="amount" name="amount" required type="text" value="<?=$amt;?>" class="form-control">
					</div>
					<div class="form-group">
						<label>Profit</label>
						<input id="bonus" name="bonus" required type="text" value="<?=$profit;?>" class="form-control">
					</div>
					<div class="form-group">
						<label>Commission</label>
						<input id="equity" name="commission" type="text" value="<?=$comm;?>" class="form-control">
					</div>
					<div class="form-group">
						<label>Daily Bonus</label>
						<input id="daily" name="daily" type="text" value="<?=$daily;?>" class="form-control">
					</div>
					<div class="margiv-top-10">
						<button type="submit" class="btn btn-primary" name="edit_profile">Save Changes</button>
						<button type="reset" class="btn btn-default">Cancel </button> &nbsp;
						<button type="button" class="btn btn-primary" onClick="goTo('?link=_credit_users')">Back to My Users </button>
					</div>
				</form>
							
			<?php } else {?>
				<h4 class="page-content-title">Select or search for a user</h4>
				<table data-plugin="datatable" data-scroll-y="400px", data-scroll-collapse="true" data-responsive="true" class="table table-striped table-hover dt-responsive">
					<thead>
						<tr>
							<th>Username</th>
							<th>User Plan</th>
							<th>Amount/Balance</th>
							<th>Credit User</th>
						</tr>
					</thead>
					<tbody>
						<?php for ($s = 0; $s < $count; $s++) { ?>
						<tr class="odd gradeX">
							<td><?= ucfirst($user_username[$s]); ?></td>
							<td><label class="tag square-tag tag-info"><?= ucfirst($user_plan[$s]); ?></label></td>
							<td><label class="tag square-tag tag-success"><?= $user_bal[$s]; ?></label></td>
							<td>
								<span class="btn btn-danger" onClick="goTo('?link=_credit_users&usr=<?=$usr_id[$s];?>')">Credit User</span>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>
			</p></div>
		</div>
	</section>
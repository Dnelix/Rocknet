<?php
if (isset($_POST['withdraw'])) {
    $un = filter_input(INPUT_POST, 'username');
    $e = filter_input(INPUT_POST, 'email');
    $amt = filter_input(INPUT_POST, 'amt');
    $wallet = filter_input(INPUT_POST, 'wallet');
    $wal_adr = filter_input(INPUT_POST, 'wal_adr');
    $avail = filter_input(INPUT_POST, 'avail_witd');

	
    if ($un == "" || $e == "" || $wallet == "" || $wal_adr == "") {
        $msg = "<div style='color:red; font-weight:bold'>* Some fields are missing</div>";
    } else if($avail <= 500){
				$msg = "<div style='color:red; font-weight:bold'>* SORRY: You do not have sufficient funds to process a withdrawal. </div>";
		} else if($amt > $avail){
				$msg = "<div style='color:red; font-weight:bold'>* ERROR: The amount you requested is more than what you have available for withdrawal. </div>";
		} else {
        $query = "INSERT INTO withdraw (username, email, amount, wallet, wal_adr, time) VALUES ('{$un}', '{$e}', '{$amt}', '{$wallet}', '{$wal_adr}', now())";
        $update_result = mysqli_query($link, $query);
		
			//-----------send a mail-----//
			  
			  $to = $private_mail;
              $subject = 'Withdrawal Request';
              $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Withdrawal Request on '.$company.'</title></head><body style="margin:0px;font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px;background:#a00;font-size:24px;color:#fff;">Withdrawal Request on '.$company.'</div><div style="padding:24px; font-size:17px;">Hello, a request for fund withdrawal has just been made.<br/><br/>Here are the details:<br/>Username: <b>'.$username.'</b><br/>E-mail Address: <b>'.$email.'</b><br/>Amount: <b>'.$amt.'</b>Wallet: <b>'.$wallet.'</b>Wallet Address: <b>'.$wal_adr.'</b></div></body></html>';

              $from = $c_email;
              $headers = "From: $from\n";
              $headers .= "MIME-Version: 1.0\n";
              $headers .= "Content-type: text/html; charset=iso-8859-1\n";
              mail($to, $subject, $message, $headers);
			  
        if ($update_result) {
            $msg = "<div style='color:green; font-weight:bold'>Your Request has been sent. Please wait patiently for approval. DO NOT RESEND REQUEST WITHIN 24HRS</div>";
        } else {
            $msg = "<div style='color:red; font-weight:bold'>Withdrawal Request Failed, Please Try Again Later</div>";
        }
    }
}
?>
	<section id="content-wrapper" class="form-elements">
		<div class="site-content-title">
			<h2 class="float-xs-left content-title-main">Dashboard</h2>
		 
			<ol class="breadcrumb float-xs-right">
				<li class="breadcrumb-item">
					<span class="fs1" aria-hidden="true" data-icon="?"></span>
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item"><a href="#">Main</a></li>
				<li class="breadcrumb-item"><?= $_GET['link']; ?></li>
			</ol>
		 
		</div>
		<!-- BEGIN PAGE CONTENT-->
		<div class="contain-inner dashboard-v1">
			<div class="card col-md-8">
				<div class="card-block"><p>
					<?php if (isset($msg)) { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?= $msg; ?></p>
                            </div>
                        </div>
                    <?php } ?>
					<form method="post">
						<div class="form-group">
							<label class="control-label">Username</label>
							<input type="text" class="form-control" value="<?= $user['username']; ?>" name="username" required/>
						</div>
						<div class="form-group">
							<label class="control-label">Email</label>
							<input type="email" class="form-control" value="<?= $user['email']; ?>" name="email" required/>
						</div>
						<div class="form-group">
							<label class="control-label">Amount to Withdraw</label>
							<input type="number" class="form-control" name="amt" required/>
						</div>
						<div class="form-group">
							<label class="control-label">Wallet Type</label>
							<input type="text" class="form-control" placeholder="Eg: BITCOIN" name="wallet" required/>
						</div>
						<div class="form-group">
							<label class="control-label">Wallet Address</label>
							<input type="text" class="form-control" placeholder="Enter the Receiving Address" name="wal_adr" required/>
						</div>

						<input type="hidden" value="<?= $avail_for_withd;?>" name="avail_witd"/>
						
						<div class="margin-top-10">
							<button type="submit" class="btn btn-primary" name="withdraw">
							Request Fund Withdrawal </button>
							<button type="reset" class="btn btn-default">
							Cancel </button>
						</div>
					</form>
					</p></div>
				</div>

				<div class="card col-md-4">
					<div class="col-md-12">
						<div class="card-block"><p>
							<h6>TOTAL AMOUNT IN ACCOUNT</h6>
							<span style="font:9pt italic">(Balance + Profit + Commissions)</span>
							<h4>$<?= $total_amt_avail; ?></h4>
						</p></div>
						<hr/>
						<div class="card-block"><p>
							<h6>AVAILABLE FOR WITHDRAWAL</h6>
							<span style="font:9pt italic">(At the end of Maturity Period)</span>
							<h4>$<?= $avail_for_withd; ?></h4>
						</p></div>

					</div>
				</div>
		</div>
	</section>
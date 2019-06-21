<?php
if(isset($_POST['email'])){
//db_connect
require_once '../constants.php';
require_once '../user_functions.php';

$activation_path = $c_web.'/account/templates/admin/includes/parse/activation.php';
$id = $user['id'];
$i = $user['password'];
$user = $user['username'];

//-----------send a mail-----//
  $to = $_POST['email'];
  $subject = 'Email Activation';
  $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Activate Email on '.$company.'</title></head><body style="margin:0px;font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px;background:#a00;font-size:24px;color:#fff;">Email Activation</div><div style="padding:24px; font-size:17px;">Please click on the link below to activate your account on '.$company.':<br/><b><a href="'.$activation_path.'?u='.$user.'&id='.$id.'&i='.$i.'">EMAIL ACTIVATION LINK</a></b><br/>If you have any issues regarding activation, please contact us.</div></body></html>';

  $from = $c_email;
  $headers = "From: $from\n";
  $headers .= "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";

	if (mail($to, $subject, $message, $headers)) {
		echo "sent";
	} else { echo "failed";}
	
}
?>

<?php
if(isset($_POST['receiver'])){
//db_connect
require_once '../constants.php';
require_once '../user_functions.php';

	$r = $_POST['receiver'];
	$usname = $user['username'];
	$usmail = $user['email'];
	
	($r=="admin") ? $e = $private_mail : $e = $user['email'];
	
	//-----------send a mail-----//
	  $to = $e;
	  $subject = 'Payment Confirmation Request';
	  $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Payment confirmation Request on '.$company.'</title></head><body style="margin:0px;font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px;background:#a00;font-size:24px;color:#fff;">Payment Confirmation Request on '.$company.'</div><div style="padding:24px; font-size:17px;">Hello, the User <b>'.$usname.'</b> with E-mail Address: <b>'.$usmail.'</b> claims to have made payment to your company wallet. Please confirm and credit accordingly. <br/><i>Best regards.</i></div></body></html>';

	  $from = $c_email;
	  $headers = "From: $from\n";
	  $headers .= "MIME-Version: 1.0\n";
	  $headers .= "Content-type: text/html; charset=iso-8859-1\n";

		if (mail($to, $subject, $message, $headers)) {
			echo '<span style="font-weight:bold; color:green"> Payment Confirmation request has been sent! When confirmed, funds will reflect on your dashboard in less than 24hrs</span>';
		} else { echo '<font color="red"><b>Error in sending Email, please try again.</b></font>'; }
}
?>

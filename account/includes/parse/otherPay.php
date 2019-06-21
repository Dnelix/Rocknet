<?php
if(isset($_POST['u'])){
//db_connect
require_once '../constants.php';
require_once '../user_functions.php';

$id = $user['id'];
$u = $_POST['u'];
$a = $_POST['a'];
$p = $_POST['p'];
$n = $_POST['n'];
$e = $_POST['e'];

//-----------send a mail-----//
  $to = $private_mail;
  $subject = 'Payment Details Request';
  $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Payment Details Request</title></head><body style="margin:0px;font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px;background:#a00;font-size:24px;color:#fff;">Payment Details Request</div><div style="padding:24px; font-size:17px;">The User below is requesting for an alternate payment method, please supply if available<br/><br/><b>User:</b> '.$u.'<br/><b>Amount:</b> '.$a.'<br/><b>Payment Option:</b> '.$p.'<br/><b>Full Name:</b> '.$n.'<br/><b>Email:</b> '.$e.'<br/></div></body></html>';

  $from = $c_email;
  $headers = "From: $from\n";
  $headers .= "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";

	if (mail($to, $subject, $message, $headers)) {
		echo "sent";
	} else { echo "failed";}
	
} 
else { exit(); }
?>
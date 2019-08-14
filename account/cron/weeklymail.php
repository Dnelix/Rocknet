<?php
	include('../includes/constants.php');

	$sql = "SELECT email FROM users WHERE amount < 50";
	$query = mysqli_query($link, $sql);

	if (mysqli_num_rows($query) > 0){
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
		
			  $to = $row["email"];
              $subject = $company.' - Fund Your Account';
              $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>'.$company.' - Fund Your Account</title></head><body style="margin:0px;font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px;background:#444;font-size:24px;color:#fff;">Low Account Funds</div><div style="padding:24px; font-size:17px;>Dear valued Customer,<br/><br/>Thank you for choosing us. '.$company.' remains your most trusted investment partner.<br/><br/>Sadly, we have noticed that your account has not been funded this week or is low on funds. This is a reminder that your profits are just an investment away!<br/><br/><b>NOTE:</b> If you are having any issues with funding your account, our customer service personnel would be glad to help out. Simply send us an email at our official address <a href="mailto:'.$c_mail.'">'.$c_mail.'</a>.<br/><div style="padding:10px;background:#444;font:14px bold italic;color:#fff;">Thank you for making '.$company.' your preferred choice. We are committed to excellent service delivery for all our customers.</div></body></html>';

              $from = $c_email;
              $headers = "From: $from\n";
              $headers .= "MIME-Version: 1.0\n";
              $headers .= "Content-type: text/html; charset=iso-8859-1\n";
              mail($to, $subject, $message, $headers);
		}
	}
?>
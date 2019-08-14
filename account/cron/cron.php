<?php
	include('../includes/constants.php');

	$add_bonus = "UPDATE transaction SET bonus = bonus+dailybonus WHERE dailybonus!=0";
	$bonus_query = mysqli_query($link, $add_bonus);

	if ($bonus_query){
			  $to = $private_mail;
              $subject = 'Automatic Crediting';
              $message = '<h2>Great!</h2><h3>Todays daily bonus has been automatically credited for everyone.</h3>';

              $from = $c_email;
              $headers = "From: $from\n";
              $headers .= "MIME-Version: 1.0\n";
              $headers .= "Content-type: text/html; charset=iso-8859-1\n";
              mail($to, $subject, $message, $headers);
	} else {
			  $to = $private_mail;
              $subject = 'Automatic Crediting';
              $message = '<h2>Sorry!</h2><h3>Unfortunately, something went wrong and we could not credit anyone automatically today!</h3>';

              $from = $c_email;
              $headers = "From: $from\n";
              $headers .= "MIME-Version: 1.0\n";
              $headers .= "Content-type: text/html; charset=iso-8859-1\n";
              mail($to, $subject, $message, $headers);
	}
?>

<?php
if(isset($_POST['cash'])){
	$c = $_POST['cash'];
	//db_connect
	require_once '../constants.php';
	require_once '../user_functions.php';
	
	//You might wanna do a little test here to determine cash cap ($c) depending on user plan
	$usr = $user['username'];
	$usrID = $user['id'];
	$newAmt = $user['amount'] + $c;

	//add $cash to whatever is in amount. Also reflect this in transaction table with $cash as the new bonus
	$tranQuery = "UPDATE transaction SET amount = '{$newAmt}', bonus = '{$c}' WHERE username = '{$usr}' AND id = '{$usrID}' ORDER BY id DESC LIMIT 1";
	$tranResult = mysqli_query($link, $tranQuery);
	if(!$tranResult){echo "failed " . mysqli_error($link);}
	
	$query = "UPDATE users SET amount = '{$newAmt}' WHERE username = '{$usr}' AND id = '{$usrID}' LIMIT 1";
	$add_amt = mysqli_query($link, $query);
	if(!$add_amt){echo "failed";}
	
}
?>

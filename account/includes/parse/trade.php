<?php
if(isset($_POST['amt'])){
	$am = $_POST['amt'];
	//db_connect
	require_once '../constants.php';
	require_once '../user_functions.php';
	
	//Check if account is credited
	$usrN = $user['username'];
	$usrID = $user['id'];
	if($user['amount'] < 10){ echo "Low Funds! Please Credit Account";} else {
	
		//subtract $a(2) from whatevr is in amt. Also reflect this in transaction table with $a(-2) as the new bonus
		$newAmt = $user['amount'] - $am;
		
		$query = "UPDATE users SET amount = '{$newAmt}' WHERE username = '{$usrN}' AND id = '{$usrID}' LIMIT 1";
		$deduct_amt = mysqli_query($link, $query);
		
		$tranQuery = "INSERT INTO transaction (user_id, amount, bonus, time, date) VALUES ('$usrID', '$newAmt', '-$am', now(), now())";
		$tranResult = mysqli_query($link, $tranQuery);
		
		if(!$deduct_amt){
			echo "Cannot start trade! Please Try Again.".mysqli_error($link);
		} else if(!$tranResult){
			echo "Cannot start trade! Please Try Again.".mysqli_error($link);
		} else echo "OK";
		
	}
}
?>
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
	$tranQuery = "UPDATE transaction SET amount = '{$newAmt}', bonus = '{$c}', time = now(), date = now() WHERE user_id = '{$usrID}' ORDER BY id DESC LIMIT 1";
	$tranResult = mysqli_query($link, $tranQuery);
	if(!$tranResult){echo "failed";}
	
	$query = "UPDATE users SET amount = '{$newAmt}' WHERE username = '{$usr}' AND id = '{$usrID}' LIMIT 1";
	$add_amt = mysqli_query($link, $query);
	if(!$add_amt){echo "failed";}
	
}
?>
<?php
if(isset($_GET['u'])){
//db_connect
require_once '../constants.php';
require_once '../user_functions.php';

$user = filter_input(INPUT_GET, 'u');
$id = filter_input(INPUT_GET, 'id');
$pass = filter_input(INPUT_GET, 'i');

$isActive = checkActive($id)['activated'];

$trans = getusertrans();
$profit = $trans['bonus'];
$newProfit = $profit!="" ? $profit+50 : 50;

	if($user!="" && $pass!=""){
		if($isActive=='1'){ 
		echo "<h1>This Account has already been Activated</h1><a href='".$c_web."/account'>Go to Account</a>"; 
		exit();
		}else{
			$query = "UPDATE users SET activated = 1 WHERE username = '$user' AND password = '$pass' AND activated = '0' LIMIT 1";
			$update_result = mysqli_query($link, $query);

			if ($update_result) {
				$tranQuery = "INSERT INTO transaction (user_id, amount, commission, bonus, withdraw, last_withdraw, time, date) VALUES ('$id','0', '0', '$newProfit', '0', '0', now(), now())";
				$tranResult = mysqli_query($link, $tranQuery);
				echo "<h1>ACTIVATION SUCCESSFUL!</h1><a href='".$c_web."/account'>Go back to Dashboard</a>";
			} else {
				echo "<h1>ACTIVATION FAILED! Try Again!</h1>";
			}
		}
	} else echo "<h1>ACTIVATION FAILED! Try Again</h1>";
	
}
 else {echo "<h1>ACTIVATION FAILED! Try Again</h1>"; exit();}
?>
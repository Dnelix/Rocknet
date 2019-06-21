<?php
if (isset($_POST['newPlan'])) {
	include_once("../constants.php");
    $userId = filter_input(INPUT_POST, 'user');
    $newPlan = filter_input(INPUT_POST, 'newPlan');
	if ($userId == "" ) {
        echo "* NULL"; exit();
    } else {
        
      $query = "UPDATE users SET plan = '{$newPlan}' WHERE id = '{$userId}' LIMIT 1";
      $chg_pln = mysqli_query($link, $query);
      if(!$chg_pln){echo "failed";}
    }
}
?>
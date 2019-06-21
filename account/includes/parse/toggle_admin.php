<?php
if (isset($_POST['isAdm'])) {
	include_once("../constants.php");
    $userId = filter_input(INPUT_POST, 'id');
    $isAdm = filter_input(INPUT_POST, 'isAdm');
	if ($userId == "" ) {
        echo "* NULL"; exit();
    } else {
      if($isAdm == 1){
        $query = "UPDATE users SET isAdmin = 0 WHERE id = '{$userId}' LIMIT 1";
        $chg_adm = mysqli_query($link, $query);
        if(!$chg_adm){echo "failed";}
      } else {
        $query = "UPDATE users SET isAdmin = 1 WHERE id = '{$userId}' LIMIT 1";
        $chg_adm = mysqli_query($link, $query);
        if(!$chg_adm){echo "failed";}
      }
    }
}
?>
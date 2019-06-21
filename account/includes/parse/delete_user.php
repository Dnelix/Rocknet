<?php
if (isset($_POST['duser'])) {
	include_once("../constants.php");
    $userId = filter_input(INPUT_POST, 'duser');
	if ($userId == "" ) {
        echo "* NULL"; exit();
    } else {
        $query = "DELETE FROM users WHERE id = '$userId' LIMIT 1";
        $query2 = "DELETE FROM transaction WHERE user_id = '$userId'";
        $delete_result = mysqli_query($link, $query);
        $delete_result2 = mysqli_query($link, $query2);
		
        if ($delete_result) {
           echo "Deleted";
        } else {
            echo "Failed!";
        }
    }
}
?>
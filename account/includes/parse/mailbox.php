<?php
if (isset($_POST['t'])) {
	require_once '../constants.php';
	require_once '../user_functions.php';
    $from = $user['id'];
    $to = filter_input(INPUT_POST, 't');
    $title = filter_input(INPUT_POST, 's');
    $body = filter_input(INPUT_POST, 'm');

    //echo $from.$to.$title.$body;
    if ($to == "ALL USERS"){$to = "USERS";}

    if ($from == "" || $to == "" || $title == "" || $body == "") {
        echo "<div class='alert alert-danger'>* Some fields are missing. Please retry.</div>";
    } else {
        $inQuery = "INSERT INTO inbox (title, body, sender, receiver, date, time) VALUES ('{$title}', '{$body}', '{$from}', '{$to}', now(), now())";
		$inResult = mysqli_query($link, $inQuery);

        if ($inResult) {
            echo "<div class='alert alert-success'>Message has been sent</div>";
        } else {
            echo "<div class='alert alert-danger'>Message sending failed ".mysqli_error($link)."</div>";
        }
    }
exit();
}
?>
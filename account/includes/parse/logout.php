<?php
require_once '../constants.php';

//calling session
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//unset session
$_SESSION = array();

	if(isset($_COOKIE["id"]) && isset($_COOKIE["user"])) {
		setcookie("id", '', strtotime( '-5 days' ), '/');
		setcookie("user", '', strtotime( '-5 days' ), '/');
	}
//destroy session
session_destroy();
	if(isset($_SESSION['user_id'])){
		echo "<h1>LOGOUT FAILED</h1>";
	} else {
		echo '<script type="text/javascript">window.location.href="../../login.php";</script>';
		exit();
	}
?>
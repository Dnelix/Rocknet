<?php
session_start();
if($_GET['admin']=="yes"){

	$_SESSION = array();
	
	session_destroy();
	// Double check to see if sessions exists
	if(isset($_SESSION['adminname'])){
		echo "<h1>LOGOUT FAILED</h1>";
	} else {
		header("location: adminlogin.php");
		exit();
	}
} else {
	// Set Session data to an empty array
	$_SESSION = array();
	// Expire their cookie files
	if(isset($_COOKIE["id"]) && isset($_COOKIE["user"]) && isset($_COOKIE["pass"])) {
		setcookie("id", '', strtotime( '-5 days' ), '/');
		setcookie("user", '', strtotime( '-5 days' ), '/');
		setcookie("pass", '', strtotime( '-5 days' ), '/');
	}
	// Destroy the session variables
	session_destroy();
	// Double check to see if their sessions exists
	if(isset($_SESSION['username'])){
		echo "<h1>LOGOUT FAILED</h1>";
	} else {
		header("location: ../login.php");
		exit();
	}
}
?>
<?php
include_once 'includes/constants.php';
include_once 'includes/user_functions.php';
if (!isset($_SESSION['username'])){
	echo "<script type='text/javascript'> window.location.href = 'login'; </script>";
    exit();
} else { $usr = $_SESSION['username']; }

	$username = $user['username'];
	$user_id = $user['id'];
	$user_amount = $user['amount'];

	$trans = getusertrans();
	$profit = $trans['bonus'];
	$comm = $trans['commission'];

	$total_amt_avail = $comm+$profit+$user_amount;
	$avail_for_withd = $comm+$profit+$user_amount;

	$ref_bonus = 100; // Crediting Referral Bonus in dollars
	
	($user['photo']!='') ? $avatar_src = "uploads/".$user['photo'] : $avatar_src = "uploads/avatar2.png"; //Get User Photo

$page = isset($_GET['link']) ? $_GET['link'] : '';
if (strcasecmp($page, 'logout') === 0) {
    echo '<script type="text/javascript">window.location.href="includes/parse/logout.php";</script>';
    exit();
}
?>

<?php include_once('includes/header.php'); ?>
 
<section id="main" class="container-fluid">
	<div class="row">
	 
	<?php include_once('includes/sidemenu.php'); ?>
	
	<?php
		if (file_exists('includes/' .$page . '.php')) {
			include('includes/' .$page . '.php');
		} else {
			include('includes/dashboard.php');
		}
	?>
	 
	</div>
</section>
 
<p><br/></p>
<?php include_once('includes/footer.php'); ?>
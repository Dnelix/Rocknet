<?php
//db_connect
require_once '../constants.php';
require_once '../user_functions.php';

$activation_path = $c_web.'/account/templates/admin/includes/parse/activation.php';
$id = $user['id'];
$i = $user['password'];
$user = $user['username'];
echo '
<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Activate Email on '.$company.'</title></head><body style="margin:0px;font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px;background:#a00;font-size:24px;color:#fff;">Email Activation</div><div style="padding:24px; font-size:17px;">Please click on the link below to activate your account on '.$company.':<br/><b><a href="'.$activation_path.'?u='.$user.'&id='.$id.'&i='.$i.'">EMAIL ACTIVATION LINK</a></b><br/>If you have any issues regarding activation, please contact us.</div></body></html>';
?>
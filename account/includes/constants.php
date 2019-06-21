<?php
session_start();
define("DB_NAME", "bold");
define("DB_HOSTNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");

$company = 'Rocknet FX.';
define("COMPANY", $company);
$c_email = 'info@rocknetfx.com';
define("C_EMAIL", $c_email);
$c_phone = '(+1)2232032226';
define("C_PHONE", $c_phone);
//$c_web = 'http://localhost/_proj3';
$c_web = 'https://www.rocknetfx.com';
define("C_WEB", $c_web);
$private_mail = 'alexanderdoyle5@gmail.com';
define("P_EMAIL", $private_mail);

$link = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);

if (!$link) {
    die("could not connect to database: " . mysqli_error($link));
} else {
    $db_select = mysqli_select_db($link, DB_NAME);
    if (!$db_select) {
        die("could not connect to database: " . mysqli_error($link));
    }
}
?>
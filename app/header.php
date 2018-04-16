<?php
ob_start();
session_set_cookie_params(0,'/','localhost',NULL,TRUE); // lifetime, path, domain, secure, httpOnly
SESSION_START();

if(isset($_SESSION['last_ip']) === false){
	$_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
}

if(isset($_SESSION['last_ip']) != $_SERVER['REMOTE_ADDR']){
	unset($_SESSION['last_ip']);
	SESSION_UNSET();
	SESSION_DESTROY();
}

$URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (strpos($URL, 'localhost') !== false) {
    $_SESSION['environment'] = "localhost"; // change it on server so do not get error on live site
}
// file handling header functios
if($_SESSION['environment'] === "localhost"){
	error_reporting(E_ALL);
}else{
	error_reporting(0);
}
?>

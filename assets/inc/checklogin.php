<?php
function check_login()
{
if(strlen($_SESSION['pass_id'])==0)
	{
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="pass-login.php";
		$_SESSION["pass_id"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>

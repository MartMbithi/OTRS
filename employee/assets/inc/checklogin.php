<?php
function check_login()
{
if(strlen($_SESSION['emp_id'])==0)
	{
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="emp-login.php";
		$_SESSION["emp_id"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>

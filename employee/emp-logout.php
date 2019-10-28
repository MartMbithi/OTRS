<?php
    session_start();
    unset($_SESSION['emp_id']);
    session_destroy();

    header("Location: emp-login.php");
    exit;
?>

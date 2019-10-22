<?php
    session_start();
    unset($_SESSION['pass_id']);
    session_destroy();

    header("Location: pass-login.php");
    exit;
?>

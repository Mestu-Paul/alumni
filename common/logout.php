<?php
    if(session_status() !== PHP_SESSION_ACTIVE)
        session_start();
    unset($_SESSION['user_email']);
    unset($_SESSION['user_role']);
    header("Location: ../user/frontend/index.php");
?>
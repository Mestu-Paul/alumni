<?php

    if(session_status() !== PHP_SESSION_ACTIVE)
    session_start();
  if(!isset($_SESSION["user_email"]) || (isset($_SESSION["user_email"]) && $_SESSION["user_role"] !== "admin")){
    $_SESSION['message']="Not Permitted";
    header("Location: ../../user/frontend/index.php");
  }

?>
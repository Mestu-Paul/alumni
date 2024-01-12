<?php
  if(session_status() !== PHP_SESSION_ACTIVE)
    session_start();
  if(!isset($_SESSION["user_email"]) || (isset($_SESSION["user_email"]) && $_SESSION["user_role"] !== "admin")){
    $_SESSION['message']="Not Permitted";
    header("Location: ../../user/frontend/index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <?php include '../../common/headRef.php'; ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div class="container">
    <div class="headLine">
      <marquee>Welcome CCN Alumni Management System</marquee>
    </div>
    <div class="text-center my-2">
      <img src="../../imgs/ccn.jpg" width="100%" alt="ccn university">
    </div>
  </div>
  <?php include '../../common/footer.php'; ?>
</body>

</html>
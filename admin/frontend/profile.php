<?php
if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();
if (!isset($_SESSION["user_email"]) || (isset($_SESSION["user_email"]) && $_SESSION["user_role"] !== "admin")) {
  $_SESSION['message'] = "Not Permitted";
  header("Location: ../../user/frontend/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Profile</title>
  <?php include '../../common/headRef.php'; ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <?php include '../../common/getProfile.php'; ?>

  <div class="" style="min-height:100vh">
    <div class="card mx-auto mt-5 py-3 pb-5" style="width:30rem; box-shadow:0px 0px 10px 2px #919191;">
      <h5 class="card-title text-center headLine">Profile</h5>
      <form action="../backend/newAdmin.php" method="post" class="mx-auto" style="width: 70%;">
        <div class="mb-3 row d-flex">
          <?php
          echo '<input type="email" class="col form-control" placeholder="Email" name="email" id="email" aria-describedby="email"
          value="'.$profile["email"].'"  required>'; ?> 
        </div>
        <div class="mb-3 row d-flex">
          <input type="text" class="col form-control" placeholder="Contact No" name="contact" id="contact" aria-describedby="email" required>
        </div>
        <div class="mb-3 row d-flex">
          <input type="password" class="col form-control" placeholder="Password" name="password" id="password" aria-describedby="email" required>
        </div>
        <div class="mb-3 row d-flex">
          <input type="password" class="col form-control" placeholder="Confirm Password" name="confirmPassword" id="confirmPassword" required aria-describedby="email">
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-info">Add</button>
        </div>
      </form>
    </div>
  </div>
  <?php include '../../common/footer.php'; ?>
</body>

</html>
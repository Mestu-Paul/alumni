<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <?php include '../../common/headRef.php'; ?>
</head>

<body>
  <!-- <?php include '../navbar.php'; ?> -->
  <?php
  if (isset($_SESSION['user_email'])) {
    header("Location: index.php");
  }
  ?>
  <div class="headLine">
    <marquee>Welcome CCN Alumni Management System</marquee>
  </div>
  <div style="min-height:100vh">
    <div class="card mx-auto mt-5 py-3 pb-5" style="width:24rem; box-shadow:0px 0px 10px 2px #919191;">
      <h5 class="card-title text-center headLine">Admin Panel Login</h5>
      <form action="../backend/login.php" method="post" class="col-10 col-md-8 col-lg-5 mx-auto mt-4" style="width:18rem;">
          <div class="row mb-3">
            <input type="email" placeholder="Email address : " class="form-control" name="email" id="Email" aria-describedby="emailHelp">
          </div>
          <div class="row mb-3">
            <input type="password" placeholder="Password : " class="form-control" name="password" id="Password">
          </div>
          <div class="text-center mt-5 d-flex justify-content-between">
            <a type="button" class="btn btn-danger1 mx-3" href="../../user/frontend/index.php">Cancel</a>
            <button type="submit" class="btn btn-info1 mx-3">Login</button>
          </div>
        </form>
    </div>
  </div>
  <?php include '../../common/footer.php'; ?>
</body>

</html>
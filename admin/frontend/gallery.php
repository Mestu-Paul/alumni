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
  <title>Gallery Manage</title>
  <?php include '../../common/headRef.php'; ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div class="" style="min-height:100vh">
    <div class="py-2 pb-5">
      <div class="mx-auto" style="width: 70%;">
        <p class="text-center mt-5 headLine">Gallery Manage</p>
      </div>
      <form action="../backend/gallery.php" enctype="multipart/form-data" method="post" class="mx-auto" style="width: 70%;">
        <div class="mb-3 row d-flex">
          <label for="eventTitle" class="col-4 col-md-2 form-label fw-bold">Event Title :</label>
          <input type="text" class="col form-control" name="eventTitle" id="eventTitle" aria-describedby="eventTitle">
        </div>
        <div class="mb-3 row d-flex">
          <label for="eventPhoto" class="col-4 col-md-2 form-label fw-bold">Event Photo :</label>
          <input type="file" class="col form-control" name="eventPhoto" id="eventPhoto" aria-describedby="eventPhoto">
        </div>
        <div class="text-end">
          <button type="submit" class="btn btn-info">Add</button>
        </div>
      </form>
      <?php include("../../common/galleryBase.php"); ?>
    </div>
  </div>
  </div>
  <?php include '../../common/footer.php'; ?>
</body>

</html>
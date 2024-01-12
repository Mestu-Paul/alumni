<!DOCTYPE html>
<html lang="en">

<head>
  <title>Staff Registration</title>
  <?php include '../../common/headRef.php'; ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div class="container" style="min-height:100vh">
    <div class="py-2 pb-5">
      <div class="card mx-auto mt-5 py-3" style="width:35rem; box-shadow:0px 0px 10px 2px #919191;">
        <h5 class="card-title text-center  headLine">Staff Registration</h5>
      <form action="../backend/staffRegi.php"  enctype="multipart/form-data" method="post" class="mx-auto" style="width: 70%;" >
        <div class="mb-3">
          <label for="fullName" class="form-label">Full Name :</label>
          <input type="text" class="col form-control" name="fullName" id="fullName" aria-describedby="fullName">
        </div>
        <div class="mb-3">
          <label for="occupation" class="form-label">Occupation:</label>
          <input type="text" class="col form-control" name="occupation" id="occupation" aria-describedby="email">
        </div>
        <div class="mb-3">
            <label for="dateOfBirth" class="form-label">Date of Birth:</label>
            <input type="date" class="col form-control" name="dateOfBirth" id="dateOfBirth" aria-describedby="dateOfBirth">
        </div>
        <div class="mb-3">
            <label for="designation" class="form-label">Designation:</label>
            <input type="text" class="col form-control" name="designation" id="designation" aria-describedby="email">
        </div>
        <div class="mb-3">
            <label for="dateOfJoin" class="form-label">Date of Join:</label>
            <input type="date" class="col form-control" name="dateOfJoin" id="dateOfJoin" aria-describedby="dateOfJoin">
        </div>
        <div class="mb-3">
          <label for="photo" class="form-label">Photo:</label>
          <input type="file" class="col form-control" name="photo" id="photo" aria-describedby="photo">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="col form-control" name="email" id="email" aria-describedby="email">
        </div>
        <div class="mb-3">
          <label for="contact" class="form-label">Contact No:</label>
          <input type="text" class="col form-control" name="contact" id="contact" aria-describedby="email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="col form-control" name="password" id="password" aria-describedby="email">
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Confirm Password:</label>
          <input type="password" class="col form-control" name="confirmPassword" id="confirmPassword" aria-describedby="email">
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-info">Register</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <?php include '../../common/footer.php'; ?>
</body>

</html>
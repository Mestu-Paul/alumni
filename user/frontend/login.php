<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <?php include '../../common/headRef.php'; ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div id="forgotMessage" class="d-flex justify-content-center my-1 d-none">
    <p class="bg-danger px-2 py-1 text-light" style="border-radius:4px; width:fit-content;">
    Oops sorry, currently this feature freezed
      <span class="mx-2" onclick="closeMessage()" style="cursor:pointer;">&times;</span>
    </p>
  </div>
  <div class="container" style="min-height:100vh">
    <div class="py-2 pb-5">
      <div class="card mx-auto mt-5 py-3" style="width:30rem; box-shadow:0px 0px 10px 2px #919191;">
        <h5 class="card-title text-center" style="font-size: 30px; font-weight: bold; color: #fc825a">Login</h5>

        <form action="../backend/login.php" method="post" class="mx-auto" style="width: 70%;">
          <div class="mb-3">
            <!-- <label for="UserType" class="form-label">User Type</label> -->
            <select class="form-select" aria-label="Default select example">
              <option value="">User Type</option>
              <option value="alumni">Alumni</option>
              <option value="staff">Staff</option>
            </select>
          </div>
          <div class="mb-3">
            <!-- <label for="Email" class="form-label">Email address</label> -->
            <input type="email" placeholder="Email address " class="form-control" id="Email" name="email"
              aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <!-- <label for="Password" class="form-label">Password</label> -->
            <input type="password" placeholder="Password" class="form-control" name="password" id="Password">
          </div>
          <div class="mb-3 d-flex justify-content-between">
            <div>
              <a href="alumniRegi.php">New Alumni?</a> or
              <a href="staffRegi.php">New Staff?</a>
            </div>
            <a href="#" onclick="showMessage()">Forgot password?</a>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-info">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include '../../common/footer.php'; ?>
</body>
<script>
  function showMessage(){
    const forgotMessage = document.getElementById("forgotMessage");
    forgotMessage.classList.remove("d-none");
    setTimeout(() => {
        forgotMessage.classList.add("d-none");
    }, 4000);
  }
  function closeMessage(){
    document.getElementById("forgotMessage").classList.add("d-none");
  }
</script>
</html>
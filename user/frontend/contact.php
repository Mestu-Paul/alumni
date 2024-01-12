<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contacts</title>
  <?php include '../../common/headRef.php'; ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div class="container" style="min-height:100vh">
    <div class="row">
      <div class="col-12 col-md-8 py-2 pb-5 d-flex justify-content-between";>
        <div class="card mx-auto mt-5" style="width:24rem; box-shadow:0px 0px 10px 2px #919191;">
          <h5 class="card-title text-center  headLine">Contacts</h5>
          <form action="../backend/contact.php" method="post" class="mx-auto" style="width:22rem;">
            <div class="mb-3">
              <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Name">
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" name="email" id="email" aria-describedby="email"
                placeholder="Email">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="number" id="number" aria-describedby="number"
                placeholder="Contact number">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="subject" id="subject" aria-describedby="subject"
                placeholder="Subject">
            </div>
            <div class="mb-3">
              <textarea type="text" class="form-control" name="message" id="Message" aria-describedby="Message"
                placeholder="Message"></textarea>
            </div>
            <div class="mb-3">
              <button type="submit" class="form-control btn btn-danger">Send</button>
            </div>
          </form>
        </div>
        <div style="border-right:2px solid red; box-shadow: 0px 0px 10px 1px red"></div>
      </div>
      <div class="col">
        <p class="text-center mt-5 headLine">Address</p>
        <div>
          <div class="row mb-3">
            <i class="col-3 fas fa-mobile-alt"></i>
            <span class="col-9">00654616546516</span>
          </div>
          <div class="row mb-3">
            <i class="col-3 fas fa-map-marker"></i>
            <span class="col-9">CCN university, Kotbari</span>
          </div>
          <div class="row mb-3">
            <i class="col-3 fas fa-envelope"></i>
            <span class="col-9">exampleEmail@gmail.com</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include '../../common/footer.php'; ?>
</body>

</html>
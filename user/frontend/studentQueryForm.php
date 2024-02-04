<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <?php include '../../common/headRef.php'; ?>
  <style>
  </style>
</head>

<body>
  <?php include 'navbar.php'; 
  $titleList = ["Academic Report or Transcript Request",
  "Application for a Discontinuation Assessment ",
  "Application for a Special Assessment",
  "Application for Graduation confirmation or Syllabus Request",
  "Request for Certificate Reprint ",
  "Request for Uncollected Certificates"
 ];
  ?>
  <div>
  <div class="py-2 pb-5">
      <div class="card mx-auto mt-5 py-3" style="width:60%; box-shadow:0px 0px 10px 2px #919191;">
        <h5 class="card-title text-center  headLine">Add Your Query</h5>
        <form action="../backend/studentQuery.php" method="post" class="mx-auto"
          style="width: 90%;" id="storyFrom">
          
            <div class="text-center">
                <p class="text-danger">*After your request admin will contact with you, so please provide a valid phone number</p>
            </div>
          <div class="mb-3">

            <label for="" class="form-label">Query for:</label>
            <?php
            echo '<input disabled type="text" class="col form-control" value="'.$titleList[$_GET["id"]].'">';
            echo '<input type="hidden" class="col form-control" name="title" value="'.$titleList[$_GET["id"]].'">';
            ?>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Almni Name :</label>
            <input type="text" class="col form-control" name="name" required>
          </div>
          <div class="mb-3">
            <label for="department" class="form-label">Department :</label>
            <input type="text" class="col form-control" name="department" >
          </div>
          <div class="mb-3">
            <label for="session" class="form-label">Session :</label>
            <input type="text" class="col form-control" name="session">
          </div>
          <div class="mb-3">
            <label for="studentId" class="form-label">Student ID :</label>
            <input type="text" class="col form-control" name="studentId">
          </div>
          <div class="mb-3">
            <label for="conact" class="form-label">Phone :</label>
            <input type="text" class="col form-control" name="conact" required>
          </div>
          <div class="mb-3">
            <label for="reason" class="form-label">Reason :</label>
            <textarea type="text" class="col form-control" name="reason"> </textarea>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="text" class="col form-control" name="email">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-info">Request</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include '../../common/footer.php'; ?>
</body>
<script>
</script>

</html>


<?php include '../../common/userPermition.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Event Manage</title>
  <?php include '../../common/headRef.php'; ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <?php include '../../common/getJob.php'; ?>
  <div class="container-fluid" style="min-height:100vh">
    <div class="d-flex justify-content-end my-3">
      <button class="btn btn-info" id="addButton" onclick="showAddForm()">New Job</button>
    </div>
    <div id="addEvent" class="card mx-auto my-5 py-3 pb-5 d-none"
      style="width:30rem; box-shadow:0px 0px 10px 2px #919191;">
      <h5 class="card-title text-center headLine">Add New Job Scope</h5>
      <form action="../backend/job.php" method="post" class="mx-auto" style="width: 70%;">
        <div class="mb-3">
          <label for="title" class="form-label fw-bold">Title :</label>
          <input type="text" class="col form-control" name="title" id="title">
          </div>
          <div class="mb-3">
            <label for="date" class="form-label fw-bold">Expired Date :</label>
            <input type="date" class="col form-control" name="date" id="date">
          </div>
          <div class="mb-3">
            <label for="source" class="form-label fw-bold">Source :</label>
            <input type="text" class="col form-control" placeholder="Source URL" name="source" id="source">
          </div>
          <div class="text-center mt-3">
            <button type="submit" class="btn btn-info">Add</button>
          </div>
        </form>
      </div>
      <div>
        <h5 class="card-title text-center headLine">Job List</h5>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Reference</th>
              <th scope="col">Job Title</th>
              <th scope="col">Source</th>
              <th scope="col">Expire Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 1;
              foreach ($jobs as $job) {
                echo '<tr>
              <td>' . $i++ . '</td>
              <td>' . $job['name'] . '</td>
              <td>' . $job['title'] . '</td>
              <td><a href="' . $job['source'] . '" target="_blank">Apply here</a></td>
              <td>' . $job['date'] . '</td>
              ';
              }
            ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php include '../../common/footer.php'; ?>
</body>

<script>
  function showAddForm() {
    console.log("clicked");
    var addEventDiv = document.getElementById('addEvent');
    addEventDiv.classList.toggle('d-none');
  }
</script>

</html>
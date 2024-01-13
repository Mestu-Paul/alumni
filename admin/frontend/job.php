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
    <h5 class="card-title text-center headLine">Job List</h5>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Reference</th>
          <th scope="col">Job Title</th>
          <th scope="col">Source</th>
          <th scope="col">Expire Date</th>
          <th scope="col">Action</th>
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
                <td><a class="btn btn-danger" href="../backend/job.php?id='.$job['id'].'">Delete</a></td>
                ';
          }
        ?>
      </tbody>
    </table>
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
<?php include '../../common/userPermition.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Event Manage</title>
  <?php include '../../common/headRef.php'; ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <?php include '../../common/getFund.php'; ?>
  <div class="container-fluid" style="min-height:100vh">
    <div class="d-flex justify-content-between my-3">
      <div class="d-inline">
        <span class="me-5 fw-bold">Total fund rise: <?php echo $total_fund['total']; ?> </span> |
        <span class="mx-5 fw-bold">Total fund invest: <?php echo $total_fund['invest']; ?> </span> |
        <span class="mx-5 fw-bold">Current fund: <?php echo $total_fund['total']-$total_fund['invest']; ?> </span> 
      </div>
      <button class="btn btn-info" id="addButton" onclick="showAddForm()">Fund rise</button>
    </div>
    <div id="addEvent" class="card mx-auto my-5 py-3 pb-5 d-none"
      style="width:30rem; box-shadow:0px 0px 10px 2px #919191;">
      <h5 class="card-title text-center headLine">Add Amount</h5>
      <form action="../backend/fund.php" method="post" class="mx-auto" style="width: 70%;">
        <div class="mb-3">
          <label for="amount" class="form-label fw-bold">Amount :</label>
          <input type="number" class="col form-control" name="amount" id="amount">
          </div>
          <div class="mb-3">
            <label for="date" class="form-label fw-bold">Date :</label>
            <input type="date" class="col form-control" name="date" id="date">
          </div>
          <div class="mb-3">
            <label for="bank" class="form-label fw-bold">Bank :</label>
            <input type="text" class="col form-control" name="bank" id="bank">
          </div>
          <div class="mb-3">
            <label for="type" class="form-label fw-bold">Type :</label>
            <select type="text" class="col form-control" name="type" id="type">
              <option value="Credit">Credit</option>
              <option value="Debit">Debit</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="remarks" class="form-label fw-bold">Remarks :</label>
            <input type="text" class="col form-control" name="remarks" id="remarks" aria-describedby="eventTime">
          </div>
          <div class="text-center mt-3">
            <button type="submit" class="btn btn-info">Add</button>
          </div>
        </form>
      </div>
      <div>
        <h5 class="card-title text-center headLine">View Funds</h5>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Alumni Name</th>
              <th scope="col">Payment date</th>
              <th scope="col">Type</th>
              <th scope="col">Bank</th>
              <th scope="col">Remarks</th>
              <th scope="col">Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 1;
              foreach ($funds as $fund) {
                echo '<tr>
              <td>' . $i++ . '</td>
              <td>' . $fund['name'] . '</td>
              <td>' . $fund['payment_date'] . '</td>
              <td>' . $fund['type'] . '</td>
              <td>' . $fund['bank'] . '</td>
              <td>' . $fund['remarks'] . '</td>
              <td>' . $fund['amount'] . '</td>
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
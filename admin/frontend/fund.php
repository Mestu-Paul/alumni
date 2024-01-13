<?php include '../../common/adminPermition.php' ?>

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
      <div class="row">
        <span class="col-12 fw-bold">Total fund rise: <?php echo $total_fund['total']; ?> </span>
        <span class="col-12 fw-bold">Total fund invest: <?php echo $total_fund['invest']; ?> </span>
        <span class="col-12 fw-bold">Current fund: <?php echo $total_fund['total']-$total_fund['invest']; ?> </span> 
      </div>
      <div>
        <button class="col-12 my-1 btn btn-info" id="addButton" onclick="showAddForm()">Invest</button>
        <button class="col-12 my-1 d-none btn btn-info" id="viewFundButton" onclick="Toggle()">Fund details</button>
        <button class="col-12 my-1 btn btn-info" id="viewInvestButton" onclick="Toggle()">Invest details</button>

      </div>
    </div>
    <div id="addEvent" class="card mx-auto my-5 py-3 pb-5 d-none"
      style="width:30rem; box-shadow:0px 0px 10px 2px #919191;">
      <h5 class="card-title text-center headLine">Invest Fund</h5>
      <form action="../backend/fund.php" method="post" class="mx-auto" style="width: 70%;">
        <div class="mb-3">
          <label for="eventTitle" class="form-label fw-bold">Utilized amount :</label>
          <input type="number" class="col form-control" name="amount" id="amount" aria-describedby="eventTitle">
          </div>
          <div class="mb-3">
            <label for="Location" class="form-label fw-bold">Utilized for :</label>
            <input type="text" class="col form-control" name="reason" id="reason" aria-describedby="Location">
          </div>
          <div class="mb-3">
            <label for="note" class="form-label fw-bold">Note :</label>
            <textarea class="col form-control" name="note" id="note"></textarea>
          </div>
          <div class="mb-3">
            <label for="date" class="form-label fw-bold">Date :</label>
            <input type="date" class="col form-control" name="date" id="date">
          </div>
          <div class="text-center mt-3">
            <button type="submit" class="btn btn-info">Invest</button>  
          </div>
        </form>
      </div>
      <div id="fundDetails">
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
              <th scope="col">Action</th>
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
              <td>' . $fund['amount'] . '</td>';
              if($fund['valid'])
                echo '<td><a class="btn btn-info" href="../backend/fundUpdate.php?type=0&id='.$fund["id"].'">Revert</a></td>';
              else{
                echo '<td><a class="btn btn-info me-2" href="../backend/fundUpdate.php?type=1&id='.$fund["id"].'">Valid</a>';
                echo '<a class="btn btn-danger" href="../backend/fundUpdate.php?type=2&id='.$fund["id"].'">Delete</a></td>';
              }
            }
            ?>
        </tbody>
      </table>
    </div>
      <div  id="investDetails" class="d-none">
        <h5 class="card-title text-center headLine">Invest Funds</h5>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Responsibility</th>
              <th scope="col">Reason</th>
              <th scope="col">Date</th>
              <th scope="col">Note</th>
              <th scope="col">Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 1;
              foreach ($invest as $inv) {
                echo '<tr>
              <td>' . $i++ . '</td>
              <td>' . $inv['email'] . '</td>
              <td>' . $inv['reason'] . '</td>
              <td>' . $inv['date'] . '</td>
              <td>' . $inv['note'] . '</td>
              <td>' . $inv['amount'] . '</td>
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
    var addEventDiv = document.getElementById('addEvent');
    addEventDiv.classList.toggle('d-none');
  }
  function Toggle(){
    var viewFundButton = document.getElementById('viewFundButton');
    viewFundButton.classList.toggle('d-none');
    var viewInvestButton = document.getElementById('viewInvestButton');
    viewInvestButton.classList.toggle('d-none');
    var fundDetails = document.getElementById('fundDetails');
    fundDetails.classList.toggle('d-none');
    var investDetails = document.getElementById('investDetails');
    investDetails.classList.toggle('d-none');
  }
</script>

</html>
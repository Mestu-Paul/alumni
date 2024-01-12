<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <?php include '../../common/headRef.php'; ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div class="container-fluid">
    <div class="headLine">
      <marquee>Welcome CCN Alumni Management System</marquee>
    </div>
    <div class="text-center my-2" style="background-color:#f1f1f1">
      <img src="../../imgs/ccn.jpg" width="80%" style="margin:auto; padding:20px" alt="ccn university">
    </div>

    <div class="my-5 mx-auto" style="width:90%;">
      <?php include "aboutBase.php"; ?>
    </div>
    <div class="bg-light mx-auto" style="width:90%;">
      <div class="container bg-light" style="min-height:100vh">
        <div class="mx-auto " style="width: 70%;">
          <p class="text-center mt-5" style="font-size: 30px; font-weight: bold; color: #fc825a">Events</p>
          <p class="text-center">
            It is important to carry out a good follow-up marketing of alumni events.
            With over 100 worldwide events in a year, you have a wealth of alumni networking opportunities.
          </p>
        </div>
        <?php
        include '../../common/getEvents.php';
        if (isset($_SESSION["events"])) {
          foreach ($_SESSION["events"] as $ev) {
            $day = date('d', strtotime($ev['date']));
            $month = strtoupper(date('F', strtotime($ev['date'])));
            echo '
              <div class="row justify-content-between py-3 mt-5" style="background-color: white;">
                <div class="col my-auto text-center">
                  <span style="font-size: 30px; font-weight: bold; color: #c55e76;">' . $day . '</span> <br>
                  <span style="font-size: 20px; font-weight: bold; color: #fc825a;">' . $month . '</span>
                </div>
                <div class="col my-auto text-start">
                  <span style="font-size: 20px; font-weight: bold;">' . $ev['title'] . '</span> <br>
                  <span style="color: gray;">' . $ev['description'] . '</span>
                </div>
                <div class="col m-auto">
                  <a class="btn bg-danger text-light" href="events.php">More Events</a>
                </div>
                
              </div>';
            break;
          }
        }
        ?>
      </div>
    </div>
  </div>
  <?php include '../../common/footer.php'; ?>
</body>

</html>
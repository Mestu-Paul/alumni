<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <style>
    .intro {
      width: 100%;
      background-image: url("../../imgs/ccn.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      height: 100vh;
      position: relative;
    }

    .quoted {
      font-size: 20px;
      font-weight: bold;
      background-color: #42d6f096;
      text-align: center;
      width: 100%;
      color: black;
      position: absolute;
      bottom: 0px; 
      left: 50%;
      transform: translateX(-50%);
      padding: 10px; 
    }

    .welcome{
      background-color: #00000060;
      color:white;
      margin: auto;
      padding: 0 20px;
      box-shadow: 0px 10px 20px 12px #00000060;
    }

  </style>
</head>

<body>
  <div>
    <div class="text-center my-2 intro" >
      <div class="headLine welcome">
        <marquee>Welcome CCN Alumni Management System</marquee>
      </div>
      <div class="quoted">
        <ul style="list-style-type: none;" >
          <li>Connecting Graduates, Building Memories</li>
          <li>Explore, Reconnect, and Thrive with our Alumni Management Platform.</li>
          <li>Join our vibrant community, stay updated, connect with old friends, and discover exciting opportunities.</li>
        </ul>
      </div>
    </div>

    <div class="bg-light mx-auto" style="width:90%;">
      <div class="container bg-light">
        <div class="mx-auto " style="width: 70%;">
          <p class="text-center mt-5" style="font-size: 30px; font-weight: bold;">Events</p>
          <p class="text-center">
            It is important to carry out a good follow-up marketing of alumni events.
            With over 100 worldwide events in a year, you have a wealth of alumni networking opportunities.
          </p>
        </div>
        <?php
        include 'getEvents.php';
        if (isset($_SESSION["events"])) {
          foreach ($_SESSION["events"] as $ev) {
            $day = date('d', strtotime($ev['date']));
            $month = strtoupper(date('F', strtotime($ev['date'])));
            echo '
              <div class="row justify-content-between py-3 mt-5" style="background-color: white;">
                <div class="col my-auto text-center">
                  <span style="font-size: 30px; font-weight: bold; color: #c55e76;">' . $day . '</span> <br>
                  <span style="font-size: 20px; font-weight: bold; color: black;">' . $month . '</span>
                </div>
                <div class="col my-auto text-start">
                  <span style="font-size: 20px; font-weight: bold;">' . $ev['title'] . '</span> <br>
                  <span style="color: gray;">' . $ev['description'] . '</span>
                </div>
                <div class="col m-auto">
                  <a class="btn bg-info text-light" href="events.php">More Events</a>
                </div>
                
              </div>';
            break;
          }
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>
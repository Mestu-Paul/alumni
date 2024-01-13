<?php
  if(session_status() !== PHP_SESSION_ACTIVE)
    session_start();
  if(!isset($_SESSION["user_email"]) || (isset($_SESSION["user_email"]) && $_SESSION["user_role"] !== "admin")){
    $_SESSION['message']="Not Permitted";
    header("Location: ../../user/frontend/index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Event Manage</title>
  <?php include '../../common/headRef.php'; ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div class="container-fluid" style="min-height:100vh">
  <div class="text-end my-3">
    <button class="btn btn-info" id="addButton" onclick="showAddForm()">Add new</button>
  </div>
    <div id="addEvent" class="card mx-auto my-5 py-3 pb-5 d-none" style="width:30rem; box-shadow:0px 0px 10px 2px #919191;">
      <h5 class="card-title text-center headLine">Add New Event</h5>
      <form action="../backend/events.php" method="post" class="mx-auto" style="width: 70%;">
        <div class="mb-3">
          <label for="eventTitle" class="form-label fw-bold">Event Title :</label>
          <input type="text" class="col form-control" name="eventTitle" id="eventTitle"
          aria-describedby="eventTitle" value=<?php if(isset($_SESSION['event']))$_SESSION['event']['title'] ?> >
        </div>
        <div class="mb-3">
          <label for="Location" class="form-label fw-bold">Location :</label>
          <input type="text" class="col form-control" name="location" id="Location"
          aria-describedby="Location" value=<?php if(isset($_SESSION['event']))$_SESSION['event']['location'] ?>>
        </div>
        <div class="mb-3">
          <label for="eventDate" class="form-label fw-bold">Event Date :</label>
          <input type="date" class="col form-control" name="eventDate" id="eventDate"
          aria-describedby="eventDate" value=<?php if(isset($_SESSION['event']))$_SESSION['event']['date'] ?>>
        </div>
        <div class="mb-3">
          <label for="eventTime" class="form-label fw-bold">Event Time :</label>
          <input type="time" class="col form-control" name="eventTime" id="eventTime"
          aria-describedby="eventTime" value=<?php if(isset($_SESSION['event']))$_SESSION['event']['time'] ?>>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label fw-bold">Description :</label>
          <textarea type="time" class="col form-control" name="description" id="description" aria-describedby="description"
          ><?php if(isset($_SESSION['event']))$_SESSION['event']['description'] 
          ?></textarea>
        </div>
        <div class="text-center mt-3">
          <button type="submit" class="btn btn-info">Add</button>
        </div>
      </form>
    </div>
    <div>
    <h5 class="card-title text-center headLine">Events List</h5>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Event Title</th>
            <th scope="col">Location</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if(isset($_SESSION['events'])){
            $i=1;
            foreach($_SESSION['events'] as $ev){
              echo '<tr>
              <td>'.$i++.'</td>
              <td>'.$ev['title'].'</td>
              <td>'.$ev['location'].'</td>
              <td>'.$ev['date'].'</td>
              <td>'.$ev['time'].'</td>
              <td>'.$ev['description'].'</td>
              <td><a href="../backend/events.php?a=2&id='.$ev['id'].'">delete</a></td>
              ';
            }
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
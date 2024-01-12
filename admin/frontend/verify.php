<?php
  
  if(session_status() !== PHP_SESSION_ACTIVE)
    session_start();

  if(!isset($_SESSION["user_email"]) || (isset($_SESSION["user_email"]) && $_SESSION["user_role"] !== "admin")){
    $_SESSION['message']="Not Permitted";
    header("Location: ../index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Verify</title>
  <?php include '../../common/headRef.php'; ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div class="container bg-light" style="min-height:100vh">
    <div class="py-2 pb-5">
      <div class="mx-auto" style="width: 70%;">
        <p class="text-center mt-5 headLine">Alumni Verify</p>
      </div>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">DoB</th>
            <th scope="col">Phone</th>
            <th scope="col">Session</th>
            <th scope="col">Department</th>
            <th scope="col">Occupation</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          if(isset($_SESSION['alumni'] )){
            $i = 1;
            foreach($_SESSION['alumni'] as $a){
              echo '<tr>
                <th scope="row">'.$i++.'</th>
                <td><img width="50" height="50" src="../../media/'.$a['Profile_Picture'].'" alt="profile picture"></td>
                <td>'.$a['Full_Name'].'</td>
                <td>'.$a['Date_of_Birth'].'</td>
                <td>'.$a['Contact_No'].'</td>
                <td>'.$a['Session'].'</td>
                <td>'.$a['Department'].'</td>
                <td>'.$a['Occupation'].'</td>
                <td><a href="../backend/verify.php?t=1&a=1&id='.$a['Id'].'">Approve</a> or 
                <a href="../backend/verify.php?t=1&a=2&id='.$a['Id'].'">Reject</a></td>
              </tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </div>


    <div class="py-2 pb-5">
      <div class="mx-auto" style="width: 70%;">
        <p class="text-center mt-5 headLine">Staff Verify</p>
      </div>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
          <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">DoB</th>
            <th scope="col">Phone</th>
            <th scope="col">Designation</th>
            <th scope="col">Occupation</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          if(isset($_SESSION['staff'] )){
            $i = 1;
            foreach($_SESSION['staff'] as $st){
              echo '<tr>
                <th scope="row">'.$i++.'</th>
                <td><img width="50" height="50" src="../../media/'.$st['photo'].'" alt="profile picture"></td>
                <td>'.$st['Full_Name'].'</td>
                <td>'.$st['Date_of_Birth'].'</td>
                <td>'.$st['Contact_No'].'</td>
                <td>'.$st['Designation'].'</td>
                <td>'.$st['Occupation'].'</td>
                <td><a href="../backend/verify.php?t=2&a=1&id='.$st['id'].'">Approve</a> or 
                <a href="../backend/verify.php?t=2&a=2&id='.$st['id'].'">Reject</a></td>
              </tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </div>


  </div>
  <?php include '../../common/footer.php'; ?>
</body>

</html>
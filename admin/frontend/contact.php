<?php include '../../common/adminPermition.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contacts</title>
  <?php include '../../common/headRef.php'; ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div class="container-fluid" style="min-height:100vh">
    <div class="py-2 pb-5">
      <div class="mx-auto" style="width: 70%;">
        <p class="text-center mt-5 headLine">Contacts</p>
      </div>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // include("backend/contact.php");
          if(isset($_SESSION['contacts'])){
            $i=1;
            foreach($_SESSION['contacts'] as $ct){
              echo '<tr>
              <td>'.$i++.'</td>
              <td>'.$ct['name'].'</td>
              <td>'.$ct['email'].'</td>
              <td>'.$ct['contact'].'</td>
              <td>'.$ct['subject'].'</td>
              <td>'.$ct['message'].'</td>
              <td><a href="../backend/contact.php?a=2&id='.$ct['id'].'">delete</a></td>
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

</html>
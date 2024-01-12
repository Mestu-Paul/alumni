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
  <title>Manage Courses</title>
  <?php include '../../common/headRef.php'; ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div class="container-fluid" style="min-height:100vh">
    <div class="mx-auto py-2 pb-5" style="width:500px;">
      <div class="mx-auto" style="width: 70%;">
        <p class="text-center mt-5 headLine">Manage Course</p>
      </div>
      <form action="../backend/course.php" method="post" class="mx-auto" style="width: 70%;">
        <div class="mb-3 row d-flex">
          <input type="text" class="col-12 form-control" placeholder="Course name" name="courseName" id="courseName" aria-describedby="courseName">
        </div>
        <div class="text-end">
          <button type="submit" class="btn btn-info">Add New</button>
        </div>
      </form>
      <div class="d-flex justify-content-center">

        <table class="table table-striped table-hover text-center" >
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Course Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i=1;
              foreach($_SESSION['courses'] as $course) {
                echo  '<tr>
                  <th scope="row">'.$i.'</th>
                  <td>'.$course['course_name'].'</td>
                  <td><a href="../backend/course.php?id=' . $course['id'] . '">Delete</a></td>
                  </tr>';
                $i++;
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php include '../../common/footer.php'; ?>
</body>

</html>
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
  <div class="container-fluid" style="min-height:100vh">
    <div class="py-2 pb-5">
      <div class="mx-auto" style="width: 70%;">
        <p class="text-center mt-5 headLine">ALUMNI/ FORMER STUDENT QUERIES</p>
      </div>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Query For</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Session</th>
            <th scope="col">Department</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            include_once '../../conn.php';
            $db = connect();
            $sql = 'SELECT * FROM student_queries ORDER BY query_date AND status;';
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $queries = $stmt->fetchAll();
            $i = 1;
            foreach($queries as $query){
              echo '<tr>
                <th scope="row">'.$i++.'</th>
                <td>'.$query['name'].'</td>
                <td>'.$query['title'].'</td>
                <td>'.$query['email'].'</td>
                <td>'.$query['contact'].'</td>
                <td>'.$query['session'].'</td>
                <td>'.$query['department'].'</td>
                <td> <a href="../backend/studentQuery.php?t=delete&id='.$query['id'].'" class="btn btn-danger me-2">Delete</a>';
                if($query['status']==0)
                    echo '<a href="../backend/studentQuery.php?t=status&id='.$query['id'].'" class="btn btn-warning">Pending</a>';
                else 
                    echo '<a href="../backend/studentQuery.php?t=status&id='.$query['id'].'" class="btn btn-success">Completed</a>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php include '../../common/footer.php'; ?>
</body>

</html>
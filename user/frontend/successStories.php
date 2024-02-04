<!DOCTYPE html>
<html lang="en">

<head>
  <title>Success Story</title>
  <?php include '../../common/headRef.php'; ?>
  <style>
    .card-img{
      width:250px;
      margin: auto;
      aspect-ratio: 1;
    }
  </style>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div>
    <div class="text-end me-2 mt-2">
      <a href="alumniStudentHub.php" class="btn btn-primary">Alumni Student Hub</a> 
        <a href="addStory.php" class="btn btn-info">Your Story</a> 
    </div>
    <div class="row">
    <?php 
      include_once '../backend/successStory.php';
        foreach($result as $row){
            echo '
            <div class="card col-3 mx-auto my-2" style="width: 18rem;">
              <img class="card-img" src="'.$row['photo'].'" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">'.$row['name'].'</h5>
                <p class="card-text">'.$row['name'].'</p>
                <div class="d-flex justify-content-between">
                <a href="successStoryDetails.php?id='.$row["id"].'" class="btn btn-primary">Details</a>';
                if(isset($_SESSION["user_email"]) && isset($_SESSION["user_role"])=='admin'){
                  echo '
                    <a href="../backend/successStoryDelete.php?id='.$row["id"].'" class="btn btn-danger">Delete</a>
                    ';
                  }
                  echo '
                  </div>
              </div>
            </div>';
        }
    ?>
    </div>
    
  </div>
  <?php include '../../common/footer.php'; ?>
</body>

</html>
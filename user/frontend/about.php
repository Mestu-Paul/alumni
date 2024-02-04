<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <?php include '../../common/headRef.php';?>
    <style>
      .about{
        background-image: url("../../imgs/back3.jpg");
        background-size: cover; 
        background-repeat: no-repeat;
      }
    </style>
  </head>
  <body>
  <?php include 'navbar.php';?>
  <div class="about" style="min-height:100vh">
    <?php include 'aboutBase.php';?>
  </div>
    <?php include '../../common/footer.php';?>
  </body>
</html>
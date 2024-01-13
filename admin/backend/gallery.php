<?php

include_once '../../conn.php';

$db = connect();

if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();
// Connect to the database.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "../../media/";
    $target_file = $target_dir . basename($_FILES["eventPhoto"]["name"]);
    
    // Check if the file is a valid image.
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION['message'] = "Only JPG, PNG, and JPEG files are allowed.";
    header("Location: ../frontend/galleryManage.php");
    exit();
  }
  $eventPhoto = count( glob("../../media/*")).'.'.$imageFileType;
  
  $eventTitle = $_POST['eventTitle']; // text 
  
  if (empty($eventTitle)) {
      $_SESSION['message'] = 'Please fill up carefully';
      header("Location: ../frontend/galleryManage.php");
    exit();
  }
  
  // Move the file to the media folder.
  if (move_uploaded_file($_FILES["eventPhoto"]["tmp_name"], '../../media/'.$eventPhoto)) {
      $_SESSION['message'] = "The file has been uploaded successfully.";
    } else {
        $_SESSION['message'] = "There was an error uploading the file.";
        header("Location: ../frontend/galleryManage.php");
        exit();
    }
    
    // create user details 
  $sql = 'INSERT INTO gallery (title, photo) VALUES (:title, :photo)';
  $stmt = $db->prepare($sql);

  // Bind parameters with the data
  $stmt->bindParam(':title', $eventTitle);
  $stmt->bindParam(':photo', $eventPhoto);

  // Execute the query to insert alumni data.
  $stmt->execute();
}
else{
  $img_id = $_GET['id'];
  $sql = 'SELECT photo FROM gallery WHERE id=:id';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $img_id);
  $stmt->execute();
  $name = $stmt->fetchColumn();
  $file_path = "../../media/".$name;
  if (file_exists($file_path) && is_file($file_path)) {
      unlink($file_path);
  }

  $sql = 'DELETE FROM gallery WHERE id=:id';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $img_id);
  $stmt->execute();
}
$db = null;
header("Location: ../frontend/gallery.php");
?>
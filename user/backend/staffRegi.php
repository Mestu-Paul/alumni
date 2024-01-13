<?php
include_once '../../conn.php';
if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $target_dir = "../../media/";
  $target_file = $target_dir . basename($_FILES["photo"]["name"]);
  
  // Check if the file is a valid image.
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Only JPG, PNG, and JPEG files are allowed.";
    exit();
  }
  $photo = count( glob("../../media/*")).'.'.$imageFileType;
  $fullName = $_POST['fullName']; // text 
  $occupation = $_POST['occupation']; // text
  $dateOfBirth = $_POST['dateOfBirth']; // date
  $designation = $_POST['designation']; // text
  $contact = $_POST['contact']; // text
  $email = $_POST['email']; // text
  $password = $_POST['password']; // text
  $confirmPassword = $_POST['confirmPassword']; // text

  if (
    empty($fullName) || empty($dateOfBirth) ||
    empty($contact) ||empty($designation) || empty($occupation) ||
    empty($email) || empty($password) || empty($confirmPassword)
  ) {
    $_SESSION['message'] = 'Please fill up carefully';
    header("Location: ../frontend/staffRegi.php");
    exit();
  }
  else if ($password !== $confirmPassword) {
    $message = 'Password and Confirm password not matched';
    $_SESSION['message'] = $message;
    header("Location: ../frontend/staffRegi.php");
    exit();
  }
  include_once '../../conn.php';
// Connect to the database.
$db = connect();

  // Move the file to the media folder.
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], '../../media/'.$photo)) {
    echo "The file has been uploaded successfully.";
  } else {
    echo "There was an error uploading the file.";
  }
  
  // create user account
  // Prepare the SQL query to insert into the User table.
  $sql = 'INSERT INTO User (email, password) VALUES (:email, :password)';
  $stmt = $db->prepare($sql);

  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);

  // Execute the query to insert user data.
  $stmt->execute();

  // Get the last inserted user ID
  $userId = $db->lastInsertId();
  

  // create user details 
  
  $sql = 'INSERT INTO staff (UserId, Full_Name, photo, Date_of_Birth, Contact_No, Designation, Occupation) 
      VALUES (:UserId, :Full_Name, :photo, :Date_of_Birth, :Contact_No, :Designation, :Occupation)';
  $stmt = $db->prepare($sql);

  // Bind parameters with the data
  $stmt->bindParam(':UserId', $userId);
  $stmt->bindParam(':Full_Name', $fullName);
  $stmt->bindParam(':photo', $photo);
  $stmt->bindParam(':Date_of_Birth', $dateOfBirth);
  $stmt->bindParam(':Contact_No', $contact);
  $stmt->bindParam(':Designation', $designation);
  $stmt->bindParam(':Occupation', $occupation);

  // Execute the query to insert alumni data.
  $stmt->execute();

  
  // Close the database connection.
  $db = null;

  $_SESSION['message'] = 'Please wait for approval';
  header("Location: ../frontend/index.php");

}
?>
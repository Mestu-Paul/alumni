<?php
if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $target_dir = "../media/";
  $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);

  // Check if the file is a valid image.
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Only JPG, PNG, and JPEG files are allowed.";
    exit();
  }
  $profilePicture = count(glob("../media/*")) . '.' . $imageFileType;

  $fullName = $_POST['fullName']; // text 
  $dateOfBirth = $_POST['dateOfBirth']; // date
  $contact = $_POST['contact']; // text
  $sessionYear = $_POST['sessionYear']; // text
  $department = $_POST['department']; // text
  $occupation = $_POST['occupation']; // text
  $email = $_POST['email']; // text
  $password = $_POST['password']; // text
  $confirmPassword = $_POST['confirmPassword']; // text
  $role = "alumni";

  if (
    empty($fullName) || empty($dateOfBirth) ||
    empty($contact) || empty($sessionYear) || empty($department) || empty($occupation) ||
    empty($email) || empty($password) || empty($confirmPassword)
  ) {
    $_SESSION['message'] = 'Please fill up carefully';
    header("Location: ../frontend/alumniRegi.php");
  } else if ($password !== $confirmPassword) {
    $message = 'Password and Confirm password not matched';
    $_SESSION['message'] = $message;
    header("Location: ../frontend/alumniRegi.php");
  }

  include_once '../../conn.php';
  // Connect to the database.
  $db = connect();

  // Move the file to the media folder.
  if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], '../media/' . $profilePicture)) {
    echo "The file has been uploaded successfully.";
  } else {
    echo "There was an error uploading the file.";
  }

  // create user account
  // Prepare the SQL query to insert into the User table.
  $sql = 'INSERT INTO User (email, password, role, name) VALUES (:email1, :password1, :role1, :name1);
          INSERT INTO alumni (Full_Name, Profile_Picture, Date_of_Birth, Contact_No, Session, Department, Occupation, email) 
          VALUES (:Full_Name, :Profile_Picture, :Date_of_Birth, :Contact_No, :Session, :Department, :Occupation, :email)';
  $stmt = $db->prepare($sql);

  $stmt->bindParam(':email1', $email);
  $stmt->bindParam(':password1', $password);
  $stmt->bindParam(':name1', $fullName);
  $stmt->bindParam(':role1',$role);

  $stmt->bindParam(':Full_Name', $fullName);
  $stmt->bindParam(':Profile_Picture', $profilePicture);
  $stmt->bindParam(':Date_of_Birth', $dateOfBirth);
  $stmt->bindParam(':Contact_No', $contact);
  $stmt->bindParam(':Session', $sessionYear);
  $stmt->bindParam(':Department', $department);
  $stmt->bindParam(':Occupation', $occupation);
  $stmt->bindParam(':email', $email);

  // Execute the query to insert alumni data.
  $stmt->execute();


  // Close the database connection.
  $db = null;

  $_SESSION['message'] = 'Please wait for approval';
  header("Location: ../frontend/index.php");

}
?>
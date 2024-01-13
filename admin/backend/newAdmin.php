<?php
include_once '../../conn.php';
  // Connect to the database.
  $db = connect();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if(session_status() !== PHP_SESSION_ACTIVE)
    session_start();
    if(empty($fullName) || empty($email) || empty($contact) || empty($password) || empty($confirmPassword)) {
        $message = 'Please fill the form carefully';
        $_SESSION['message'] = $message;
        header("Location: ../frontend/newAdmin.php");
    }
    else if($password!==$confirmPassword){
        $message = 'Password and Confirm password not matched';
        $_SESSION['message'] = $message;
        header("Location: ../frontend/newAdmin.php");
    }

    // Prepare the SQL query.
    $sql = "INSERT INTO user (email, password, role) VALUES (:email, :password,'admin')";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    $stmt->execute();
    // Close the database connection.
    $message = 'Successfully added a new admin';
    $_SESSION['message'] = $message;
  }
  else{
    if($_GET['id']){
      $sql = "DELETE FROM user WHERE id=:id";
      $stmt = $db->prepare($sql);
      $stmt->bindParam(":id",$_GET["id"]);
      $stmt->execute();
    }
  }
  header("Location: ../frontend/newAdmin.php");
  $db = null;
?>
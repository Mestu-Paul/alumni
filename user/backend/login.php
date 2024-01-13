<?php
include_once '../../conn.php';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database.
    $db = connect();

    // Prepare the SQL query.
    $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Close the database connection.
    $db = null;
    if(session_status() !== PHP_SESSION_ACTIVE)
    session_start();
    if(count($users) === 0) {
        $message = 'Invalid Email or password';
        $_SESSION['message'] = $message;
        header("Location: ../frontend/login.php");
    }
    else{
      $_SESSION["message"] = $users[0]['logged in'];
      $_SESSION["user_role"] = $users[0]['role'];
      $_SESSION["user_email"] = $users[0]['email'];
      header("Location: ../frontend/index.php");
    }
  }
?>
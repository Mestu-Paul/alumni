<?php
  include_once '../../conn.php';
  // Connect to the database.
  $db = connect();
  if(session_status() !== PHP_SESSION_ACTIVE)
    session_start();

  // Prepare the SQL query.
  $sql = 'SELECT * FROM user WHERE email=:email';
  $stmt = $db->prepare($sql);

  $stmt->bindParam(":email",$_SESSION['user_email']);
  $stmt->execute();
  $profile = $stmt->fetch(PDO::FETCH_ASSOC);
  $db = null;
?>
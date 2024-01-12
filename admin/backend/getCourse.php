<?php
  include_once '../../conn.php';
// Connect to the database.
$db = connect();
  if(session_status() !== PHP_SESSION_ACTIVE)
    session_start();

  // Prepare the SQL query.
  $sql = 'SELECT * FROM course';
  $stmt = $db->prepare($sql);

  $stmt->execute();
  $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Close the database connection.
  $db = null;
  $_SESSION['courses'] = $courses;
?>
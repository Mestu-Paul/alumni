<?php
  include_once '../../conn.php';
  // Connect to the database.
  $db = connect();
  if(session_status() !== PHP_SESSION_ACTIVE)
    session_start();

  // Prepare the SQL query.
  $sql = 'SELECT * FROM events';
  $stmt = $db->prepare($sql);

  $stmt->execute();
  $_SESSION['events'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Close the database connection.
  $db = null;
?>
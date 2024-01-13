<?php

include_once '../../conn.php';

$db = connect();

if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();
// Connect to the database.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
  $title = $_POST['title'];
  $source = $_POST['source'];
  $date = $_POST['date'];
  if($date < date('Y-m-d')){
    $_SESSION['message'] = "Invalid Date";
    header("Location: ../frontend/job.php");
  }

  $sql = 'INSERT INTO job (title, source, name, date) VALUES (:title, :source, :name, :date)';
  $stmt = $db->prepare($sql);

  // Bind parameters with the data
  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':date', $date);
  $stmt->bindParam(':source', $source);
  $stmt->bindParam(':name', $_SESSION['user_name']);

  // Execute the query to insert alumni data.
  $stmt->execute();
}
$db = null;
header("Location: ../frontend/job.php");
?>
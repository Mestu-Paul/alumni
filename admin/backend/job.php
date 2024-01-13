<?php

include_once '../../conn.php';

$db = connect();

if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();

$sql = 'DELETE FROM job WHERE id=:id';
$stmt = $db->prepare($sql);

// Bind parameters with the data
$stmt->bindParam(':id', $_GET['id']);

// Execute the query to insert alumni data.
$stmt->execute();
$db = null;
header("Location: ../frontend/job.php");

?>
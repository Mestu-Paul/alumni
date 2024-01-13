<?php
include_once '../../conn.php';
// Connect to the database.
$db = connect();
if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();
$id = $_GET['id'];

// Prepare the SQL query.
$sql = 'SELECT * FROM events WHERE id=:id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$_SESSION['event'] = $stmt->fetch(PDO::FETCH_ASSOC);

// Close the database connection.
$db = null;
header("Location: ../frontend/event_details.php");
?>
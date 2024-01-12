<?php

include_once '../../conn.php';
// Connect to the database.
$db = connect();

if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();

if (isset($_GET['a'])) {
  $action = $_GET['a'];
  $id = $_GET['id'];
  if ($action === '2') {
    $sql = "DELETE FROM contacts WHERE Id=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
  }
}

// Prepare the SQL query.
$sql = 'SELECT * FROM contacts';
$stmt = $db->prepare($sql);

$stmt->execute();
$_SESSION['contacts'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Close the database connection.
$db = null;

header("Location:../frontend/contact.php");
?>
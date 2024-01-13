<?php

include_once '../../conn.php';

$db = connect();

if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();
// Connect to the database.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
  $amount = $_POST['amount'];
  $remarks = $_POST['remarks'];
  $date = $_POST['date'];
  $bank = $_POST['bank'];
  $type = $_POST['type'];

  $sql = 'INSERT INTO fund_collection (amount, payment_date, type, name, remarks, bank) VALUES (:amount, :date, :type, :name, :remarks, :bank)';
  $stmt = $db->prepare($sql);

  // Bind parameters with the data
  $stmt->bindParam(':amount', $amount);
  $stmt->bindParam(':date', $date);
  $stmt->bindParam(':type', $type);
  $stmt->bindParam(':name', $_SESSION['user_name']);
  $stmt->bindParam(':remarks', $remarks);
  $stmt->bindParam(':bank', $bank);

  // Execute the query to insert alumni data.
  $stmt->execute();
}
$db = null;
header("Location: ../frontend/fund.php");
?>
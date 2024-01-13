<?php

include_once '../../conn.php';

$db = connect();

if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();
// Connect to the database.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
  $amount = $_POST['amount']; // text 
  $reason = $_POST['reason']; // text 
  $date = $_POST['date']; // text 
  $note = $_POST['note']; // text 
  
  $sql = 'SELECT * FROM total_fund WHERE id=1';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $total_fund = $stmt->fetch(PDO::FETCH_ASSOC);
  if($amount>$total_fund['total']-$total_fund['invest']){
    $_SESSION['message'] = "Insufficient balance";
    header("Location: ../frontend/fund.php");
  }
  $total_fund['invest']+=$amount;
  $sql = 'INSERT INTO invest (amount, date, email, note) VALUES (:amount, :date, :email, :note);
          UPDATE total_fund SET invest=:invest WHERE id=1;';
  $stmt = $db->prepare($sql);

  // Bind parameters with the data
  $stmt->bindParam(':amount', $amount);
  $stmt->bindParam(':date', $date);
  $stmt->bindParam(':email', $_SESSION['user_email']);
  $stmt->bindParam(':note', $note);
  $stmt->bindParam(':invest', $total_fund['invest']);

  // Execute the query to insert alumni data.
  $stmt->execute();
}
$db = null;
header("Location: ../frontend/fund.php");
?>
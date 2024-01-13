<?php
  include_once '../../conn.php';
  // Connect to the database.
  $db = connect();
  if(session_status() !== PHP_SESSION_ACTIVE)
    session_start();

  // get fund list
  $sql = 'SELECT * FROM fund_collection';  
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $funds = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $sql = 'SELECT * FROM total_fund WHERE id=1';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $total_fund = $stmt->fetch(PDO::FETCH_ASSOC);
  
  $sql = 'SELECT * FROM invest';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $invest = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // Close the database connection.
  $db = null;
?>
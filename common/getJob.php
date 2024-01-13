<?php
include_once '../../conn.php';
// Connect to the database.
$db = connect();
if(session_status() !== PHP_SESSION_ACTIVE)
  session_start();

// Delete expired jobs
$sqlDelete = 'DELETE FROM job WHERE date < CURDATE()';  
$stmtDelete = $db->prepare($sqlDelete);
$stmtDelete->execute();

// Get the job list
$sqlSelect = 'SELECT * FROM job';
$stmtSelect = $db->prepare($sqlSelect);
$stmtSelect->execute();
$jobs = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
$db = null;
?>

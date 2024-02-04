
<?php
if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();
include_once '../../conn.php';
$db = connect();
$stmt = $db->prepare("SELECT * FROM success_stories");
$stmt->execute();

// Fetch the data
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
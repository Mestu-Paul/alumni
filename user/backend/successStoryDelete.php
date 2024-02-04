
<?php
if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();
include_once '../../conn.php';
$id = $_GET['id'];

$db = connect();
$sql = 'DELETE FROM success_stories WHERE id = :id; DELETE FROM success_details WHERE success_stories_id = :id1; ';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':id1', $id);
$stmt->execute();
header("Location: ../frontend/successStories.php");
exit();
?>
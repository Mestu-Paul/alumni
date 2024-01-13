<?php
include '../../conn.php';
$db = connect();
$sql = "SELECT * FROM user";
$stmnt = $db->prepare($sql);
$stmnt->execute();
$admins = $stmnt->fetchAll(PDO::FETCH_ASSOC);
?>
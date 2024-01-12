<?php
include_once '../../conn.php';
// Connect to the database.
$db = connect();
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start();

if(isset( $_GET['a'])){
	$action = $_GET['a'];
	$type = $_GET['t'];
	$id = $_GET['id'];
	echo $action.' '.$type.' '.$id;
	if($action==='1'){
		if($type==='1'){
			$sql = "UPDATE alumni SET verified=1 WHERE Id=:id";
		}
		else {
			$sql = "UPDATE staff SET verified=1 WHERE id=:id";
		}
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
	}
	else{
		if($type==='1'){
			$sql = "DELETE FROM alumni WHERE Id=:id";
			$sql1 = "DELETE FROM user WHERE id=:id";
			$sql2 = "SELECT UserId FROM alumni WHERE Id=:id";
		}
		else{
			$sql = "DELETE FROM staff WHERE id=:id";
			$sql1 = "DELETE FROM user WHERE id=:id";
			$sql2 = "SELECT UserId FROM staff WHERE id=:id";
		}
		// find userID
		$stmt = $db->prepare($sql2);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		$UserId = $stmt->fetch(PDO::FETCH_ASSOC);

		// delete from user table 
		$stmt = $db->prepare($sql1);
		$stmt->bindParam(":id", $UserId['UserId']);
		$stmt->execute();

		// delete from alumni/staff table 
		$stmt = $db->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
	}
}

// Prepare the SQL query.
$sql = 'SELECT * FROM alumni WHERE verified=0';
$stmt = $db->prepare($sql);

$stmt->execute();
$alumni = $stmt->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['alumni'] = $alumni;

$sql = 'SELECT * FROM staff WHERE verified=0';
$stmt = $db->prepare($sql);

$stmt->execute();
$staff = $stmt->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['staff'] = $staff;

// Close the database connection.
$db = null;
header("Location:../frontend/verify.php");
?>
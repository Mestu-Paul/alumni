
<?php
include_once '../../conn.php';
// Connect to the database.
$db = connect();
echo $_GET['t'].$_GET['id'];
if ($_GET['t'] == "status") {
    $sql = "UPDATE student_queries SET status=1-status WHERE id=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $_GET["id"]);
    $stmt->execute();
}
else if($_GET['t'] == "delete") {
    $sql = "DELETE FROM student_queries WHERE id=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $_GET["id"]);
    $stmt->execute();
}
header("Location: ../frontend/studentQuery.php");
$db = null;
?>
<?php
  include_once '../../conn.php';
// Connect to the database.
$db = connect();
  if(session_status() !== PHP_SESSION_ACTIVE)
    session_start();
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['eventTitle'];
    $location = $_POST['location'];
    $eventDate = $_POST['eventDate'];
    $eventTime = $_POST['eventTime'];
    $description = $_POST['description'];
    
    if(empty($title) || empty($location) || empty($eventDate) || empty($eventTime)){
      $_SESSION['message'] = 'Please fill up carefully';
      header('Location: ../frontend/eventManage.php');
    }

    // Prepare the SQL query.
    $sql = 'INSERT INTO events (title,location,date,time,description)
     VALUES(:ttl,:lc,:dt,:tm,:des)';
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':ttl', $title);
    $stmt->bindParam(':lc', $location);
    $stmt->bindParam(':dt', $eventDate);
    $stmt->bindParam(':tm', $eventTime);
    $stmt->bindParam(':des', $description);
    $stmt->execute();
  }
  if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset( $_GET['a'])) {
    $id = $_GET['id'];
    $action = $_GET['a'];
    $sql = 'DELETE FROM events WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $_SESSION['message'] = 'Event has been deleted successfully';
  }
  include('getEvents.php');
  header("Location: ../frontend/eventManage.php");
?>
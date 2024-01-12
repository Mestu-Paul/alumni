<?php
  include_once '../../conn.php';
// Connect to the database.
$db = connect();
  if(session_status() !== PHP_SESSION_ACTIVE)
    session_start();
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_name = $_POST['courseName'];
    echo $course_name;
    if(empty($course_name)) {
      $_SESSION['message'] = 'course title can be empty';
      header('Location: ../frontend/manageCourse.php');
    }

    // Prepare the SQL query.
    $sql = 'INSERT INTO course (course_name) VALUES(:course_name)';
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':course_name', $course_name);
    $stmt->execute();
  }
  if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset( $_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'DELETE FROM course WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
  include('getCourse.php');
  header("Location: ../frontend/manageCourse.php");
?>
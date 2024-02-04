<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once '../../conn.php';
    
    $title = $_POST['title'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $session = $_POST['session'];
    $studentId = $_POST['studentId'];
    $contact = $_POST['conact'];
    $reason = $_POST['reason'];
    $email = $_POST['email'];

    try {
        $db = connect();
        $stmt = $db->prepare("INSERT INTO student_queries (title, name, department, session, student_id, contact, reason, email)
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $name, $department, $session, $studentId, $contact, $reason, $email]);

        header("Location: ../frontend/successStories.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<?php
if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $name = $_POST['name']; // text 
  $email = $_POST['email']; // text
  $contact = $_POST['number']; // text
  $subject = $_POST['subject']; // text
  $message = $_POST['message']; // text
  if (empty($name) || empty($email) || empty($contact) || empty($subject) || empty($message) ) {
    $_SESSION['message'] = 'Please fill up carefully';
    header("Location: ../frontend/contact.php");
  } 
  
  include_once '../../conn.php';
// Connect to the database.
$db = connect();

  
  // create user account
  // Prepare the SQL query to insert into the User table.
  $sql = 'INSERT INTO contacts (name,email,contact,subject,message) 
    VALUES (:name, :email, :contact,:subject,:message)';
  $stmt = $db->prepare($sql);

  // Bind parameters with the data
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':contact', $contact);
  $stmt->bindParam(':subject', $subject);
  $stmt->bindParam(':message', $message);

  // Execute the query to insert alumni data.
  $stmt->execute();

  
  // Close the database connection.
  $db = null;

  $_SESSION['message'] = 'Thank You for your contact.';
  header("Location: ../frontend/index.php");

}
?>
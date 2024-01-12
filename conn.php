<?php

function connect()
{
    $host = 'localhost';
    $dbname = 'alumni';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Set PDO to throw exceptions on errors
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        // Handle connection errors gracefully
        die("Connection failed: " . $e->getMessage());
    }
}
$conn = connect();
if (!$conn) die("Under Construction!");

?>
<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dhaxaldatabase";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables to store form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$relationship = $_POST['relationship'];
$deceased_id = $_POST['deceasedID'];

// Prepare and execute a secure SQL insert statement
$sql = "INSERT INTO dhaxlayaal (name, email, phone, relationship, deceased_id) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssss", $name, $email, $phone, $relationship, $deceased_id);
    
    if ($stmt->execute()) {
        // Data insertion successful
    } else {
        // Data insertion failed
        // Handle the error (e.g., log the error, show a user-friendly message)
    }
    
    $stmt->close();
} else {
    // Error in preparing the statement
    // Handle the error (e.g., log the error, show a user-friendly message)
}

// Close the database connection
$conn->close();
?>

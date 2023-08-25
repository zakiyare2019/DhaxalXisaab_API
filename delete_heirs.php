<?php

// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dhaxaldatabase";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the POST request
$id = $_POST['id'];

// Update query
$sql = "delete from dhaxlayaal  WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    // Update successful
    echo "Record updated successfully";
} else {
    // Update failed
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>

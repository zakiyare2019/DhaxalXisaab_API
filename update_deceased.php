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
$name = $_POST['name'];
$total_asset = $_POST['total_asset'];
$loan_amount = $_POST['loan_amount'];
$will_amount = $_POST['will_amount'];
$gender = $_POST['gender'];

// Update query
$sql = "UPDATE marxuum SET name='$name', total_asset='$total_asset', loan_amount='$loan_amount', will_amount='$will_amount', gender='$gender' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    // Update successful
    echo "Record updated successfully";
} else {
    // Update failed
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>

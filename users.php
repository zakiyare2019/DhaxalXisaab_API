<?php
include 'codes.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Establish a database connection (modify with your own credentials)
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "dhaxaldatabase";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement with placeholders for user input
$sql = "SELECT user_name, password FROM users WHERE user_name = ? AND password = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind the user input values to the prepared statement parameters
    $stmt->bind_param("ss", $username, $password);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a row is returned
    if ($result->num_rows > 0) {
        // Login successful
        $response = array(
            "status" => "success",
            "message" => "Login successful"
        );
    } else {
        // Invalid credentials
        $response = array(
            "status" => "error",
            "message" => "Invalid username or password"
        );
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Error in preparing the statement
    $response = array(
        "status" => "error",
        "message" => "Error in preparing the statement"
    );
}

// Close the database connection
$conn->close();

// Send the response as JSON
header("Content-Type: application/json");
echo json_encode($response);
?>

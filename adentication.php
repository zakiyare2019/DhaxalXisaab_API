<?php
include 'codes.php';

// Validate and sanitize user input
if (isset($_POST['username'])) {
    $username = $_POST['username'];

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
    $sql = "SELECT marxuum.name AS deceasedName, total_asset AS asset, loan_amount AS loan, will_amount AS will, (total_asset - loan_amount - will_amount) AS NetAsset, gender AS gender, dhaxlayaal.name AS heirName, email, phone, relationship, image FROM marxuum, dhaxlayaal WHERE marxuum.id = dhaxlayaal.deceased_id AND marxuum.id = (SELECT marxuum.id FROM dhaxlayaal WHERE dhaxlayaal.phone = ?)ORDER BY id DESC";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the user input values to the prepared statement parameters
        $stmt->bind_param("s", $username);

        // Execute the prepared statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if a row is returned
        if ($result->num_rows > 0) {
            // Fetch the data from the result
            $data = $result->fetch_assoc();

            // Fetch the image data (assuming it's stored as a BLOB in the database)
            $imageData = $data['image'];

            // Convert the image data to base64 encoding
            $imageBase64 = base64_encode($imageData);

            // Add the base64-encoded image data to the response
            $data['image'] = $imageBase64;

            // Close the prepared statement
            $stmt->close();

            // Close the database connection
            $conn->close();

            // Send the response with fetched data as JSON
            header("Content-Type: application/json");
            echo json_encode(array(
                "status" => "success",
                "message" => "Login successful",
                "data" => $data
            ));
            exit(); // Terminate the script
        } else {
            // Invalid credentials
            $response = array(
                "status" => "error",
                "message" => "Invalid Phone number"
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
} else {
    // No username provided
    $response = array(
        "status" => "error",
        "message" => "No username provided"
    );
}

// Send the response as JSON
header("Content-Type: application/json");
echo json_encode($response);
?>

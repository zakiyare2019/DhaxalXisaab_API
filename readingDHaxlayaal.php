<?php
// Replace these variables with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dhaxaldatabase";

// Create connection
try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    $response = array();

    if (isset($_POST['username'])) {
        $username = $_POST['username'];

        $sql = "SELECT  marxuum.total_asset-marxuum.loan_amount-marxuum.will_amount lacag,dhaxlayaal.relationship, COUNT(dhaxlayaal.relationship) AS count FROM marxuum ,dhaxlayaal where marxuum.id=dhaxlayaal.deceased_id and deceased_id in (SELECT deceased_id from dhaxlayaal where dhaxlayaal.phone='$username') GROUP by relationship";
        $result = $conn->query($sql);

        if ($result === false) {
            throw new Exception("Query error: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $response['status'] = 'success';
            $response['message'] = 'Phone number found';
            $response['data'] = $data;
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Username not found';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Username not provided';
    }
} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = 'An error occurred: ' . $e->getMessage();
}

if (isset($conn)) {
    $conn->close();
}

header('Content-Type: application/json');
echo json_encode($response);
?>

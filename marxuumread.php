<?php
include "codes.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $response = array();

    // Fetch the data from your database (modify the query according to your table structure)
    $sql = "SELECT id, name FROM marxuum ORDER BY id DESC";
    $gl = new inheritance_class();

    $result = $gl->operationReturn($sql);
echo(json_decode($result));
//     if ($result && $result->num_rows > 0) {
//         // Fetch the data and add it to the response array as objects
//         while ($row = $result->fetch_assoc()) {
//             $item = new stdClass();
//             $item->id = $row['id'];
//             $item->name = $row['name'];
//             $response[] = $item;
//         }

//         // Output the response as JSON
//         echo json_encode($response);
//     } else {
//         // There was an error fetching the data or no data found
//         echo json_encode(array("status" => "error", "message" => "Failed to fetch data"));
//     }
// } else {
//     // Invalid request method
//     echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}
?>

<?php
header('Content-Type: application/json');

class API {
    private $conn;

    function __construct() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dhaxaldatabase";

        $this->conn = mysqli_connect($host, $username, $password, $dbname);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    function insertData($name, $email) {
        $sql = "INSERT INTO your-table-name (name, email) VALUES ('$name', '$email')";
        if (mysqli_query($this->conn, $sql)) {
            $response = array('status' => 'success', 'message' => 'Data inserted successfully');
        } else {
            $response = array('status' => 'error', 'message' => 'Error inserting data: ' . mysqli_error($this->conn));
        }
        return json_encode($response);
    }

    function updateData($id, $name, $email) {
        $sql = "UPDATE your-table-name SET name='$name', email='$email' WHERE id=$id";
        if (mysqli_query($this->conn, $sql)) {
            $response = array('status' => 'success', 'message' => 'Data updated successfully');
        } else {
            $response = array('status' => 'error', 'message' => 'Error updating data: ' . mysqli_error($this->conn));
        }
        return json_encode($response);
    }

    function deleteData($id) {
        $sql = "DELETE FROM your-table-name WHERE id=$id";
        if (mysqli_query($this->conn, $sql)) {
            $response = array('status' => 'success', 'message' => 'Data deleted successfully');
        } else {
            $response = array('status' => 'error', 'message' => 'Error deleting data: ' . mysqli_error($this->conn));
        }
        return json_encode($response);
    }

    function fillTable() {
        $sql = "SELECT * FROM your-table-name";
        $result = mysqli_query($this->conn, $sql);

        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return json_encode($data);
    }

    function fillCombobox() {
        $sql = "SELECT name FROM your-table-name";
        $result = mysqli_query($this->conn, $sql);

        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row['name'];
        }
        return json_encode($data);
    }

    function __destruct() {
        mysqli_close($this->conn);
    }
}

$data = json_decode(file_get_contents('php://input'), true);
$action = $data['action'];

$api = new API();

if ($action == 'insert') {
    $name = $data['name'];
    $email = $data['email'];
    echo $api->insertData($name, $email);
} elseif ($action == 'update') {
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    echo $api->updateData($id, $name, $email);
} elseif ($action == 'delete') {
    $id = $data['id
echo $api->deleteData($id);
} 
?>
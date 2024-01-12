<?php
// delete_data.php

if (isset($_GET['patientId'])) {
    $patientId = $_GET['patientId'];

    // Your database connection code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pregnant";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to delete the record
    $sql = "DELETE FROM admitedin WHERE id = $patientId";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>

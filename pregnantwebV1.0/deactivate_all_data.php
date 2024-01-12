<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pregnant";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Your database connection code here

// Step 1: Delete all records
$sql_delete = "DELETE FROM admitedin";
$result_delete = $conn->query($sql_delete);

// Check if the deletion was successful
if ($result_delete) {
    // Step 2: Reset the auto-increment value to 1
     $sql_reset_auto_increment = " ALTER TABLE admitedin AUTO_INCREMENT = 1;";
    $result_reset_auto_increment = $conn->query($sql_reset_auto_increment);

    if ($result_reset_auto_increment) {
        echo "All data deactivated and auto-increment reset.";
    } else {
        echo "Error resetting auto-increment value.";
    }
} else {
    echo "Error deactivating all data.";
}

// Close the database connection
$conn->close();
?>



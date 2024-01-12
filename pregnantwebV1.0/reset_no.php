<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pregnant";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Resetting the 'No' field starting from 1
$sql = "SET @count = 0;
        UPDATE admitedin SET No = @count := @count + 1;
        ALTER TABLE admitedin AUTO_INCREMENT = 1;";

if ($conn->multi_query($sql) === TRUE) {
    echo "No field reset successfully.";
} else {
    echo "Error resetting No field: " . $conn->error;
}

$conn->close();
?>

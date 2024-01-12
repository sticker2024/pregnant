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

// Step 1: SQL query to delete all records from 'admitedout' table
$sql_delete = "DELETE FROM admitedout";

if ($conn->query($sql_delete) === TRUE) {
    // Step 2: SQL query to reset the auto-increment value to 1
    $sql_reset_auto_increment = "ALTER TABLE admitedout AUTO_INCREMENT = 1";
    
    if ($conn->query($sql_reset_auto_increment) === TRUE) {
        echo "All records in 'admitedout' table have been deactivated, and auto-increment reset.";
    } else {
        echo "Error resetting auto-increment value: " . $conn->error;
    }
} else {
    echo "Error deactivating all records: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

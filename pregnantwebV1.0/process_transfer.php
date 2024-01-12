<?php
// process_transfer.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $location = $_POST['location'];
    $recordId = $_POST['recordId'];

    // Perform the transfer logic here
    // Update the admitedout table with the transfer information
    // You should use parameterized queries to prevent SQL injection
    // Also, handle database connection and error handling appropriately

    // Example code (modify as needed):
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pregnant";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve data from the admitedin table
    $sqlSelect = "SELECT * FROM admitedin WHERE id = $recordId";
    $resultSelect = $conn->query($sqlSelect);

    if ($resultSelect->num_rows > 0) {
        $row = $resultSelect->fetch_assoc();

        // Insert data into the admitedout table
        $sqlInsert = "INSERT INTO admitedout (FirstName, LastName, ContactNumber, LastMenstrualPeriod, ExpectedDueDate, NumberOfBirth, TransferDate, BloodGroup, MedicalHistory, Sector, Village, LocationTransferred)
            VALUES (
                '" . $row['FirstName'] . "',
                '" . $row['LastName'] . "',
                '" . $row['ContactNumber'] . "',
                '" . $row['LastMenstrualPeriod'] . "',
                '" . $row['ExpectedDueDate'] . "',
                '" . $row['NumberOfBirth'] . "',
                CURRENT_TIMESTAMP(),
                '" . $row['BloodGroup'] . "',
                '" . $row['MedicalHistory'] . "',
                '" . $row['Sector'] . "',
                '" . $row['Village'] . "',
                '$location'
            )";

        if ($conn->query($sqlInsert) === TRUE) {
            // Display a bigger message in the center
            echo "<html><head><title>Transfer Successful</title></head><body><div style='text-align: center; margin-top: 50px;'><h1>Transfer successful</h1>";
            // Add a button to go back to the table containing records to transfer
            echo "<a href='admitedin_display.php'><button style='padding: 10px 20px; font-size: 16px;'>Back to Records</button></a></div></body></html>";

		} else {
            echo "Error: " . $sqlInsert . "<br>" . $conn->error;
        }
    } else {
        echo "Record not found";
    }

    $conn->close();
}
?>

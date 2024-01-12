 <?php
session_start();

// Check if the user is not authenticated, redirect to the login page
if (!isset($_SESSION["user_id"])) {
    header("Location: loginn.php");
    exit();
}

// Check if form fields are set
if (isset($_POST['patient_id'], $_POST['hospital'])) {
    $patient_id = $_POST['patient_id'];
    $hospital = $_POST['hospital'];

    // Perform database operations here, for example:
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pregnant";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Retrieve data from 'admitedin' table for the specified patientId
        $sql_select = "SELECT * FROM admitedin WHERE id = ?";
        $stmt_select = $conn->prepare($sql_select);
        $stmt_select->bind_param("i", $patient_id);

        if ($stmt_select->execute()) {
            $result_select = $stmt_select->get_result();

            if ($result_select->num_rows > 0) {
                $row = $result_select->fetch_assoc();

                // Avoid SQL injection by using prepared statements
                $stmt_insert = $conn->prepare("INSERT INTO admitedout (Id, FirstName, LastName, ContactNumber, LastMenstrualPeriod, ExpectedDueDate, NumberOfBirth, TransferDate, BloodGroup, MedicalHistory, Sector, Village, LocationTransferred) VALUES (?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP(), ?, ?, ?, ?, ?)");

                $stmt_insert->bind_param("isssssississ", $patient_id, $row['FirstName'], $row['LastName'], $row['ContactNumber'], $row['LastMenstrualPeriod'], $row['ExpectedDueDate'], $row['NumberOfBirth'], $row['BloodGroup'], $row['MedicalHistory'], $row['Sector'], $row['Village'], $hospital);

                if ($stmt_insert->execute()) {
                    // Commit the transaction if all queries succeed
                    $conn->commit();

                    // Update TransferStatus to "Transferred"
                    $update_status_sql = "UPDATE admitedin SET TransferStatus = 'Transferred' WHERE id = ?";
                    $stmt_update_status = $conn->prepare($update_status_sql);
                    $stmt_update_status->bind_param("i", $patient_id);

                    // Check if the update statement was successful
                    if ($stmt_update_status->execute()) {
                        echo "<html><head><title>Transfer Successful</title></head><body style='font-family: Arial; text-align: center; margin-top: 50px;'>";
                        echo "<h1>Transfer Successful</h1>";
                        echo "<p>Thank you for transferring the patient to our hospital!</p>";
                        echo "<a href='admitedin_display.php'><button style='padding: 10px 20px; font-size: 16px;  background-color: #007bff; color: #fff; border: none; border-radius: 10px; '>Back to Records</button></a>";
                        echo "</body></html>";
                    } else {
                        echo "Error updating TransferStatus. Please try again.";
                    }

                    // Close the update statement
                    $stmt_update_status->close();
                } else {
                    // Rollback the transaction if there is an error
                    $conn->rollback();
                    echo "Error transferring patient. Please try again.";
                }

                $stmt_insert->close();
            } else {
                echo "No records found for the specified patientId";
            }
        } else {
            // Rollback the transaction if there is an error
            $conn->rollback();
            echo "Error retrieving patient information.";
        }

        $stmt_select->close();
    } catch (Exception $e) {
        // Handle exceptions and rollback the transaction
        $conn->rollback();
        echo "An error occurred: " . $e->getMessage();
    } finally {
        // Close the database connection
        $conn->close();
    }
} else {
    echo "Invalid request.";
}
?>

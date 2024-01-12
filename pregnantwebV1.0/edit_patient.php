 <?php
// edit_patient.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pregnant";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve data from the form
    $editPatientId = $_POST["edit_patient_id"];
    $editFirstName = isset($_POST["editFirstName"]) ? $_POST["editFirstName"] : '';
    $editLastName = isset($_POST["editLastName"]) ? $_POST["editLastName"] : '';
	$editcontact  = isset($_POST["editcontact"]) ? $_POST["editcontact"] : '';            
	$editsector  = isset($_POST["editsector"]) ? $_POST["editsector"] : '';
	$editVillage  = isset($_POST["editVillage"]) ? $_POST["editVillage"] : '';

// Add more variables for other fields 
    // SQL query to update the record in the database
    $sql = "UPDATE admitedin SET 
        FirstName = '$editFirstName', 
        LastName = '$editLastName',
        ContactNumber = '$editcontact',
        Sector = '$editsector', 
        Village = '$editVillage' 
        WHERE id = '$editPatientId'";


    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
  echo "<a href='admitedin_display.php'><button style='padding: 10px 20px; font-size: 16px;  background-color: #007bff; color: #fff; border: none; border-radius: 10px; '>Back to Records</button></a>";
                        
?>

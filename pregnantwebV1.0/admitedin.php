  <?php
session_start();

// Check if the user is not authenticated, redirect to the login page
if (!isset($_SESSION["user_id"])) {
    header("Location: loginn.php");
    exit();
}
?>
 


 <?php
// print_certification.php

if (isset($_POST['print_certification'])) {
    // Retrieve patient ID from the submitted form
    $patient_id = $_POST['patient_id'];

    // Retrieve patient information from the database based on the ID
    // Replace the following code with your actual SQL queries to fetch the patient information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pregnant";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch patient information including the location transferred
    $sql = "SELECT * FROM admitedout WHERE id = $patient_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $patient_data = $result->fetch_assoc();
        $location_transferred = $patient_data['LocationTransferred'];

        // Generate the dynamic certificate HTML content
        $certificate_content = "<div style='text-align: center; border: 2px solid #333; padding: 20px; background-color: #f8f8f8;'>";
        $certificate_content .= "<h2 style='color: #333;'>Certification for Patient Transfer</h2>";
        $certificate_content .= "<p>{$patient_data['FirstName']} {$patient_data['LastName']} is hereby certified to be transferred to {$location_transferred}.</p>";
        $certificate_content .= "<p>We request that {$location_transferred} receives this patient and extends a warm welcome to her.</p>";
        $certificate_content .= "<p style='font-weight: bold; color: #555;'>Location Transferred: {$location_transferred}</p>";
        $certificate_content .= "<p style='color: #555;'>Date: " . date("Y-m-d") . "</p>";
        $certificate_content .= "</div>";

        // Apply CSS for better appearance
        $certificate_content .= "<style>
                                    body {
                                        font-family: Arial, sans-serif;
                                    }
                                </style>";

        // Output the certificate content
        echo $certificate_content;
    } else {
        echo "Patient not found";
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Management System - Admitted Out</title>
    <link rel="stylesheet" href="admitedout.css">
	<style>.deactivate-button {
            margin-bottom: 10px;
        }
		 
    .deactivate-button {
        background-color: #dc3545;  
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .deactivate-button:hover {
        background-color: #c82333; /* Darker shade for hover effect */
    }
 .transfer-button {
        background-color: #007bff; / 
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .transfer-button:hover {
        background-color: #0056b3; /* Darker shade for hover effect */
    }

.transfer-cell {
    text-align: center; /* Align the button to the center within the cell */
}

.transfer-button {
    background-color: #007bff;
    color: #fff;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

.transfer-button:hover {
    background-color: #0056b3;
}

		
		
		
		</style>
</head>

<body>
    <header>
        <h1>Healthcare Management System</h1>
    </header>
	 


    <nav>
        <ul>
            <li><a href="landing.php">HOME</a></li>
            <li><a class="active" href="admitedin.php">ADMITTED IN</a></li>
            <li><a href="admitedout.php">ADMITTED OUT</a></li>
            <li><a href="total.php">TOTAL</a></li>
            <li><a href="child.php">CHILD BORN</a></li>
            <li><a href="admitedin_form.php">REGIST</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <!-- Add other navigation links based on your requirements -->
        </ul>
    </nav>

    <main>
        <section>
            <center><h2>Pregnant Patients Admitted Out</h2></center>
			
			<button class="deactivate-button" onclick="deactivateAllData()">Deactivate All Data</button>
			  

            <table>
                <thead>
				
                    <tr>
                        <th>No</th>
                        <th>Mother's Name</th>
                        <th>Phone Number</th>
                        <th>Sector</th>
                        <th>Village</th>
                        <th>Last Menstrual Period Date</th>
                        <th>Expected Due Date</th>
                        <th>Number of Birth</th>
                        <th>Blood Group</th>
                        <th>Medical History </th>
                        <th>Admision Date</th>
                        
                        <th>Room </th>
						<th>Transfered status</th>
						 <th>Action</th>
						<!-- Add this column for the delete button -->
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // PHP code to retrieve data from the database and populate the table
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "pregnant";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // SQL query to retrieve records from the 'admitedin' table
                    $sql = "SELECT * FROM admitedin";
                    $result = $conn->query($sql);

                    // Check if there are records
                    if ($result->num_rows > 0) {
                        $count = 1;
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr id=\"record-{$row['id']}\">
                                 <td>{$row['id']}</td>
                                <td>{$row['FirstName']} {$row['LastName']} </td>
                              
                                <td>{$row['ContactNumber']}</td>
                                <td>{$row['Sector']}</td>
                                <td>{$row['Village']}</td>
                                <td>{$row['LastMenstrualPeriod']}</td>
                                <td>{$row['ExpectedDueDate']}</td>
                                <td>{$row['NumberOfBirth']}</td>
                                <td>{$row['BloodGroup']}</td>
                                <td>{$row['MedicalHistory']}</td>
                                <td>{$row['AdmissionDate']}</td>
                                <td>{$row['Room']}</td>
                                <td>{$row['TransferStatus']}</td>
							 
						   <td><button onclick=\"transferPatient({$row['id']})\">Transfer</button></td>


                             




                           </tr>";
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='12'>No records found</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Healthcare Management System</p>
    </footer>

    <script>
        function deleteRecord(recordId) {
            // Confirm deletion
            if (confirm("Are you sure you want to delete this record?")) {
                // Perform AJAX request to delete the record
                fetch(`/delete-record.php?id=${recordId}`, {
                    method: 'DELETE',
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    // Remove the row from the HTML after successful deletion
                    document.getElementById(`record-${recordId}`).remove();
                })
                .catch(error => console.error('Error:', error));
            }
        }
		<!-- Your existing HTML/PHP code -->


<!-- End of your existing HTML/PHP code -->

    </script>
	 <!-- ... (Your existing HTML code) -->

<script>
    function transferPatient(patientId) {
        // Set the patientId in the hidden field inside the form
        document.getElementById("patientId").value = patientId;

        // Open the modal
        document.getElementById("transferModal").style.display = "block";
    }

    function closeModal() {
        // Close the modal
        document.getElementById("transferModal").style.display = "none";
    }

    function deactivateAllData() {
        // Make an AJAX request to deactivate_all_data.php
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    // Handle the response from the server
                    alert(this.responseText);
                    // Reload the page to reflect changes
                    location.reload();
                } else {
                    // Handle error cases
                    console.error("Error: " + this.status);
                }
            }
        };
        xhttp.open("GET", "deactivate_all_data.php", true);
        xhttp.send();
    }
	</script>
	<script>
	function sendTransferRequest() {
    var formData = new FormData(document.getElementById('transferForm'));
    
    // Make an AJAX request to transfer_patient.php
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                // Handle the response from the server
                alert(this.responseText);
                // Reload the page to reflect changes
                location.reload();
            } else {
                // Handle error cases
                console.error("Error: " + this.status);
            }
        }
    };
    xhttp.open("POST", "transfer_patient.php", true);
    xhttp.send(formData);
}

</script>
<script>
    function transferPatient(patientId) {
        // Set the patientId in the hidden field inside the form
        document.getElementById("patientId").value = patientId;

        // Open the modal
        document.getElementById("transferModal").style.display = "block";
    }

    function closeModal() {
        // Close the modal
        document.getElementById("transferModal").style.display = "none";
    }

    function deactivateAllData() {
        // Make an AJAX request to deactivate_all_data.php
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Handle the response from the server
                alert(this.responseText);
                // Reload the page to reflect changes
                location.reload();
            }
        };
        xhttp.open("GET", "deactivate_all_data.php", true);
        xhttp.send();
    }
</script>


<!-- ... (Your existing HTML code) -->
 


    <script src="script.js"></script>
</body>

</html>

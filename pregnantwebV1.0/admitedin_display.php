 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Management System - Admitted In Display</title>
    <link rel="stylesheet" href="admited_form.css">
<link rel="stylesheet" href="admitedout.css">
<style>
.deactivate-button {
            margin-bottom: 10px;
        }
		 
    .deactivate-button {
        background-color: #dc3545; /* Bootstrap danger color, you can change it */
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
        background-color: #007bff; /* Bootstrap primary color, you can change it */
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

		
		
 
	
	
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .deactivate-button {
            margin-bottom: 10px;
        }
		.delete-button {
    background-color: #dc3545; /* Bootstrap danger color, you can change it */
    color: #fff;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

.delete-button:hover {
    background-color: #c82333; /* Darker shade for hover effect */
}

 .edit-button {
            background-color: #ffc107; /* Bootstrap warning color, you can change it */
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .edit-button:hover {
            background-color: #e0a800; /* Darker shade for hover effect */
        }
		
		/* Add this CSS to your existing styles */
/* Edit Modal Styles */
#editModal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

#editModal .modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
    border-radius: 10px;
}

#editModal label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

#editModal input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

#editModal button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

#editModal button:hover {
    background-color: #0056b3;
}

#editModal .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

#editModal .close:hover,
#editModal .close:focus {
    color: black;
    text-decoration: none;
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
            <li><a class="active"  href="admitedin_display.php">ADMITTED IN</a> </li>
            <li><li><a   href=" admitedout_display.php">TRANSFERED OUT</a>  </li>
            <li><a href="about.php">ABOUT</a></li>
            <!-- Add other navigation links based on your requirements -->
        </ul>
    </nav>

    <main>
        <section>
            <center>
                <h2><hr><i>PREGNANT ADMITED IN OUR HOSPITAL</i></hr></h2>
            </center>
           
            


            <!-- Modal -->
            <div id="transferModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <form action="transfer_patient.php" method="post">
                        <!-- Add this input field inside your form -->
                        <input type="hidden" name="patient_id" id="patientId" value="">

                        <label for="hospital">Select Hospital:</label>
                        <select name="hospital" id="hospital">
                            <option value="KING FAISAL HOSPITAL">King Faisal Hospital - Kigali</option>
                            <option value="UNIVERSITY TEACHING HOSPITAL">University Teaching Hospital of Kigali (CHUK)</option>
                            <option value="NYAMATA HOSPITAL"> Nyamta Hospital - Eastern Province</option>
                            <option value="GITWE HOSPITAL">Gitwe Hospital of Butare (CHUB)</option>
                            <option value="RUHENGERI HOSPITAL">Ruhengeri Hospital</option>
                            <option value="KABGAYI HOSPITAL">Kabgayi Hospital</option>
                            <option value="KARONGI HOSPITAL">Karongi Hospital</option>
                        </select>
                        <button class="transfer-button" type="submit" name="Send">Send</button>
                    </form>
                </div>
            </div>
			 <!-- Edit Modal -->
            <div id="editModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeEditModal()">&times;</span>
                    <form action="edit_patient.php" method="post">
                        <!-- Add this input field inside your form -->
                        <input type="hidden" name="edit_patient_id" id="editPatientId" value="">
                          
    
                       <!-- Add other input fields for editing -->
                        <label for="editFirstName">First Name:</label>
                        <input type="text" name="editFirstName" id="editFirstName" required>
						 <label for="editLastName">Last Name:</label>
                        <input type="text" name="editLastName" id="editLastName" required>
						  
						


                <label for="editcontact">Contact Number:</label>
                <input type="number" id="editcontact" name="editcontact">

                <!-- Additional Fields for Admitted Out -->
                
                    <!-- ... (your existing fields) ... -->
                    <label for="editsector">Sector:</label>
                    <input type="text" id="editsector" name="editsector">

                    <label for="editVillage">Village:</label>
                    <input type="text" id="editVillage" name="editVillage">

						
                         
                        <!-- Add more input fields as needed -->

                        <button class="transfer-button" type="submit" name="Update">Update</button>
                    </form>
                </div>
            </div>
        </section> 
		<!-- Deactivate All Data Button -->
		<button class="deactivate-button" onclick="deactivateAllData()">Deactivate All Data</button>
		<section>
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
						 <th>Edit</th>
						<!-- Add this column for the delete button -->
                        <!-- Add more columns as needed -->
                    </tr>
					   </thead>
                <tbody
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
         
            <td>
                <button class='transfer-button' onclick=\"transferPatient({$row['id']})\">Transfer</button>
                <button   class='delete-button' onclick=\"deleteData({$row['id']})\">Delete</button>
            </td>
			 <td>
                                    <button class='edit-button' onclick=\"editPatient({$row['id']})\">Edit</button>
                                </td>
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
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
        <!-- <section>
            <?php
            // Display records from the 'admitedin' table
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pregnant";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to retrieve all records from 'admitedin' table
            $sql = "SELECT * FROM admitedin";
            $result = $conn->query($sql);



            // Check if there are records
            if ($result->num_rows > 0) {
                echo "<h2>Records from the 'admitedin' table:</h2>";
                echo "<table border='1'>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Contact Number</th>
                                <th>Sector</th>
                                <th>Village</th>
                                <th>Last Menstrual Period</th>
                                <th>Expected Due Date</th>
                                <th>Number of Birth</th>
                                <th>Blood Group</th>
                                <th>Medical History</th>
                                <th>Admission Date</th>
                                <th>Room</th>
                                <th>Transfer Status</th>
                                <th>Action</th>
                            </tr>";

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['FirstName']}</td>
                                <td>{$row['LastName']}</td>
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
                }

                echo "</table>";
            } else {
                echo "No records found";
            }

            $conn->close();
            ?>
        </section -->
    </main>

    <footer>
        <p>&copy; 2023 Healthcare Management System</p>
    </footer>

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
	function deleteData(patientId) {
    // Confirm before deleting
    if (confirm("Are you sure you want to delete this record?")) {
        // Make an AJAX request to delete_data.php with the patientId
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Handle the response from the server
                alert(this.responseText);
                // Reload the page to reflect changes
                location.reload();
            }
        };
        xhttp.open("GET", "delete_data.php?patientId=" + patientId, true);
        xhttp.send();
    }
}
 function editPatient(patientId) {
            // Set the patientId in the hidden field inside the form
            document.getElementById("editPatientId").value = patientId;

            // Open the edit modal
            document.getElementById("editModal").style.display = "block";
        }

        function closeEditModal() {
            // Close the edit modal
            document.getElementById("editModal").style.display = "none";
        }

</script>


</body>

</html>









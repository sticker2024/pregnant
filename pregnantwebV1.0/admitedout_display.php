  <?php
session_start();

// Check if the user is not authenticated, redirect to the login page
if (!isset($_SESSION["user_id"])) {
    header("Location: loginn.php");
    exit();
}
?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Management System - Patient Form</title>
    <link rel="stylesheet" href="admited_form.css">
	<link rel="stylesheet" href="admitedout.css">
</head>
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
.transfer-button1{ background-color: #c82333;}
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
            border: 0.1px solid black;
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
    </style>

<body>
    <header>
        <h1>Healthcare Management System</h1>
    </header>

    <nav>
        <ul>
		 
    
	 
    
            <li><a href="landing.php">HOME</a></li>
            <li><a   href="admitedin_display.php">ADMITTED IN</a> </li>
            <li><li><a class="active"  href=" admitedout_display.php">TRANSFERED OUT</a>  </li>
            <li><a href="about.php">ABOUT</a></li>
             
            <!-- Add other navigation links based on your requirements -->
        </ul>
    </nav>

    <main>
        <section>
            <center>
                <h2><hr>TRANSFER PREGNANCY WOMAN TO ANOTHER HOSPITAL</hr></h2>
            </center>
			<button class="deactivate-button" onclick="deactivateAllData()">Deactivate All Data</button>
           
            <form action="" method="post">
                <!-- Your form fields here -->
				 </form>
				  <section>
            <center><h2><hr><i>Pregnant Patients Transfered at External Hospital</i></hr></h2></center>
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
						<th>Date Transferred</th>
                        <th>Location Transferred</th>
                        <th>Medical History</th>
						 <th>Action</th>
					 
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

                    // SQL query to retrieve records from the 'admitedout' table
                    $sql = "SELECT * FROM admitedout";
                    $result = $conn->query($sql);

                    // Check if there are records
                    if ($result->num_rows > 0) {
                        $count = 1;
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
           <td>{$count}</td>
           <td>{$row['FirstName']} {$row['LastName']}
           <td>{$row['ContactNumber']}</td>
		   <td>{$row['Sector']}</td>
            <td>{$row['Village']}</td>
            <td>{$row['LastMenstrualPeriod']}</td>
            <td>{$row['ExpectedDueDate']}</td>
            <td>{$row['NumberOfBirth']}</td>
            <td>{$row['BloodGroup']}</td>   
			<td>{$row['TransferDate']}</td>
            <td>{$row['LocationTransferred']}</td>
			<td>{$row['MedicalHistory']}</td>
            <td>
                <button class='transfer-button' ><form action='print_certification.php' method='post'>
                    <input type='hidden' name='patient_id' value='{$row['id']}'>
                    <input type='submit' class='transfer-button1' name='print_certification' value='Print Certification'>
                </form></button>
            </td> 
                                </tr>";
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='11'>No records found</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
				 
				 
				 
				 
				 
				 
				 

             <!--this code is hidden in out put form <?php
            // Display records from the 'admitedout' table
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pregnant";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to retrieve all records from 'admitedout' table
            $sql = "SELECT * FROM admitedout";
            $result = $conn->query($sql);
// SQL query to retrieve all records from 'admitedout' table
$sql = "SELECT *, 'print certification' AS action FROM admitedout";
$result = $conn->query($sql);


            // Check if there are records
            if ($result->num_rows > 0) {
                echo "<h2>Records from the 'admitedout' table:</h2>";
                echo "<table border='1'>
                        
        <tr>
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Contact Number</th>
            <th>Transfer Date</th>
            <th>Last Menstrual Period</th>
            <th>Expected Due Date</th>
            <th>Number of Birth</th>
            <th>Blood Group</th>
            <th>Medical History</th>
            <th>Sector</th>
            <th>Village</th>
            <th>Location Transferred</th>
            <th>Action</th>
			
        </tr>";

// Output data of each row
 //<!-- Output data of each row -->
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['FirstName']}</td>
            <td>{$row['LastName']}</td>
            <td>{$row['ContactNumber']}</td>
            <td>{$row['TransferDate']}</td>
            <td>{$row['LastMenstrualPeriod']}</td>
            <td>{$row['ExpectedDueDate']}</td>
            <td>{$row['NumberOfBirth']}</td>
            <td>{$row['BloodGroup']}</td>
            <td>{$row['MedicalHistory']}</td>
            <td>{$row['Sector']}</td>
            <td>{$row['Village']}</td>
            <td>{$row['LocationTransferred']}</td>
            <td>
                <form action='print_certification.php' method='post'>
                    <input type='hidden' name='patient_id' value='{$row['id']}'>
                    <input type='submit' name='print_certification' value='Print Certification'>
                </form>
            </td>
        </tr>";
}

echo "</table>";


                 
            } else {
                echo "No records found";
            }

            $conn->close();
            ?>end of hinden code-->
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Healthcare Management System</p>
    </footer>

    <script src="script.js"></script>
	 
<script>
    function deactivateAllData() {
        // Make an AJAX request to deactivate_all_dataa.php
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Handle the response from the server
                alert(this.responseText);
                // Reload the page to reflect changes
                location.reload();
            }
        };
        xhttp.open("GET", "deactivate_all_dataa.php", true);
        xhttp.send();
    }
</script>
</body>

</html>

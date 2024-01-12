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
</head>

<body>
    <header>
        <h1>Healthcare Management System</h1>
    </header>

    <nav>
        <ul>
		<li><a href="landing.php"> <button type="button">HOME</button></a></li>
       <li> <a href="admitedin.php"> <button type="button">ADMITTED IN</button></a></li>
        <li><a href="admitedout.php"><button type="button">ADMITTED OUT</button></a></li>
       <li> <a href="total.php"><button type="button">TATAL</button></a></li>
        <li><a href="child.php"><button type="button">CHILD BORN</button></a></li>
        <li><a class="active"  href="admitedout_form.php"><button type="button">REGIST</button></a></li>
        <li><a href="about.php"><button type="button">ABOUT</button></a></li>
        
           
            <!-- Add other navigation links based on your requirements -->
        </ul>
    </nav>

    <main>
        <section>
            <center><h2><hr>TRANSFER  PREGNANCY WOMAN TO ANOTHER HOSPITAL</hr></h2></center>
            <form action="" method="post">
                <!-- Common Fields -->
                <label for="name" name="name"> First Name:</label>
                <input type="text" id="name" name="name" >
				<label for="name">  Last Name:</label>
                <input type="text" id="last_name" name="last_name" >

                <label for="contact">Contact Number:</label>
                <input type="number" id="contact" name="contact" >				 		 
				 
                 <!-- Additional Fields for Admitted Out -->
                <div id="admitted_out_fields">
					  <!-- ... (your existing fields) ... -->
    <label for="sector">Sector:</label>
    <input type="text" id="sector" name="sector">

    <label for="village">Village:</label>
    <input type="text" id="village" name="village">
			
                <!-- Admittance Information -->
                <label for="last_period">Last_Menstrual_Period:</label>
                <input type="date" id="last_period" name="last_period" >
				
				
                <label for="expected_due_date">expected_due_dateDue Date:</label>
                <input type="date" id="expected_due_date" name="expected_due_date" >
           
            
            <label for="birth">Number_of_birth :</label>
            <input type="number" id="Number_of_birth" name="Number_of_birth" >

            <label for="select_blood_group">Select Blood Group:</label>
            <select id="select_blood_group" name="select_blood_group">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
			<br><br>
                <!-- Additional Information -->
                <label for="medical_history">Medical_historyHistory:</label>
                <textarea id="medical_history" name="medical_history" rows="4" ></textarea>
				 

    <label for="location_transferred">Location Transferred:</label>
    <input type="text" id="location_transferred" name="location_transferred">
				 

               

                </div>

                <!-- Submit Button -->	
				 <button type="submit" name="submit">Admit</button>

				
				
            </form>	
			<!-- Add this in your main form, maybe after the closing form tag -->
 

			
<?php
// Assuming the form is submitted via POST

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pregnant";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





if (isset($_POST['submit'])) {
    $firstName = $_POST['name'];
    $lastName = $_POST['last_name'];
    $contactNumber = $_POST['contact'];
     
    $lastMenstrualPeriod = $_POST['last_period'];
    $expectedDueDate = $_POST['expected_due_date'];
    $numberOfBirth = $_POST['Number_of_birth'];
    $bloodGroup = $_POST['select_blood_group'];
    $medicalHistory = $_POST['medical_history'];
	$sector = $_POST['sector'];
    $village = $_POST['village'];
    $locationTransferred = $_POST['location_transferred'];


    // SQL query to insert data into the table
	$sql = "INSERT INTO admitedout (FirstName, LastName, ContactNumber, LastMenstrualPeriod, ExpectedDueDate, NumberOfBirth, BloodGroup, MedicalHistory, Sector, Village, LocationTransferred)
        VALUES ('$firstName', '$lastName', '$contactNumber','$lastMenstrualPeriod', '$expectedDueDate', '$numberOfBirth', '$bloodGroup', '$medicalHistory', '$sector', '$village', '$locationTransferred')";

       $results = mysqli_query($conn, $sql);
    if (!$results) {
        die("Not inserted: " . mysqli_error($conn));
    }
    echo "Recorded";
}
 

// Handle display button click
if (isset($_POST['Display'])) {
    $sql = "SELECT * FROM admitedout";
    $result = $conn->query($sql);

    // Check if there are records
    if ($result->num_rows > 0) {
        echo "<h2>Records from the 'admitedout' table:</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Id</th>
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
                </tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['Id']}</td>
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
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No records found";
    }
}

$conn->close();
?>


	
	
	
 

   </section>
    </main>

    <footer>
        <p>&copy; 2023 Healthcare Management System</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>

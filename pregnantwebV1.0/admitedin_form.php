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
    <title>Admit Pregnant Woman</title>
    <link rel="stylesheet" href="admitedin_form.css">
</head>
<STYLE>

main {
    padding: 20px;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin: 10px 0 5px;
}

input,
select,
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
}

</STYLE>
<body>
    <header>
        <h1>Healthcare Management System</h1>
    </header>

    <nav>
        <ul>
                <li><a href="landing.php">HOME</a></li>
  <li>  <a   href="admitedin_display.php">ADMITTED IN</a> </li>
	 <li><a   href=" admitedout_display.php">TRANSFERED OUT</a>  </li>
   <li> <a href="about.php">ABOUT</a></li>
	
        </ul>
    </nav>

    <main>
        <section>
            <center><h2>Admit Pregnant Woman in our hospital</h2></center>
            <form action="" method="post">
                <!-- Common Fields -->
                <label for="name" name="name">First Name:</label>
                <input type="text" id="name" name="name">
                <label for="name">Last Name:</label>
                <input type="text" id="last_name" name="last_name">

                <label for="contact">Contact Number:</label>
                <input type="number" id="contact" name="contact">

                <!-- Additional Fields for Admitted Out -->
                <div id="admitted_out_fields">
                    <!-- ... (your existing fields) ... -->
                    <label for="sector">Sector:</label>
                    <input type="text" id="sector" name="sector">

                    <label for="village">Village:</label>
                    <input type="text" id="village" name="village">

                    <!-- Admittance Information -->
                    <label for="last_period">Last_Menstrual_Period:</label>
                    <input type="date" id="last_period" name="last_period">

                    <label for="expected_due_date">expected_due_dateDue Date:</label>
                    <input type="date" id="expected_due_date" name="expected_due_date">

                    <label for="birth">Number_of_birth :</label>
                    <input type="number" id="Number_of_birth" name="Number_of_birth">

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
                    <textarea id="medical_history" name="medical_history" rows="4"></textarea>
                   

                    <label for="location_transferred">Room transfered:</label>
                    <input type="text" id="Room" name="Room">
                </div>

                <!-- Submit Button -->
                <button type="submit" name="submit">Admit</button>
                <!-- Add this button within your existing <form> tag -->
                
            </form>

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

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $firstName = $_POST['name'];
                $lastName = $_POST['last_name'];
                $contactNumber = $_POST['contact'];
                $sector = $_POST['sector'];
                $village = $_POST['village'];
                $lastMenstrualPeriod = $_POST['last_period'];
                $expectedDueDate = $_POST['expected_due_date'];
                $numberOfBirth = $_POST['Number_of_birth'];
                $bloodGroup = $_POST['select_blood_group'];
                $medicalHistory = $_POST['medical_history'];
                 
                $room = $_POST['Room'];

                $sql = "INSERT INTO admitedin (FirstName, LastName, ContactNumber, Sector, Village, LastMenstrualPeriod, ExpectedDueDate, NumberOfBirth, BloodGroup, MedicalHistory,Room)
                        VALUES ('$firstName', '$lastName', '$contactNumber', '$sector', '$village', '$lastMenstrualPeriod', '$expectedDueDate', '$numberOfBirth', '$bloodGroup', '$medicalHistory','$room')";

                if ($conn->query($sql) === TRUE) {
                    echo "Record inserted successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            
// Handle display button click

 if (isset($_POST['display'])) {
                $sql = "SELECT * FROM admitedin";
                $result = $conn->query($sql);

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
                            </tr>";

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
                            </tr>";
                    }

                    echo "</table>";
                } else {
				echo "No records found";}
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
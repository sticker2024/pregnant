  <?php
session_start();

// Check if the user is not authenticated, redirect to the login page
if (!isset($_SESSION["user_id"])) {
    header("Location: loginn.php");
    exit();
}
?>
 <!-- admitedout.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Management System - Admitted Out</title>
    <link rel="stylesheet" href="admitedout.css">
</head>

<body>
    <header>
        <h1>Healthcare Management System</h1>
    </header>

    <nav>
        <ul>
            <!-- ... (your existing navigation links) ... -->
         <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Management System - Patient Form</title>
    <link rel="stylesheet" href="admited_form.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="landing.php">HOME</a></li>
            <li><a href="admitedin.php">ADMITTED IN</a></li>
            <li><a class="active" href="admitedout.php">ADMITTED OUT</a></li>
            <li><a href="total.php">TOTAL</a></li>
            <li><a href="child.php">CHILD BORN</a></li>
            <li><a  href="admitedout_form.php">REGIST</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <!-- Add other navigation links based on your requirements -->
        </ul>
    </nav>
 <body>
    <main>
	<button onclick="deactivateAllData()">Deactivate All Data</button>
        <section>
            <center><h2>Pregnant Patients Admitted Out</h2></center>
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
						 <th> </th>
						  <th> </th>
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
                                    <td>{$row['FirstName']}<td>{$row['LastName']}</td>
           
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
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='11'>No records found</td></tr>";
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

    <script src="script.js"></script>
</body>

</html>

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

    // Fetch patient information including the location transferred and medical history
    $sql = "SELECT * FROM admitedout WHERE id = $patient_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $patient_data = $result->fetch_assoc();
        $location_transferred = $patient_data['LocationTransferred'];
        $medical_history = $patient_data['MedicalHistory'];

        // Generate the dynamic certificate HTML content
        $certificate_content = "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Transfer Certificate</title>
                <style>
                    body {
                        font-family: 'Arial', sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        height: 100vh;
                    }

                    .certificate-container {
                        text-align: center;
                        border: 4px solid #333;
                        padding: 40px;
                        background-color: #f8f8f8;
                        width: 80%;
                        margin: 0 auto;
                        position: relative;
                    }

                    h1 {
                        color: #333;
                        margin-bottom: 20px;
                        font-style: italic;
                    }

                    hr {
                        margin: 20px 0;
                        border: 1px solid #333;
                    }

                    p {
                        font-size: 18px;
                        color: #333;
                        margin-bottom: 20px;
                    }

                    p.medical-history {
                        font-size: 18px;
                        color: #555;
                        margin-bottom: 20px;
                    }

                    p.location-transferred {
                        font-weight: bold;
                        font-size: 20px;
                        color: #555;
                        margin-bottom: 20px;
                    }

                    p.date {
                        font-size: 18px;
                        color: #555;
                        margin-bottom: 20px;
                    }

                    button {
                        padding: 15px 30px;
                        font-size: 18px;
                        cursor: pointer;
                        border: none;
                        border-radius: 5px;
                        margin: 10px;
                    }

                    button.back {
                        background-color: #007bff;
                       
                        
                        top: 20px;
                        left: 20px;
						
						  
						font-size: 16px;
						cursor: pointer;
						background-color: #704214; 
						color: #fff; border: none; 
						border-radius: 5px; 
						filter: sepia(1); 
						position: absolute; top: 20px; 
					 
						
						
                    }

                    button.print {
                        background-color: #28a745;
                        color: #fff;
                        position: absolute;
                        bottom: 0%;
                        left: 95%;
                        transform: translateX(-50%);
                    }

                    @media print {
                        /* Apply additional styles for print */
                        body {
                            background-color: #fff;
                        }

                        button, button.back {
                            display: none;
                        }
                    }
                </style>
            </head>
            <body>
                <div class='certificate-container'>
                    <button class='back' onclick='goBack()'>Back</button>

                    <h1>Certificate For Transfer</h1>
                    <hr>

                    <p>This is to certify that <b>{$patient_data['FirstName']} {$patient_data['LastName']}</b> is hereby transferred to <b>{$location_transferred}</b>.</p>

                    <p>We request that <b>{$location_transferred}</b> receives this patient and extends a warm welcome to her.</p>

                    <p>And we hope that she will be treated well.</p>

                    <!-- Include medical history in the certificate -->
                    <p class='medical-history'>Medical History: {$medical_history}</p>

                    <!-- Include location transferred below medical history -->
                    <p class='location-transferred'>Location Transferred: <b>{$location_transferred}</b></p>

                    <p class='date'>Date: " . date("Y-m-d") . "</p>

                    <!-- Print button -->
                    <button class='print' onclick='printCertificate()'>Print</button>
                </div>

                <script>
                    function goBack() {
                        window.history.back();
                    }

                    function printCertificate() {
                        window.print();
                    }
                </script>
            </body>
            </html>
        ";

        // Output the certificate content
        echo $certificate_content;
    } else {
        echo "Patient not found";
    }

    $conn->close();
}
?>
``

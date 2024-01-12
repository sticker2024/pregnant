 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pregnant"; // Replace 'your_database' with your actual database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $gender = $_POST["gender"];
    $degree = $_POST["degree"];
    $userType = $_POST["userType"]; // Added line to get userType from the form
    $password = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);

$userType = $_POST["userType"];

$sql = "INSERT INTO users (firstName, lastName, email, telephone, gender, degree, userType, password) 
        VALUES ('$firstName', '$lastName', '$email', '$telephone', '$gender', '$degree', '$userType', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Account created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("images/login.jpeg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top;
            margin-top: 20px;
        }

        .signup-container {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            color: floralwhite;
        }

        .signup-container h2 {
            text-transform: uppercase;
            font-size: 18px;
        }

        .signup-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 15px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #4caf50;
        }

        .form-group .gender-group {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .form-group .gender-group label {
            margin-right: 15px;
        }

        .form-group button {
            background-color: #4caf50;
            color: #fff;
            padding: 15px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <button><a href="loginn.php"><h1 style="color:black">Back_Login</h1></a></button>

    <div class="signup-container">
        <h2>You are welcome to Women Pregnancy Platform Sign Up</h2>
        <form class="signup-form" action="#" method="post">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required>
            </div>

            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="telephone">Telephone:</label>
                <input type="tel" id="telephone" name="telephone" placeholder="Enter your telephone number" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <div class="gender-group">
                    <label for="male"><input type="radio" id="male" name="gender" value="male" required> Male</label>
                    <label for="female"><input type="radio" id="female" name="gender" value="female" required> Female</label>
                </div>
            </div>

            <div class="form-group">
                <label for="degree">Degree:</label>
                <select id="degree" name="degree" required>
                    <option value="" disabled selected>Select Degree</option>
                    <option value="A1">A1</option>
                    <option value="A0">A0</option>
                    <option value="PhD">PhD</option>
                </select>
            </div>

            <div class="form-group">
                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword" placeholder="Enter a new password" required>
            </div>

            <div class="form-group">
                <label for="retypePassword">Re-type New Password:</label>
                <input type="password" id="retypePassword" name="retypePassword" placeholder="Re-type the new password" required>
            </div>

            <div class="form-group">
                <label for="userType">Sin up As:</label>
                <select class="v1" name="userType" required>
                    <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Sign Up</button>
            </div>
        </form>
    </div>

</body>

</html>

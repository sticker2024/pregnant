 <?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pregnant";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $telephone = mysqli_real_escape_string($conn, $_POST["telephone"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $userType = mysqli_real_escape_string($conn, $_POST["userType"]);
	

    $sql = "SELECT * FROM users WHERE telephone='$telephone' AND userType='$userType'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Password is correct, store user ID in the session
            $_SESSION["user_id"] = $row["id"]; // Assuming 'id' is the primary key in your 'users' table

            // Redirect to the home page
            header("Location: landing.php");
            exit();
        } else {
            $error_message = "Invalid password. Please try again.";
        }
    } else {
        $error_message = "Invalid username or user type. Please try again.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style type="text/css">
        body {
            background-image: url("images/login.jpeg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top;
            margin-top: 20px;
        }
        input.a1 {
            text-align: left;
            width: 300px;
            height: 50px;
            display: block;
            margin: 0 auto;
            border-radius: 30px;
            padding: 5px;
            font-family: arial, sans-serif;
            background-color: transparent;
            opacity: 0.5px;
            color: white;
        }
        select.v1 {
            text-align: left;
            width: 300px;
            height: 50px;
            display: block;
            margin: 0 auto;
            border-radius: 30px;
            padding: 5px;
            font-family: arial, sans-serif;
            background-color: transparent;
            opacity: 0.5px;
            color: black;
        }
        table.s1 {
            width: 400px;
            height: 300px;
            border-radius: 18px;
            background-color:rgba(0, 0, 0, 0.5);
        }
        p.d1 {
            text-align: center;
            color: blue;
        }
        input.f1 {
            width: 250px;
            height: 50px;
            display: block;
            margin: 0 auto;
            border-radius: 50px;
            padding: 5px;
        }
        button.n1 {
            background-color: green;
            text-align: center;
            width: 300px;
            height: 50px;
            display: block;
            margin: 0 auto;
            border-radius: 10px;
            padding: 5px;
            font-family: arial, sans-serif;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        input.h1 {
            background-color: navajowhite;
            text-align: center;
            width: 300px;
            height: 50px;
            display: block;
            margin: 0 auto;
            border-radius: 10px;
            padding: 5px;
            font-family: arial, sans-serif;
            cursor: pointer;
            transition: transform 0.3s ease;
            text-decoration: none;
        }
        .container {
            position: absolute;
            top: 0 auto;
            left: 320px;
            height: 120vh;
            padding: 120px;
        }
        .heading {
            text-align: center;
            position: absolute;
            top: 20px;
            left: 120px;
        }
        .heading h1 {
            font-size: 36px;
            color: floralwhite;
            font-weight: bold;
        }
		.footer {
            background-color: #333;
            color: #fff;
            padding: 5px;
            width: 100%;
            text-align: center;
            position: fixed; /* Fixed position at the bottom of the screen */
            bottom: 0;
        }

        .footer a {
            color: #fff;
            margin: 0 10px;
			margin-left 0;
            text-decoration: none;
        
    </style>
</head>

<body>

    <div class="heading">
        <h1>WELCOME TO WOMEN PREGNANT PLATFORM LOGIN</h1>
    </div>

    <div class="container">
	
        <form method="post" action="loginn.php">
		
            <table class="s1" border="12" width="100px" height="20px">
                <tr>
                  
                        <td><p><input class="a1" type="text" name="telephone" size="20px"
                            placeholder="Enter Telephone:..."></p>
                        <p><input class="a1" type="password" name="password" size="20px"
                            placeholder="Type Password..." width="10px" height="5px" class="line-input"></p>
                      <!--<p class="d1">  <h3>Login as:</h3>  </p>-->
						 <label for="userType"><h2>Sign up As:</h2></label>
                <select  class="v1" id="userType" name="userType" required>
            <option value="Admin">Admin</option>
            <option value="Manager">Manager</option>
            </select>

                        <p><input class="h1" type="submit" value="Log in" size="20px" width="10px" height="5px"
                            id="floatButton"></p>
                        <p class="d1"><a href="#singup"> <b>Forgot password? </b></a></p>
                        <hr>
                        <p><button class="n1"><a href="create.php"> Create new account </a></button></p>
                        <?php
                        if (isset($error_message)) {
                            echo '<p class="error-message">' . $error_message . '</p>';
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
	
   <!-- <script>
        const currentTime = new Date().getHours();
        let greeting;
        if (currentTime > 23 && currentTime < 12) {
            greeting = "Good afternoon! YOU'RE GOING TO LOGIN";
        } else if (currentTime < 17) {
            greeting = "Good morning! YOU'RE GOING TO LOGIN";
        } else {
            greeting = "Good evening! YOU'RE GOING TO LOGIN";
        }
        window.onload = function () {
            alert(greeting);
        };
    </script>-->
	
     <!-- Footer -->
    <div class="footer">
        <p>Healthcare management platform</p>
        <a href="https://www.whatsapp.com/" target="_blank">WhatsApp</a>
        <a href="https://www.facebook.com/" target="_blank">Facebook</a>
        <a href="https://mail.google.com/" target="_blank">Gmail</a>
        <!-- Add more social media links as needed -->
    </div>
</body>
</html>

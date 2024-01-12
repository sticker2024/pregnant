<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Web Page</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            display: flex;
            flex-direction: column; /* Adjust to column layout */
            align-items: center;
             background: url('images/imag.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .profile-picture {
            border-radius: 50%;
            overflow: hidden;
            margin-top: 20px;
        }

        .profile-picture img {
            width: 150px; /* Adjust the size of the profile picture */
            height: 150px; /* Adjust the size of the profile picture */
            object-fit: cover;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            border-radius: 20px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Shadow effect */
        }

        .center-container {
            text-align: center;
            flex: 1; /* Allow the content to take available vertical space */
            color: #fff;
        }

        .button-container {
            margin-top: 20px;
        }

        .button-container a {
            background-color: #300f;
            color: #fff;
            padding: 20px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 20px;
            display: inline-block;
        }

        .button-container a:hover {
            background-color:#0e5ef3; /* Darker shade for hover effect */
        }

        .p2 {
            text-align: center;
            margin-top: 10px;
            font-size: 30px;
            margin: 2px;
        }

        /* Footer styles */
        .footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            width: 100%;
            text-align: center;
            position: fixed; /* Fixed position at the bottom of the screen */
            bottom: 0;
        }

        .footer a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
</head>
<body>

    <!-- Circular Profile Picture -->
    <div class="profile-picture">
        <img src="images/log2.jpeg" alt="Profile Picture">
    </div>

    <div class="form-container">
        <form id="myForm">
            <h1 style="color: #333;">YOU'RE WELCOME TO OUR WEB SITE !!!!!!!!!!!!</h1>
            <div class="center-container">
                <div class="button-container">
                    <a href="loginn.php">Please Login</a>
                </div>
            </div>
        </form>
    </div>

    <div class="p2"><center><b><I>Women's Pregnancy Platform.</I></b></center></div>

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

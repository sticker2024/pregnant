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
    <title>About Women's Pregnancy Platform</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f8f8f8;
            color: #333;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            color: green;
        }

        nav {
            text-align: center;
            margin-bottom: 20px;
        }

        button {
            background-color: #0066cc;
            color: #fff;
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block; /* Ensures button text is visible */
        }

        button:hover {
            background-color: #0056b3;
        }

        section {
            margin-bottom: 40px;
        }

        h2 {
            color: #0066cc;
            border-bottom: 2px solid #0066cc;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        p {
            line-height: 1.6;
            color: #666;
        }

        a {
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            color: #777;
            margin-top: 50px;
        }
		 button.back {
                        background-color: #007bff;
                       
                        
                        top: 20px;
                        left: 20px;
						
						  
						font-size: 16px;
						cursor: pointer;
						background-color: #7FF214;  
						color: #ffEf; border: none; 
						border-radius: 5px; 
						filter: sepia(1); 
						position: absolute; top: 20px; 
					 
						
						
                    } 
					.button.back:hover{
					background-color: #c82333;
					}
					
					button.back1 {
                        background-color: #e07bff;
                       
                        
                        top: 20px;
                        left: 150px;
						
						  
						font-size: 16px;
						cursor: pointer;
						background-color: #7FeF200; 
						color: #fff; border: none; 
						border-radius: 5px; 
						filter: sepia(1); 
						position: absolute; top: 20px; 
					 
						
						
                    }
    </style>
</head>

<body>
    <nav>
        <button  class='back'><a href="landing.php">Home</a></button>
		
        <button class='back1'><a class="active" href="About.php">About</a></button>
        <!-- Add more navbar buttons as needed -->
    </nav>

    <header>
        <h1><I><B>About Women's Pregnancy Platform</I></B></h1>
    </header>

    <section>
        <h2>About the Web</h2>
        <p>
            This is a hospital management user interface for managing, monitoring, and controlling the system in a Hospital.
            This application is developed in java, which mainly focuses on basic operations in a hospital like adding new patient information,
            and updating new information, assigning the doctor for the patient. It features a familiar and well thought-out,
            an attractive online user interface, combined with strong searching Insertion and reporting capabilities.
        </p>
    </section>

    <section>
        <h2>Our Mission</h2>
        <p>
            Welcome to our Women's Pregnancy Platform! Our mission is to provide a supportive and informative
            environment for women during the beautiful journey of pregnancy. We understand the importance of
            reliable information, community support, and personalized resources, and we aim to empower women with
            the knowledge and tools they need for a healthy and joyful pregnancy experience.
        </p>
    </section>

    <section>
        <h2>What We Offer</h2>
        <p>
            - <strong>Expert Articles and Guides:</strong> Access a wealth of articles and guides written by
            healthcare professionals to help you navigate each stage of pregnancy.
            <br>
            - <strong>Community Support:</strong> Connect with other expecting mothers, share experiences, and find
            a supportive community to accompany you on this journey.
            <br>
            - <strong>Personalized Resources:</strong> Get personalized tips, reminders, and resources tailored to
            your specific needs and preferences.
        </p>
    </section>

    <section>
        <h2>Contact Us</h2>
        <p>
            Have questions or suggestions? Feel free to reach out to us at:</p>
        <p>Email:
            <a href="mailto:info@pregnancyplatform.com">info@pregnancyplatform.com</a>.
        </p>
        <p>Tel:<a href="mailto:info@pregnancyplatform.com"> +250 786 297 917</a></p>
    </section>

    <footer>
        <p>&copy; 2023 Women's Pregnancy Platform. All rights reserved.</p>
    </footer>

</body>

</html>

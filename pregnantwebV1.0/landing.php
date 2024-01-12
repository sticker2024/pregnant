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
    <title>Healthcare Management System</title>
    <link rel="stylesheet" type="text/css" href="landing1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<Style>/* Style The Dropdown Button */
.dropbtn {
 background-color: #4CAF50;
 color: white;
 padding: 16px;
 font-size: 16px;
 border: none;
 cursor: pointer;
}
/* The container <div> - needed to position the dropdown content */
.dropdown {
 position: relative;
 display: inline-block;
}
/* Dropdown Content (Hidden by Default) */
.dropdown-content {
 display: none;
 position: absolute;
 background-color: #f9f9f9;
 min-width: 160px;
 box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
 z-index: 1;
}
/* Links inside the dropdown */
.dropdown-content a {
 color: black;
 padding: 12px 16px;
 text-decoration: none;
 display: block;}
/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}
/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
 display: block;}

.dropdown:hover .dropbtn {
 background-color: #3e8e41; }
 
  .p12 {
    
    background-color:green;
    color: #f757;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    float: right; /* Align the button to the right */
}
 

.p12:hover .dropbtn {
 background-color: #3e8e41; }
    

 
</Style></head>

<body>

    <header>
        <h1>Welcome to Healthcare Management System</h1>
    </header>

     <nav class="topnav">
    <a class="active" href="landing.php">HOME</a>
    <a   href="admitedin_display.php">ADMITTED IN</a> 
	 <li><a   href=" admitedout_display.php">TRANSFERED OUT</a>  
    <a href="about.php">ABOUT</a>
	
    <?php
    if (isset($_SESSION["user_id"])) {
        echo '<a class="acc" href="logout.php">LOGOUT</a>';
    } else {
        echo '<a class="acc" href="loginn.php">MANAGE ACCOUNT</a>';
    }
    ?>
</nav>


     
	<div class="p12"> 
 <button> <p class="p12" ><a href="admitedin_form.php">ADMIT-PATIENT</a></p>  </button>
 
</div> 


 
 
<center>
    <main>
	
        <div class="java">
            <h1 id="demo"></h1>
        </div>
		

        <script>
            const hour = new Date().getHours();
            let greeting;
            let textColor;

            if (hour >= 1 && hour < 12) {
                greeting = "Good morning, welcome to our website!";
                textColor = "green";
            } else if (hour >= 12 && hour < 18) {
                greeting = "Good afternoon, welcome to our website!";
                textColor = "orange";
            } else {
                greeting = "Good evening, welcome to our website!";
                textColor = "blue";
            }

            document.getElementById("demo").innerHTML = greeting;
            document.getElementById("demo").style.color = textColor;

            setTimeout(() => {
                var text = document.getElementById('demo');
                text.style.display = 'none';
            }, 5000);
        </script>

       </center>
	   
        <p class="p"><b>HEALTHCARE MANAGEMENT SYSTEM PLATFORM</b></p>
        <center><p style="color: blue;" ><b>PREGNANT WOMEN PLATFORM<b></p></center>
		
	
		
		
		
		
		
		

        <div class="search1">
            <div class="input">
                <input type="text" class="label" placeholder="Search">
                <a href="landing.php"><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
        </div>
        <center><p><sub><i>digital Hospital Management System</i></sub></p></center>
		 <div class="media-container">
            <div class="media-section">
                <img  src="Images\A.jpeg" height="300" width="400"  ></Image>
				   
                <p style="background-color:orange"><marquee> Rwanda Woman royalty-free images - Shutterstock</marquee></p>
                <img src="images\2.jpg" height="210" width="200" alt="Image Description">

             <img src="images\2.jpg" height="210" width="200" alt="Image Description">
			  <p style="background-color:Gray;"><marquee> stages women pass through to produce a baby at least 9 months </marquee></p>
            </div>
            <div class="media-section">
                <img src=" images\C.jpeg" height="300" width="200" ></Image>
				<img src=" images\B.jpeg" height="300" width="200" ></Image>
                <p style="background-color:black"><a href="your_youtube_link"><marquee>https://www.afro.who.int/countries/rwanda/news/no-woman-should-die-giving-life-rwanda-maintains-focus-maternal-and-child-health...</marquee></a></p>
                <img src="Images\D.jpeg" height="250" width="400"></Image>
                <p style="background-color:Gray;"><marquee>pregnant, your body is experiencing major change</marquee></p>
            </div>
            <div class="media-section">
                <p>If you are pregnant, your body is experiencing major change. From symptoms that you might expect, to ones that are completely out of the blue, every woman will have a different pregnancy experience.

It’s helpful to have an idea of how your body may react to the SSdifferent stages of pregnancy. It also helps to know how pregnancy may affect your emotions and feelings<img src=" Images\1.jpeg" height="295" width="400" alt="Image Description">
            </div>
        </div>

        <!-- Additional Content -->
        <p style="background-color:SlateBlue;"><center><b><h1>What Is Health Systems Management?</h1></b></center></p><br>
        <p><br>The healthcare industry is complex and relies on the coordination of a multitude of moving parts for it to function.
            From the programs and systems that keep information organized, to the nurses and physicians providing care,
            to the administrators and health systems managers coordinating the delivery of care, medical facilities require
            the integrated work of a variety of passionate professionals to succeed.</p></br>

        <br>Professionals in health systems management work at hospitals, government agencies, clinics, and other care settings</br>

        

    </main>

    <footer>
        <p>&copy; 2023 Healthcare Management System</p>
    </footer>

</body>

</html>

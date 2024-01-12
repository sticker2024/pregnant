<?php
session_start();
session_destroy(); // Destroy all sessions

// Redirect to the login page
header("Location: index.php");
exit();
?>

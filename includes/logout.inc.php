<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
// Theres a bug, when you log, out from different places in the dir, the redirect to login.php breaks
// Tried to use SITE_URL to fix 
$site_url = SITE_URL;
header("Location:  ../login.php");
exit();
?>
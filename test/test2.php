<?php
// start a session
session_start();
 
// access session variables
echo $_SESSION['logged_in_user_id'];
echo $_SESSION['logged_in_user_name'];
?>
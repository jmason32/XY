<?php 
header("Access-Control-Allow-Origin: *");

$mysqli = @mysqli_connect("127.0.0.1", "jay", "Tester1!", "war");

if (!$mysqli) {

    echo "Error: Unable to connect to MySQL.";

    echo "<br>".mysqli_connect_errno();

    echo "Debugging errno: ";

    echo "<br>";

    echo "Debugging error: ";

    echo "<br>";

    exit;

}

?>
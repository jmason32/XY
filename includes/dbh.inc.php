<?php 
session_start();
$mysqli = new mysqli('127.0.0.1', 'root', '', 'dmv');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}
$_SESSION["sql"] = $mysqli;

?>
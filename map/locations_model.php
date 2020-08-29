<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require("../includes/dbh.inc.php");

// Gets data from URL parameters.
if(isset($_GET['add_location'])) {
    add_location();
}
if(isset($_GET['confirm_location'])) {
    confirm_location();
}



function add_location(){
    $mysqli=mysqli_connect ("127.0.0.1", "jay", "Tester1!", "dmv");
    if (!$mysqli) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $description =$_GET['description'];
    // Inserts new row with place data.
    $query = sprintf("INSERT INTO locations " .
        " (id, lat, lng, description) " .
        " VALUES (NULL, '%s', '%s', '%s');",
        mysqli_real_escape_string($mysqli,$lat),
        mysqli_real_escape_string($mysqli,$lng),
        mysqli_real_escape_string($mysqli,$description));

    $result = mysqli_query($mysqli,$query);
    echo"Inserted Successfully";
    if (!$result) {
        die('Invalid query: ' . mysqli_error($mysqli));
    }
}
function confirm_location(){
    $mysqli=mysqli_connect ("127.0.0.1", "jay", "Tester1!", "dmv");
    if (!$mysqli) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $id =$_GET['id'];
    $mysqlifirmed =$_GET['confirmed'];
    // update location with confirm if admin confirm.
    $query = "update locations set location_status = $mysqlifirmed WHERE id = $id ";
    $result = mysqli_query($mysqli,$query);
    echo "Inserted Successfully";
    if (!$result) {
        die('Invalid query: ' . mysqli_error($mysqli));
    }
}
function get_confirmed_locations(){
    $mysqli=mysqli_connect ("127.0.0.1", "jay", "Tester1!", "dmv");
    if (!$mysqli) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($mysqli,"
select id ,lat,lng,description,location_status as isconfirmed
from locations WHERE  location_status = 1
  ");

    $rows = array();

    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }

    $indexed = array_map('array_values', $rows);
    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}
function get_all_locations(){
    $mysqli=mysqli_connect ("127.0.0.1", "jay", "Tester1!", "dmv");
    if (!$mysqli) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($mysqli,"
select id ,lat,lng,description,location_status as isconfirmed
from locations
  ");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
  $indexed = array_map('array_values', $rows);
  //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}
function array_flatten($array) {
    if (!is_array($array)) {
        return FALSE;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, array_flatten($value));
        }
        else {
            $result[$key] = $value;
        }
    }
    return $result;
}

?>
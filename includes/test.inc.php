<?php 
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    require 'dbh.inc.php';


// $sql = "INSERT INTO business (idusers) VALUES (1)"; //use the ? as a placeholder 
$sql = "SELECT idbusiness, business_name FROM business WHERE idusers=1";
$stmt = mysqli_stmt_init($mysqli);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../business/add.php?error=sqlerror1");
    exit();
}
else {
    //mysqli_stmt_bind_param($stmt, 'i', $u);
    
    if (mysqli_stmt_execute($stmt)){
        mysqli_stmt_bind_result($stmt, $business_id, $business_name); // Must do this
        while (mysqli_stmt_fetch($stmt)) {
            echo ($business_name);
            //echo "<option value='".($id_cat)."'>".($name_cat)."</option>";
        }
    }
    else {
        echo 'naw';
    }

}

?>
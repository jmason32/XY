<?php 

    require 'dbh.inc.php';


$sql = "INSERT INTO business (idusers) VALUES (1)"; //use the ? as a placeholder 
$stmt = mysqli_stmt_init($mysqli);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../business/add.php?error=sqlerror1");
    exit();
}
else {
   // mysqli_stmt_bind_param($stmt, 'i', $u);
    
    if (mysqli_stmt_execute($stmt)){
        echo 'lit';
    }
    else {
        echo 'naw';
    }

}

?>
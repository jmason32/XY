<?php
// start a session
require '../includes/dbh.inc.php';
 
                        
$sql = "SELECT idbusiness_category, business_category_name FROM business_category";
$stmt = mysqli_stmt_init($mysqli);

if (!mysqli_stmt_prepare($stmt, $sql)) 
{
    header("Location: ../add.php?error=nocategories");
    exit();
}
else 
{
    echo "yup";
    if (mysqli_stmt_execute($stmt)) {
        echo 'y2';
        mysqli_stmt_bind_result($stmt, $id, $name); // Must do this
        while ($row_users = mysqli_stmt_fetch($stmt)) {
            echo $name;
            //output a row here
            // echo "<option value='".($row_users['idbusiness_category'])."'>".($row_users['buesiness_category_name'])."</option>";
            echo $row_users['idbusiness_category'];
        }
    }

}
                        
?>
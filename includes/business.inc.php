<?php
    session_start();
    require 'dbh.inc.php';
    // Could put the code for all business related calls 
    // Add Business
    if (isset($_POST['new_business_submit'])){
        /* TODO
            - add business_email, with vaildiation (from signup.php) 
            - get the option value from the category selection for the database*/

        $business_name = $_POST['business_name'];
        $business_address = $_POST['business_address'];
        $business_desc = $_POST['business_description'];
        $business_cat = $_POST['business_category'];
        $business_email = $_POST['business_email'];

        // Error Handling : empty fields
        if (empty($business_name) || empty($business_address) || empty($business_desc)) 
        {
            header("Location: ../add.php?error=emptyfields&business_name=".($business_name)."&business_address=".($business_address)."&business_description=".($business_desc)."&business_category=".($business_cat));
            exit();
        }
        else {

            $sql = "INSERT INTO business (idusers, business_name, business_address, business_email, business_description) VALUES (?, ?, ?, ?, ?)"; //use the ? as a placeholder 
            $stmt = mysqli_stmt_init($mysqli);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../business/add.php?error=sqlerror1");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, 'issss', $_SESSION['id'], $business_name, $business_address, $business_email, $business_desc);
                
                if (mysqli_stmt_execute($stmt)){
                    header("Location: ../index.php?error=success_business"); 
                    exit();
                }
                else {
                    header("Location: ../business/add.php?error=sqlerror2");
                    exit();
                }   

            }
        }
         
        mysqli_stmt_close($stmt);
        mysqli_close($mysqli);
    }
        else if (isset($_POST['edit_business'])){
        if(!$_SESSION['businessID']){
            header("Location: ../business/add.php?error=nobusinessID");
            exit();
        }
    }



?>
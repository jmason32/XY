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
        // $business_photo =
        // $business_photo_text = 
        
        

        
        // // Get text
        // $image_text = mysqli_real_escape_string($db, $_POST['business_text']);

        // // image file directory
        // // save the image in 
        

        
        // // execute query
        // mysqli_query($db, $sql);

            
        // }
        // $result = mysqli_query($db, "SELECT * FROM images");




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
                    // In the database, add a column that will state the status of the bussiness, pending, approved, denied, etc 
                    // TODO: Add status, but for now create a dir for the business on server 
                    

                    //TODO : Create a table to hold image infomation 
                    // image_path
                    // image_text
                    // business_id 
                    // date_uploaded 
                    // Status on Approval 
                    //$sql = "INSERT INTO images (image_path, image_text) VALUES ('$image_path', '$image_text')";
                    // $structure = 'http://'.$_SERVER['HTTP_HOST'].'/php/DMV/bus_img';
                    // if (!mkdir($structure, 0, true)) {
                    //     die('Failed to create folders...');
                    // }

                    // mkdir(SITE_URL."/".$business_name."/photos", 0700);
                    // $image = $_FILES['']
                    $image = $_FILES['business_photo']['name'];
                    $target =  'http://'.$_SERVER['HTTP_HOST'].'/php/DMV/bus_img/'.basename($image);
                    if (move_uploaded_file($_FILES['business_photo']['tmp_name'], '')) {
                        die('yurp.');
                    }else{
                        var_dump($_FILES['business_photo']);
                        die('Failed to upload...');
                    }

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

    else if (isset($_POST['edit_business_submit'])){
        
        // if(!$_POST['business_id']){
        //     header("Location: ../business/add.php?error=nobusinessID");
        //     exit();
        // }
        
        $business_id = $_POST['business_id'];
        $business_name = $_POST['business_name'];
        $business_address = $_POST['business_address'];
        $business_desc = $_POST['business_description'];
        $business_cat = $_POST['business_category'];
        $business_email = $_POST['business_email'];

        if (empty($business_name) || empty($business_address) || empty($business_desc)) 
        {
            header("Location: ../add.php?error=emptyfields&business_name=".($business_name)."&business_address=".($business_address)."&business_description=".($business_desc)."&business_category=".($business_cat));
            exit();
        }
        else {
            $sql = "UPDATE business SET business_name=?, business_email=?, business_address=?, business_description=?, business_category=? WHERE idbusiness=?";
            $stmt = mysqli_stmt_init($mysqli);
            
            if (!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../business/add.php?error=sqlerror1");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, 'ssssii', $business_name, $business_email, $business_address, $business_desc, $business_cat, $business_id);
                
                if (mysqli_stmt_execute($stmt)){ 
                    header("Location: ../business/view.php?error=updateSucces&business_id=.$business_id.");
                    exit();
                    // echo 'okay g';
                }
                else {
                    // echo 'naw son';
                    header("Location: ../business/view.php?error=updateFailed&business_id=.$business_id.");
                    exit();
                }
            }
        }
    }



?>
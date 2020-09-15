<?php 
    session_start();
    require '../header.php';
    require '../includes/dbh.inc.php';
    if (!$_SESSION['id']) {
        header("Location: signup.php");
        exit();
    }

    
        // Grab business info 
        $sql = "SELECT idbusiness, idusers, business_name, business_email, business_address, business_description, business_category, photo FROM business WHERE idbusiness=?";
        $stmt = mysqli_stmt_init($mysqli);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) // Prepare 
        {
            header("Location: ../index.php?error=sqlerror1");
            exit();
        }
        else 
        {
            
            mysqli_stmt_bind_param($stmt, 'i', $_GET['id_business']);
            if (mysqli_stmt_execute($stmt))
            {
                
                // Store Result
                mysqli_stmt_store_result($stmt);
                // Get 1 Business
                if (mysqli_stmt_num_rows($stmt) == 1)
                {
                    
                    $business = array();
                    mysqli_stmt_bind_result($stmt, $id_business, $id_users_business, $name_business, $email_business, $address_business, $desc_business, $category_business, $photo_business);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        $business = array('id'=>$id_business, 'owner'=>$id_users_business, 'name'=>$name_business, 'address'=>$address_business, 'email'=>$email_business, 'description'=>$desc_business, 'category'=>$category_business, 'photo'=>$photo_business);  
                    }
                    
                }
                // No valid business
                else 
                {
                    header("Location: ../index.php?error=sqlerrror2");
                    exit();
                }
            }
            else 
            {
                header("Location: ../index.php?error=wrongsome");
                exit();
            }
            mysqli_stmt_close($stmt);
        }
    
    
?>
<!-- This is the edit page
TODO:
    - Replace the fields with the selected businesses information
    - Allow for submission of new info while checking inputs
    - Delete button 
 --> 

<main>

    <div id="page-transitions" class="page-build light-skin highlight-blue">
        <div class="decoration"></div>
        <?php require '../header2.php';?>
        <div class="decoration"></div>
        <div class="page-content">
            <div class="content-title bottom-30 top-30">
                <span class="color-highlight">Lets get started!</span>
                <h1>Bussiness Inquiry</h1>
                <p>
                    Tell us a little about your business
                </p>
            </div>
            <div class="decoration decoration-margins top-30"></div>
            <div class="content">
                
                <form action='../includes/business.inc.php' method='POST'>
                    <div class="input-simple-1 has-icon input-green bottom-30"><strong>Required Field</strong><em class="color-highlight">Business ID #</em><i class="fa fa-user"></i><input disabled name='business_id' value="<?php echo $business['id'];?>" type="text"></div>
                    <div class="input-simple-1 has-icon input-green bottom-30"><strong>Required Field</strong><em class="color-highlight">Business Name</em><i class="fa fa-user"></i><input name='business_name' value="<?php echo $business['name'];?>" type="text"></div>
                    <div class="input-simple-1 has-icon input-blue bottom-30"><strong>Required Field</strong><em class="color-highlight">Address</em><i class="fa fa-envelope"></i><input name='business_address' value = '<?php echo $business['address'];?>' type="text"></div>	
                    <div class="input-simple-1 has-icon input-blue bottom-30"><strong>Required Field</strong><em class="color-highlight">Email</em><i class="fa fa-envelope"></i><input name='business_email' value = '<?php echo $business['email'];?>' type="text"></div>				
                    <!-- Create a table in the database to populate the selection choices (business_category) -->
                    
                    
                    <div class="input-simple-1 textarea has-icon bottom-30"><strong>Required Field</strong><i class="fa fa-edit"></i><em class="color-highlight">Description</em> 
                        <textarea name='business_description' class="textarea-simple-1">
                            <?php 
                                if($business['description'] == null) {
                                    echo "Expanding Text Area";
                                }
                                else {
                                    echo $business['description'];
                                }
                            ?>
                        </textarea>
                    </div>
                    <button type='submit' name='edit_business_submit' class="button bg-highlight button-full button-rounded button-s uppercase ultrabold shadow-medium">Submit</button>
                </form>
                <div class="clear"></div>
            </div>

        </div>

    </div>


</main>

<?php
    require 'footer.php';
?>
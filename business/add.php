<?php 
    session_start();
    require '../header.php';
    require '../includes/dbh.inc.php';
    if (!$_SESSION['id']) {
        header("Location: signup.php");
        exit();
    }
    
?>

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
                
                <form action='../includes/business.inc.php' method='POST' enctype="multipart/form-data">
                    <div class="input-simple-1 has-icon input-green bottom-30"><strong>Required Field</strong><em class="color-highlight">Business Name</em><i class="fa fa-user"></i><input name='business_name' type="text" placeholder="Jonh Doe"></div>
                    <div class="input-simple-1 has-icon input-blue bottom-30"><strong>Required Field</strong><em class="color-highlight">Address</em><i class="fa fa-envelope"></i><input name='business_address' type="text" placeholder="mail@domain.com"></div>				
                    <!-- Create a table in the database to populate the selection choices (business_category) -->
                    <div class="select-box select-box-1">
                        <strong>Required Field</strong>
                        <em class="color-highlight">Select an Option</em>
                        <select name='business_category'>   
                            <!-- If user chooses other, give the option to input the Catergory  -->
                            <?php
                                $sql = "SELECT idbusiness_category, business_category_name FROM business_category";
                                $stmt = mysqli_stmt_init($mysqli);

                                if (!mysqli_stmt_prepare($stmt, $sql)) 
                                {
                                    header("Location: ../add.php?error=nocategories");
                                    exit();
                                }
                                else 
                                {  
                                    if (mysqli_stmt_execute($stmt)) {

                                        mysqli_stmt_bind_result($stmt, $id_cat, $name_cat); // Must do this
                                        while (mysqli_stmt_fetch($stmt)) {
                                            echo "<option value='".($id_cat)."'>".($name_cat)."</option>";
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    
                    <div class="input-simple-1 textarea has-icon bottom-30"><strong>Required Field</strong><i class="fa fa-edit"></i><em class="color-highlight">Description</em> <textarea name='business_description' class="textarea-simple-1" placeholder="Expanding Text Area"></textarea></div>
                    
                    <div class="row">
                        <!-- <div class="col-md-6">
                            <div id="my_camera"></div>
                            <script language="JavaScript">
                                Webcam.set({
                                    width: 490,
                                    height: 390,
                                    image_format: 'jpeg',
                                    jpeg_quality: 90
                                });
                            
                                Webcam.attach( '#my_camera' );
                            
                                function take_snapshot() {
                                    Webcam.snap( function(data_uri) {
                                        $(".image-tag").val(data_uri);
                                        document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
                                    } );
                                }
                            </script>
                            <br/>
                            <input type=button value="Take Snapshot" onClick="take_snapshot()">
                            <input type="hidden" name="image" class="image-tag">
                        </div>
                        <div class="col-md-6">
                            <div id="results">Your captured image will appear here...</div>
                        </div> -->
                        <!-- TODO : Add option to upload multiple photos -->
                        <div class="input-simple-1 has-icon input-green bottom-30">
                            <strong>Required Field</strong>
                            <em class="color-highlight">Business Photos</em>
                            <i class="fa fa-user"></i>
                            <input name='business_photo' type = 'file'>
                        </div>
                    </div>
                    
                    <button type='submit' name='new_business_submit' class="button bg-highlight button-full button-rounded button-s uppercase ultrabold shadow-medium">Submit</button>
                </form>
                <div class="clear"></div>
            </div>

        </div>

    </div>

    <script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
    </script>


</main>


<?php
    require 'footer.php';
?>
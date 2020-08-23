<?php 
    session_start();
    require '../header.php';
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
                <!-- <div class="select-box select-box-1">
                    <strong>Required Field</strong>
                    <em class="color-highlight">Select an Option</em>
                    <select>
                        <option value="volvo">Mobile Operating System</option>
                        <option value="saab">iOS</option>
                        <option value="mercedes">Android</option>
                        <option value="audi">Windows Mobile</option>
                    </select>
                </div> -->

                <div class="input-simple-1 has-icon input-green bottom-30"><strong>Required Field</strong><em class="color-highlight">Buesiness Name</em><i class="fa fa-user"></i><input type="text" placeholder="Jonh Doe"></div>
                <div class="input-simple-1 has-icon input-blue bottom-30"><strong>Required Field</strong><em class="color-highlight">Email</em><i class="fa fa-envelope"></i><input type="text" placeholder="mail@domain.com"></div>				
                <div class="input-simple-1 has-icon input-red bottom-30"><strong>Required Field</strong><em class="color-highlight">Password</em><i class="fa fa-lock"></i><input type="password" placeholder="Enter your password"></div>
                <div class="input-simple-1 textarea has-icon bottom-30"><strong>Required Field</strong><i class="fa fa-edit"></i><em class="color-highlight">Description</em> <textarea class="textarea-simple-1" placeholder="Expanding Text Area"></textarea></div>
                <div class="clear"></div>
            </div>

        </div>

    </div>


</main>

<?php
    require 'footer.php';
?>
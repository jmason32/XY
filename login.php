<?php 
    require 'header.php';
    header("Access-Control-Allow-Origin: *");
?>
<main>
    <div id="page-transitions" class="page-build light-skin highlight-blue">    
        <div class="page-content page-content-full">

            <a href="#" class="cover-back-button back-button"><i class="fa fa-chevron-left font-12 color-white"></i></a>
            <a href="index.html" class="cover-home-button"><i class="fa fa-home font-14 color-white"></i></a>

            <div class="cover-item cover-item-full" style="background-image:url(images/pictures_vertical/bg10.jpg);">
                <div class="cover-content cover-content-center">

                <div class="page-login content-boxed content-boxed-padding top-0 bottom-0 bg-white">
                    <img class="preload-image login-bg responsive-image bottom-0 shadow-small" src="images/pictures/10w.jpg" data-src="images/pictures/9w.jpg" alt="img">
                    <img class="preload-image login-image shadow-small" src="images/empty.png" data-src="images/pictures/0t.jpg" alt="img">
                    <h1 class="color-black ultrabold top-25 bottom-5 font-30">Login</h1>
                    <p class="smaller-text bottom-10">Hello, stranger! Please enter your credentials below.</p>
                    <form action="includes/login.inc.php" method='POST'>
                        <div class="page-login-field top-15">
                            <i class="fa fa-user"></i>
                            <input name='username' type="text" placeholder="Username">
                            <em>(required)</em>
                        </div>
                        <div class="page-login-field bottom-15">
                            <i class="fa fa-lock"></i>
                            <input name='password' type="password" placeholder="Password">
                            <em>(required)</em>
                        </div>
                        <div class="page-login-links bottom-20">
                            <a class="forgot float-right" href="signup.php"><i class="fa fa-user float-right"></i>Create Account</a>
                            <a class="create float-left" href="page-forgot.html"><i class="fa fa-eye"></i>Forgot Password</a>
                            <div class="clear"></div>
                        </div>
                        <button type='submit' name='login-submit' class="button bg-highlight button-full button-rounded button-s uppercase ultrabold shadow-medium">LOGIN</button>
                    </form>
                    <a  class="button bg-highlight button-full button-s uppercase ultrabold shadow-medium" href='index.php'> Go to next Page </a>
                </div>

                </div>
                <div class="cover-overlay overlay bg-black opacity-80"></div>
            </div>


        </div>
    </div>    
</main>

<?php 
    require "footer.php";
?>




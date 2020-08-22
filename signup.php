<?php 
require 'header.php';
?>
<main>

    <div id="page-transitions" class="page-build light-skin highlight-blue">    
        <div id="menu-hider"></div>
        
        <div id="menu-list" data-selected="menu-pages" data-load="menu-list.html" data-height="415" class="menu-box menu-load menu-bottom"></div>    
        <div id="menu-demo" data-load="menu-demo.html" data-height="210" class="menu-box menu-load menu-bottom"></div>
        <div id="menu-find" data-load="menu-find.html" data-height="420" class="menu-box menu-load menu-bottom"></div>

        <div class="header header-scroll-effect">
            <div class="header-line-1 header-hidden header-logo-app">
                <a href="#" class="back-button header-logo-title">Back to Pages</a>
                <a href="#" class="back-button header-icon header-icon-1"><i class="fa fa-angle-left"></i></a>
                <a href="#" data-menu="menu-find" class="header-icon header-icon-3"><i class="fa fa-search"></i></a>
                <a href="#" data-menu="menu-list" class="header-icon header-icon-4"><i class="fa fa-bars"></i></a>
                <a href="#" data-menu="menu-demo" class="header-icon header-icon-2"><i class="fa fa-cog"></i></a>
            </div>
            <div class="header-line-2 header-scroll-effect">
                <a href="#" class="header-pretitle header-date color-highlight"><!--Date will Appear Here --></a>
                <a href="#" class="header-title">Register</a>
                <a href="#" data-menu="menu-list" class="header-icon header-icon-1"><i class="fa fa-bars"></i></a>
                <a href="#" data-menu="menu-find" class="header-icon header-icon-2"><i class="fa fa-search"></i></a>
                <a href="#" data-menu="menu-demo" class="header-icon header-icon-3"><i class="fa fa-cog"></i></a>
            </div>  
        </div>
        
        
        <div class="page-content header-clear-large">
        
            <form action="includes/signup.inc.php" method='POST'>
                <div class="page-login page-login-full bottom-20">
                    <img class="preload-image login-bg responsive-image bottom-30 shadow-medium" src="images/empty.png" data-src="images/pictures/10w.jpg" alt="img">
                    <div class="page-login-field top-15">
                        <i class="fa fa-user color-highlight"></i>
                        <input name='username' type="text" placeholder="Select a Username">
                        <em>(required)</em>
                    </div>
                    <div class="page-login-field">
                        <i class="fa fa-at color-highlight"></i>
                        <input name = 'email' type="text" placeholder="Your your Email">
                        <em>(required)</em>
                    </div>
                    <div class="page-login-field">
                        <i class="fa fa-lock color-highlight"></i>
                        <input name='password' type="password" placeholder="Enter a Password">
                        <em>(required)</em>
                    </div>
                    <div class="page-login-field bottom-30">
                        <i class="fa fa-lock color-highlight"></i>
                        <input name='passwordR' type="password" placeholder="Confirm Password">
                        <em>(required)</em>
                    </div>
                    <div class="page-login-links bottom-10">
                        <a class="forgot center-text" href="login.php"><i class="fa fa-user float-right"></i>Alread registered? Sign in here</a>
                        <div class="clear"></div>
                    </div>
                    <button type='submit' name='signup-submit' class="button button-green button-full button-rounded button-sm uppercase ultrabold shadow-small ">Register Account</button>
                </div>
            </form>

            
            <div class="page-login page-login-full bottom-50">
                <div class="decoration"></div>
                <a href="#" class="button button-social bottom-15 button-full button-sm button-rounded button-icon shadow-small bg-facebook"><i class="fab fa-facebook-f"></i> Connect with Facebook</a>
                <a href="#" class="button button-social bottom-15 button-full button-sm button-rounded button-icon shadow-small bg-twitter"><i class="fab fa-twitter"></i> Connect with Twitter</a>
                <a href="#" class="button button-social bottom-15 button-full button-sm button-rounded button-icon shadow-small bg-google"><i class="fab fa-google-plus-g"></i> Connect with Google Plus</a>
            </div>
            
            <div class="footer">
                <a href="#" class="footer-logo"></a>
                <p class="footer-text">There's nothing that comes close to Apptastic<br> It's the best Mobile Template on Envato</p>
                <div class="footer-socials">
                    <a href="#" class="scale-hover icon icon-round no-border icon-xs bg-facebook border-teal-3d"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="scale-hover icon icon-round no-border icon-xs bg-twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="scale-hover icon icon-round no-border icon-xs bg-google"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="scale-hover icon icon-round no-border icon-xs bg-phone"><i class="fa fa-phone"></i></a>
                    <a href="#" data-menu="menu-share" class="scale-hover icon icon-round no-border icon-xs bg-teal-dark"><i class="fa fa-retweet font-15"></i></a>
                    <a href="#" class="scale-hover icon icon-round no-border icon-xs back-to-top bg-blue-dark"><i class="fa fa-angle-up font-16"></i></a>
                </div>
                <p class="footer-copyright">Copyright &copy; Enabled <span id="copyright-year">2017</span>. All Rights Reserved.</p>
            </div>
        </div>
        
        <a href="#" class="back-to-top-badge back-to-top-small bg-highlight"><i class="fa fa-angle-up"></i>Back to Top</a>
        <div id="menu-share" data-height="420" class="menu-box menu-bottom">
            <div class="menu-title">
                <span class="color-highlight">Just tap to share</span>
                <h1>Sharing is Caring</h1>
                <a href="#" class="menu-hide"><i class="fa fa-times"></i></a>
            </div>
            <div class="sheet-share-list">
                <a href="#" class="shareToFacebook"><i class="fab fa-facebook-f bg-facebook"></i><span>Facebook</span><i class="fa fa-angle-right"></i></a>
                <a href="#" class="shareToTwitter"><i class="fab fa-twitter bg-twitter"></i><span>Twitter</span><i class="fa fa-angle-right"></i></a>
                <a href="#" class="shareToLinkedIn"><i class="fab fa-linkedin-in bg-linkedin"></i><span>LinkedIn</span><i class="fa fa-angle-right"></i></a>
                <a href="#" class="shareToGooglePlus"><i class="fab fa-google-plus-g bg-google"></i><span>Google +</span><i class="fa fa-angle-right"></i></a>
                <a href="#" class="shareToPinterest"><i class="fab fa-pinterest-p bg-pinterest"></i><span>Pinterest</span><i class="fa fa-angle-right"></i></a>
                <a href="#" class="shareToWhatsApp"><i class="fab fa-whatsapp bg-whatsapp"></i><span>WhatsApp</span><i class="fa fa-angle-right"></i></a>
                <a href="#" class="shareToMail no-border bottom-5"><i class="fas fa-envelope bg-mail"></i><span>Email</span><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div> 
         
</main>

<?php
    require 'footer.php';
?>
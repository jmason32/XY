<?php 
    session_start();
    require 'header.php';
    if (!$_SESSION['id']) {
        header("Location: signup.php");
        exit();
    }
    
?>
<main>

        
    <div id="page-transitions" class="page-build light-skin highlight-blue">    
        <div id="menu-hider"></div>
        
        <div id="menu-list" data-selected="menu-pages" data-load="menu/menu-list.php" data-height="415" class="menu-box menu-load menu-bottom"></div>    
        <div id="menu-demo" data-load="menu/menu-demo.php" data-height="210" class="menu-box menu-load menu-bottom"></div>
        <div id="menu-find" data-load="menu/menu-find.php" data-height="420" class="menu-box menu-load menu-bottom"></div>

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
                <a href="#" class="header-title">Profile Page</a>
                <a href="#" data-menu="menu-list" class="header-icon header-icon-1"><i class="fa fa-bars"></i></a>
                <a href="#" data-menu="menu-find" class="header-icon header-icon-2"><i class="fa fa-search"></i></a>
                <a href="#" data-menu="menu-demo" class="header-icon header-icon-3"><i class="fa fa-cog"></i></a>
            </div>  
        </div>
        
        <div class="page-content header-clear-large">
                
            <div class="profile-1 bottom-50">
                <div class="profile-header">
                    <img src="images/empty.png" data-src="images/pictures/0l.jpg" class="responsive-image preload-image">
                </div>
                <div class="profile-header-clear"></div>
                <div class="profile-body">
                    <a href="#" class="profile-button button shadow-large button-s button-round uppercase bolder bg-highlight button-center">Follow</a>
                    <h1 class="profile-heading bolder"><?php echo $_SESSION['username'];?></h1>
                    <h2 class="profile-sub-heading bottom-20 color-blue-dark">Model for PixaBay</h2>
                    <p class="center-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis hendrerit dolor eu arcu sollicitudin, quis maximus mi vehicula.
                    </p>
                    <div class="profile-stats">
                        <a href="#"><i class="fab center-text color-facebook fa-facebook"></i>34k</a>
                        <a href="#"><i class="fab center-text color-twitter fa-twitter-square"></i>134k</a>
                        <a href="#"><i class="fab center-text color-google fa-google-plus-square"></i>138k</a>
                        <div class="clear"></div>
                    </div>

                    <div class="decoration"></div>

                    <div class="profile-gallery bottom-30">
                        <a class="show-gallery" href="images/pictures/1t.jpg" alt="img"><img class="preload-image responsive-image rounded-image shadow-medium" src="images/empty.png" data-src="images/pictures/1s.jpg"></a>
                        <a class="show-gallery" href="images/pictures/2t.jpg" alt="img"><img class="preload-image responsive-image rounded-image shadow-medium" src="images/empty.png" data-src="images/pictures/2s.jpg"></a>
                        <a class="show-gallery" href="images/pictures/3t.jpg" alt="img"><img class="preload-image responsive-image rounded-image shadow-medium" src="images/empty.png" data-src="images/pictures/3s.jpg"></a>
                        <a class="show-gallery" href="images/pictures/4t.jpg" alt="img"><img class="preload-image responsive-image rounded-image shadow-medium" src="images/empty.png" data-src="images/pictures/4s.jpg"></a>
                        <a class="show-gallery" href="images/pictures/5t.jpg" alt="img"><img class="preload-image responsive-image rounded-image shadow-medium" src="images/empty.png" data-src="images/pictures/5s.jpg"></a>
                        <a class="show-gallery" href="images/pictures/6t.jpg" alt="img"><img class="preload-image responsive-image rounded-image shadow-medium" src="images/empty.png" data-src="images/pictures/6s.jpg"></a>
                        <a class="show-gallery" href="images/pictures/7t.jpg" alt="img"><img class="preload-image responsive-image rounded-image shadow-medium" src="images/empty.png" data-src="images/pictures/7s.jpg"></a>
                        <a class="show-gallery" href="images/pictures/8t.jpg" alt="img"><img class="preload-image responsive-image rounded-image shadow-medium" src="images/empty.png" data-src="images/pictures/8s.jpg"></a>
                        <a class="show-gallery" href="images/pictures/9t.jpg" alt="img"><img class="preload-image responsive-image rounded-image shadow-medium" src="images/empty.png" data-src="images/pictures/9s.jpg"></a>
                        <div class="clear"></div>
                    </div>
                </div>
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
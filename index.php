<?php 
session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    require 'header.php';
    require 'includes/dbh.inc.php';
    if (!$_SESSION['id']) {
        header("Location: splash.php");
        exit();

    }
 
?>


<main>

        
    <div id="page-transitions" class="page-build light-skin highlight-blue">    
        <?php require 'header2.php';?>
        
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

                    <a href="business/add.php" class="button shadow-medium button-rounded button-blue2-3d button-blue2">Add Business</a>

                    <div class="decoration"></div>

                    <!-- Add a table to hold the businesses 
                    TODO: 
                        - List all the businesses this user has made 
                        - Add a edit/delete button to the listing 
                    -->
                    <h1>Mind yo Damn Bussiness</h1>
                    <table class="table-borders-light shadow-small">
                        <tbody>
                            <tr>
                                <th class="bg-highlight color-white col-8">Brand</th>
        
                            </tr>
                            <!-- 
                                TODO :
                                    - Create a query to get all of the business that this user owns
                            -->
                            <?php 
                                session_start();
                                $sql = "SELECT idbusiness, business_name, photo FROM business WHERE idusers=?"; //use the ? as a placeholder 
        
                                // Initializes a statement and returns an object for use with mysqli_stmt_prepare
                                $stmt = mysqli_stmt_init($mysqli);
                                if (!mysqli_stmt_prepare($stmt, $sql)) // Prepare 
                                {
                                    header("Location: ../login.php?error=sqlerror1");
                                    exit();
                                }
                                else 
                                {
                                    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['id']);
                                    if (mysqli_stmt_execute($stmt)){
                                        mysqli_stmt_bind_result($stmt, $business_id, $business_name, $business_photo); // Must do this
                                        while (mysqli_stmt_fetch($stmt)) {
                                            if ($business_photo == null){
                                                $business_photo = 'pictures/8s.jpg';
                                            }
                                           echo '<tr><td>
                                                    <div class="news-list-item">
                                                        <form action="business/edit.php?id_business='.($business_id).'" method="POST">
                                                            <a name="edit_business" onclick="this.parentNode.submit()">
                                                                <img class="preload-image rounded-image shadow-medium" src="images/'.($business_photo).'" data-src="images/pictures/8s.jpg" alt="img">
                                                                <strong>'.($business_name).'</strong>
                                                                <p> Whats god</p>
                                                            </a>
                                                        </form>
                                                        <span><i class="fas fa-clock"></i>30 Dec 2019 <a href="#" class="color-blue-dark">Gadgets</a></span>
                                                    </div>    
                                                </td></tr>';
                                           // echo 'lit';
                                        }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    
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
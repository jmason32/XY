<?php 
    session_start();
    require '../header.php';
    require '../includes/dbh.inc.php';
    /* User should be able to still use the site, they cant do certian things if they not logged in */
    // if (!$_SESSION['id']) {
    //     header("Location: ../splash.php");
    //     exit();
    // }
    /* Goal :
        - This page is to show the info of a business 
            - it will have the logo of the business 
            - the reviews 
     */

    // Query business info 

    if(isset($_GET['business_id'])){ // If theres a request to get the view for this business_id

        // Create query to get business info
        $sql = "SELECT idbusiness, idusers, business_name, business_email, business_address, business_description, business_category, photo FROM business WHERE idbusiness=?"; 
        
        $stmt = mysqli_stmt_init($mysqli);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login.php?error=sqlerror1damned");
            exit();
        }
        else 
        {
            mysqli_stmt_bind_param($stmt, 'i', $_GET['business_id']);
            if (mysqli_stmt_execute($stmt))
            {
                
                // Store Result
                mysqli_stmt_store_result($stmt);
                // One business
                if (mysqli_stmt_num_rows($stmt) == 1)
                {
                    
                    mysqli_stmt_bind_result($stmt, $id_bus, $id_user_bus, $name_bus, $email_bus, $address_bus, $desc_bus, $category_bus, $phot_bus);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        
                        $business = array('id'=>$id_bus, 'business_owner'=>$id_user_bus, 'name'=>$name_bus, 'email'=>$email_bus, 'address'=>$address_bus, 'description'=>$desc_bus, 'category'=>$category_bus, 'photo'=>$phot_bus);
                    }

                    if ($business['photo'] == null){
                        $business['photo'] = 'pictures/0l.jpg';
                    }
                
                    
                }
                // No valid business
                else 
                {
                    header("Location: ../index.php?error=nobus");
                    exit();
                }
            }
            else 
            {
                header("Location: ../login.php?error=wrongsome");
                exit();
            }
            mysqli_stmt_close($stmt);
        }

        mysqli_close($mysqli);
    }
    
?>

<main>
<link href="../styles/reviews.css" rel="stylesheet" type="text/css">

    <style>

        * {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
            font-size: 16px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        body {
            background-color: #FFFFFF;
            margin: 0;
        }
        .navtop {
            background-color: #3f69a8;
            height: 60px;
            width: 100%;
            border: 0;
        }
        .navtop div {
            display: flex;
            margin: 0 auto;
            width: 1000px;
            height: 100%;
        }
        .navtop div h1, .navtop div a {
            display: inline-flex;
            align-items: center;
        }
        .navtop div h1 {
            flex: 1;
            font-size: 24px;
            padding: 0;
            margin: 0;
            color: #ecf0f6;
            font-weight: normal;
        }
        .navtop div a {
            padding: 0 20px;
            text-decoration: none;
            color: #c5d2e5;
            font-weight: bold;
        }
        .navtop div a i {
            padding: 2px 8px 0 0;
        }
        .navtop div a:hover {
            color: #ecf0f6;
        }
        .content {
            width: 1000px;
            margin: 0 auto;
        }
        .content h2 {
            margin: 0;
            padding: 25px 0;
            font-size: 22px;
            border-bottom: 1px solid #ebebeb;
            color: #666666;
        }

    </style>

    <div id="page-transitions" class="page-build light-skin highlight-blue">    
        <?php require '../header2.php';?>

        <div class="page-content header-clear-large">
                
            <div class="profile-1 bottom-50">
                <div class="profile-header">
                    <img src="../images/<?php echo $business['photo'];?>" data-src="../images/<?php echo $business['photo'];?>" class="responsive-image preload-image">
                </div>
                <div class="profile-header-clear"></div>
                <div class="profile-body">
                    <a href="#" class="profile-button button shadow-large button-s button-round uppercase bolder bg-highlight button-center">Follow</a>
                    <!-- Replace with bussiness name -->
                    <h1 class="profile-heading bolder"><?php echo $business['name'];?></h1>
                    <!-- What should this heading be? -->
                    <h2 class="profile-sub-heading bottom-20 color-blue-dark">Model for PixaBay</h2>
                    <!-- Description, could give business users the option to have a short and long description -->
                    
                    <?php echo '<p class="center-text">'.$business['description'].'</p>';?>
                    
                    <!-- Go get these stats and links -->
                    <div class="profile-stats">
                        <a href="#"><i class="fab center-text color-facebook fa-facebook"></i>34k</a>
                        <a href="#"><i class="fab center-text color-twitter fa-twitter-square"></i>134k</a>
                        <a href="#"><i class="fab center-text color-google fa-google-plus-square"></i>138k</a>
                        <div class="clear"></div>
                    </div>

                    <div class="decoration"></div>
                    
                    <h1> Reviews </h1>
                    <div class="reviews"></div>
                    <script>
                        
                        fetch("../reviews/reviews.php?page_id=" + <?php echo $_GET['business_id']?>).then(response => response.text()).then(data => {
                            document.querySelector(".reviews").innerHTML = data;
                            document.querySelector(".reviews .write_review_btn").onclick = event => {
                                event.preventDefault();
                                document.querySelector(".reviews .write_review").style.display = 'block';
                                document.querySelector(".reviews .write_review input[name='name']").focus();
                            };
                            document.querySelector(".reviews .write_review form").onsubmit = event => {
                                event.preventDefault();
                                fetch("reviews.php?page_id=" + reviews_page_id, {
                                    method: 'POST',
                                    body: new FormData(document.querySelector(".reviews .write_review form"))
                                }).then(response => response.text()).then(data => {
                                    document.querySelector(".reviews .write_review").innerHTML = data;
                                });
                            };
                        });
                    </script>


                    <!-- <div class="profile-gallery bottom-30">
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
                    </div> -->
                </div>
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
    require '../footer.php';
?>
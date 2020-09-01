<?php 
    session_start();
    require '../header.php';
    require '../includes/dbh.inc.php';
    if (!$_SESSION['id']) {
        header("Location: ../signup.php");
        exit();
    }
    // mysqli_stmt_num_rows($stmt);
    
?>

<main>
<div id="page-transitions" class="page-build light-skin highlight-blue">    
    <?php require '../header2.php';?>
    <div class="page-content header-clear-medium">
        <div class="content">
            <?php 
                session_start();
                $sql = "SELECT idbusiness, business_name, business_description FROM business"; // Create a Query

                $stmt = mysqli_stmt_init($mysqli); // Init a Statement
                if(!mysqli_stmt_prepare($stmt, $sql)){ // If it dont work
                    header("Location: ../signup.php?error=sqlerror1");
                    exit();
                }

                else { // If it do work 
                    if(mysqli_stmt_execute($stmt)){ // Execute
                        mysqli_store_result($stmt); // Store Result 
                        mysqli_stmt_bind_result($stmt, $business_id, $business_name, $business_description);
                        // How many results did we get
                        //Split down the middle 
                        
                        $count = 0; 
                        
                        $business = array();
                        while(mysqli_stmt_fetch($stmt)){
                            $temp_array = array('id'=>$business_id, 'name'=>$business_name, 'description'=>$business_description);
                            array_push($business, $temp_array);
                        }
                        $split = (int) (count($business) / 2 ) ;
                        
                        while($count < count($business)) {
                            /* TODO: 
                                - Fix the output to the page, the businesses are not spliting; the problem is num_rows is returning a negative
                                Hack: save off the info needed first, get the count, then evenly split */
                            
                            if ($count == 0 ){
                                
                                echo '<div class="one-half">';
                            }
                            if ($count < $split){
                                
                                echo '<div class="news-col-item">
                                            <a href="view.php?business_id='.($business[$count]['id']).'">
                                                <img class="preload-image rounded-image shadow-medium bottom-15" src="'.SITE_URL.'/images/pictures/8s.jpg" data-src="'.SITE_URL.'/images/pictures/8s.jpg" alt="img">
                                                <em class="bg-blue-dark">'.($business[$count]['name']).'</em>
                                                <strong>'.($business[$count]['description']).'</strong>
                                            </a>
                                            <span><i class="fas fa-clock"></i>30 Dec 2019</span>
                                        </div>';
                            }
                            if ($count == $split){
                                echo '</div>
                                    <div class="one-half last-column">';
                            }
                            if ($count > $split){
                                echo '<div class="news-col-item">
                                <a href="view.php?business_id='.($business[$count]['id']).'">
                                    <img class="preload-image rounded-image shadow-medium bottom-15" src="'.SITE_URL.'/images/pictures/7s.jpg" data-src="'.SITE_URL.'/images/pictures/7s.jpg" alt="img">
                                    <em class="bg-pink-dark">'.($business[$count]['name']).'</em>
                                    <strong>'.($business[$count]['description']).'</strong>
                                </a>
                                <span><i class="fas fa-clock"></i>30 Dec 2019</span>
                            </div>';
                            }
                            if ($count == $row - 1) {
                                echo '</div>';
                            }

                            $count = $count + 1;
                        }
                        
                    }
                }
            
            ?>
            <div class="clear"></div>
        </div>
    </div>
</div>
</main>

<?php
    require '../footer.php';
?>
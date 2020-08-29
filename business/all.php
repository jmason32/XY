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
                    $rows = mysqli_stmt_num_rows($stmt); // How many results did we get
                    //Split down the middle 
                    $split = (int) $rows / 2 ;
                    $count = 0; 
                    while(mysqli_stmt_fetch($stmt)) {
                        if ($count == 0 ){
                            echo '<div class="one-half">';
                        }
                        if ($count < $split){
                            echo '<div class="news-col-item">
                                        <a href="#">
                                            <img class="preload-image rounded-image shadow-medium bottom-15" src="'.SITE_URL.'/images/pictures/8s.jpg" data-src="'.SITE_URL.'/images/pictures/8s.jpg" alt="img">
                                            <em class="bg-blue-dark">'.($business_name).'</em>
                                            <strong>'.($business_description).'</strong>
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
                            <a href="#">
                                <img class="preload-image rounded-image shadow-medium bottom-15" src="'.SITE_URL.'/images/pictures/7s.jpg" data-src="'.SITE_URL.'/images/pictures/7s.jpg" alt="img">
                                <em class="bg-pink-dark">'.($business_name).'</em>
                                <strong>'.($business_description).'</strong>
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
</main>

<?php
    require '../footer.php';
?>
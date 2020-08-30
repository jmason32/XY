<?php
require '../includes/dbh.inc.php';
function str_without_accents($str, $charset='utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $charset);

    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

    return $str;   // or add this : mb_strtoupper($str); for uppercase :)
}
function debug_to_console($data) 
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array('y' => 'year', 'm' => 'month', 'w' => 'week', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second');
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


if (isset($_GET['page_id'])) {

    $sql = 'SELECT id, page_id, name, content, rating, submit_date FROM reviews WHERE page_id = ? ORDER BY submit_date DESC';
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) 
    {
        echo ' no buno';
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, 'i', $_GET['page_id']);
        if (mysqli_stmt_execute($stmt))
        {
            
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_bind_result($stmt, $id_review, $page_id_review, $name_review, $content_review, $rating_review, $submit_date_review); // Must do this
            $reviews = array();
            while (mysqli_stmt_fetch($stmt)) {
                $search = explode(",","ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,e,i,ø,u");
                $replace = explode(",","c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u");
                $name_review_temp = str_replace($search, $replace, $name_review);
                $temp_array = array("name"=>$name_review_temp, "rating"=>$rating_review, "submit_date"=>$submit_date_review, "content"=>$content_review, "id"=>$id_review);
                array_push($reviews, $temp_array);
            }
            //var_dump($reviews);
        }
        mysqli_stmt_close($stmt);
    }
    $sql = "SELECT AVG(rating) AS overall_rating, COUNT(*) AS total_reviews FROM reviews WHERE page_id = ?";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) 
    {
        echo ' no buno';
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, 'i', $_GET['page_id']);
        if (mysqli_stmt_execute($stmt))
        {
            
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_bind_result($stmt, $overall_rating_review, $total_reviews_r); // Must do this
            if(mysqli_stmt_fetch($stmt))
            {
                $reviews_info = array("overall_rating"=>$overall_rating_review, "total_reviews"=>$total_reviews_r);
            }
            // var_dump($reviews_info);
        }
        mysqli_stmt_close($stmt);
    }
}
?>
<div class="overall_rating">
    <span class="num"><?=number_format($reviews_info['overall_rating'], 1)?></span>
    <span class="stars"><?=str_repeat('&#9733;', round($reviews_info['overall_rating']))?></span>
    <span class="total"><?=$reviews_info['total_reviews']?> reviews</span>
</div>
<a href="#" class="write_review_btn">Write Review</a>
<div class="write_review">
    <form>
        <input name="name" type="text" placeholder="Your Name" required>
        <input name="rating" type="number" min="1" max="5" placeholder="Rating (1-5)" required>
        <textarea name="content" placeholder="Write your review here..." required></textarea>
        <button type="submit">Submit Review</button>
    </form>
</div>
<?php foreach ($reviews as $review): ?>
<div class="review">
    <h3 class="name"><?=htmlspecialchars($review['name'], ENT_QUOTES)?></h3>
    <div>
        <span class="rating"><?=str_repeat('&#9733;', $review['rating'])?></span>
        <span class="date"><?=time_elapsed_string($review['submit_date'])?></span>
    </div>
    <p class="content"><?=htmlspecialchars($review['content'], ENT_QUOTES)?></p>
</div>
<?php endforeach ?>
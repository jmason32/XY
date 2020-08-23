<?php 
    session_start();
    require 'header.php';
    if (!$_SESSION['id']) {
        header("Location: signup.php");
        exit();
    }
    
?>

<main>

</main>

<?php
    require 'footer.php';
?>
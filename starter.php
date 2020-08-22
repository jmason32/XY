<?php 
    require 'header.php';
    session_start();
?>
    <main>
        <?php
            if(isset($_SESSION['id'])) {
                echo '<p>hello login</p>';
            }
            else {
                echo '<p>no</p>';
                
            }
        ?>







    </main>

<?php
    require 'footer.php';
?>
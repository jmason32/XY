<?php 

if(isset($_POST['login-submit']) ) {

    require 'dbh.inc.php';

    $username = $_POST['username'];
    $pw = $_POST['password'];

    // Error Handling : empty fields
    if (empty($username) || empty($pw)) {
        header("Location: ../login.php?error=emptyfields&username=".$username);
        exit();
    }
    // Vaild Username
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../login.php?error=invalidmail&email=".$email);
        exit();
    }

    else {
        
        $sql = "SELECT * FROM users WHERE username=? OR email=?"; //use the ? as a placeholder 
        $stmt = mysqli_stmt_init($mysqli);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlerror1");
            exit();
        }

        else {
            mysqli_stmt_bind_param($stmt, 'ss', $username, $username);
            mysqli_stmt_execute($stmt);
            $resultCheck = mysqli_stmt_get_result($stmt);
            // User Take
            if ($row = mysqli_fetch_assoc($resultCheck)) {
                $hash = substr( $row['pwd'], 0, 60 );
                // $pwdCheck = password_verify($password, $hash);
                
                if ($password == $row['pwd']){
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
                else {
                    session_start();
                    $_SESSION['userid'] = $row['idusers'];
                    $_SESSION['username'] = $row['username'];
                    header("Location: ../starter.php?error=success");
                }
                
            }
            
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);

}
// else {
//     header("Location: ../login.php");
//     exit();
// }



?>
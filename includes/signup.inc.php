<?php 

if(isset($_POST['signup-submit'])) {
    require 'dbh.inc.php';


    $username = $_POST['username'];
    $pw = $_POST['password'];
    $pw_r = $_POST['passwordR'];
    $email = $_POST['email'];
    

    if (empty($username) || empty($pw) || empty($pw_r) || empty($email))  {
        header("Location: ../signup.php?error=emptyfields&username=".$username."&email=".$email);
        exit();
    }
    // Valid Email
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&username=".$username."&email=".$email);
        exit();
    }
    // Vaild Username
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidusername&email=".$email);
        exit();
    }
    // Valid Password
    else if ($pw !== $pw_r){
        header("Location: ../signup.php?error=passwordcheck&username=".$username."&email=".$email);
        exit();
    }

    else {

        $sql = "SELECT idusers FROM users WHERE username=?"; //use the ? as a placeholder 
        $stmt = mysqli_stmt_init($mysqli);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror1");
            exit();
        }

        else {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            // User Take
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&email=".$email);
            }

            else {

                //$sql = "INSERT INTO users () VALUES ()"
                $datetime = date_create()->format('Y-m-d H:i:s');
                $sql = "INSERT INTO users (username, pwd, email) VALUES (?, ?, ?)";
                
                $stmt = mysqli_stmt_init($mysqli);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror2");
                    exit();
                }
                else {
                    // Change MYSQL Data to be 'TEXT'
                    $hasedpwd = password_hash($pw, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, 'sss', $username, $hasedpwd, $email);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../starter.php?signup=success");
                    exit();
                }
            }


        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);

}
else {
    header("Location: ../signup.php");
    exit();
}





?>
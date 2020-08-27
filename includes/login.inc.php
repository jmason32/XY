<?php 
session_start();
function debug_to_console($data) 
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

if(isset($_POST['login-submit']) ) 
{
    // This is to have the 'mysqli' var
    require 'dbh.inc.php';

    // The form on login.php had fields with the names 'username' & 'password'
    // This is how you bring in those variables 
    $username = $_POST['username'];
    $pw = $_POST['password'];

    // Error Handling : empty fields
    if (empty($username) || empty($pw)) 
    {
        // Return to the login.php with the error 'emptfields'
        header("Location: ../login.php?error=emptyfields&username=".$username);
        exit();
    }
    // Vaild Username
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) 
    {
        // Return to the login.php with the error 'invalidemail'
        header("Location: ../login.php?error=invalidmail&email=".$email);
        exit();
    }
    // Validate Credientials
    else 
    {
        // This is a SQL statement, this will grab the following information from the database table 
        // - idusers
        // - username
        // - pwd
        $sql = "SELECT idusers, username, pwd FROM users WHERE username=? OR email=?"; //use the ? as a placeholder 
        
        // Initializes a statement and returns an object for use with mysqli_stmt_prepare
        $stmt = mysqli_stmt_init($mysqli);

        // Prepare an SQL statement for execution
        // If this fails, the statement we made is not vaild to our database
        if (!mysqli_stmt_prepare($stmt, $sql)) 
        {
            header("Location: ../login.php?error=sqlerror1");
            exit();
        }

        else 
        {
            mysqli_stmt_bind_param($stmt, 'ss', $username, $username);
            if (mysqli_stmt_execute($stmt))
            {
                // Store Result
                mysqli_stmt_store_result($stmt);
                // Verify User
                if (mysqli_stmt_num_rows($stmt) == 1)
                {
                    // TODO::  Figure out HASH PASSWORD VERIFY
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        //vERIFY pASSWORD hERER
                        if ($pw == $hashed_password)
                        {

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username; 
                            header("Location: ../index.php?error=success"); 
                            
                        }
                        // Worng password
                        else 
                        {
                            header("Location: ../starter.php?error=wrongpwd".$pwd);
                        }   
                    }
                    
                }
                // No valid user
                else 
                {
                    header("Location: ../login.php?error=sqlerrror2");
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

}
?>

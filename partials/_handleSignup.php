<?php
$showError="false";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        include '_dbconnect.php';
        $user_email = $_POST['signupEmail'];
        $user_password = $_POST['signupPassword'];
        $user_confirmPassword = $_POST['signupCpassword'];
        
        // check username is already exists or not

        $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
        $result = mysqli_query($conn,$existSql);
        $numRows = mysqli_num_rows($result);
        if($numRows>0){
            //error message
            echo "Email already in use";
        }
        else{
            if($user_password==$user_confirmPassword && ($user_password && $user_confirmPassword != "")){
                $hash = password_hash($user_password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
                $result = mysqli_query($conn,$sql);
                if(!$result){
                    //error message
                    echo "error";
                }
                else{
                    $showAlert = true;
                    header("Location:/Forum/index.php?signupsuccess=true");
                    exit();
                }
            }
            else{
                $showError = "Password do not match";
            }
        }
        header("Location:/Forum/index.php?signupsuccess=false&error=".$showError);
    }
?>
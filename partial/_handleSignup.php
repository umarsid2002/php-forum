<?php

$showError = false;

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    include '_db_connect.php';
    $user_email = $_POST['signupEmail'];
    $user_pass = $_POST['signupPassword'];
    $user_Cpass = $_POST['signupCPassword'];

    // Checking if this email exists
    $existsSql = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
    $result = mysqli_query($conn, $existsSql);
    $numRows = mysqli_num_rows($result);
    if($numRows > 0){
        $showError = 'Email already in use';
    }
    else{
        if($user_pass == $user_Cpass){
            $hash = password_hash($user_pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`) VALUES ('$user_email', '$hash')";
            $result = mysqli_query($conn, $sql);
            if($result){
                header('Location: /iforum/index.php?signupsuccess=true');
            }
        }
        else{
            $showError = 'Passwords do not match';
            header('Location: /iforum/index.php?signupsuccess=false');
        }
    }
}

?>
<?php

$showError = false;

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    include '_db_connect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPassword'];

    $sql = "SELECT * FROM `users` WHERE user_email = '$email'";
    $result = mysqli_query($conn, $sql);
    $numberRows = mysqli_num_rows($result);
    if ($numberRows == 1){
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            echo 'logged in '. $email;
            header('Location: /iforum/index.php');
        }
    }
}

?>
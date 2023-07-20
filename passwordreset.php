<?php
session_start();
include('dbconn.php');

    $captcha = $_POST['captcha'];
    $ccaptcha = $_POST['ccaptcha'];
   
        if($captcha == $ccaptcha){
            $email = $_POST["user-email"];
            $roll = $_POST["RollNo"];
        
            $password = $_POST['password'];

            $cpassword = $_POST['cuser-password'];
            if($password == $cpassword){
                $pass = $password;
                $user_login = mysqli_query($conn,"Update LMS.user set Password = '$pass' WHERE EmailId='$email'");
                header('location: ./index.php');
            }
            else{
                header('location: ../pass_reset.php?result=pass-dont-match'); 
            }
        }
        else{
            header('location: ../pass_reset.php?result=wrong-captcha'); 
        }
   
    
?>
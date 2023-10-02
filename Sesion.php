<?php
    if(password_verify($password, $hashed_password))
    {

        $_SESSION['user'] = $user;
        $_SESSION['password'] = $hashed_password;
        $_SESSION['logged_in'] = true;
        
    }  
    else 
    {
        $_SESSION['logged_in'] = false;
    }

    exit();
?>  
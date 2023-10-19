<?php

include 'database.php';


if (!session_status() == PHP_SESSION_NONE && !session_status() == PHP_SESSION_DISABLED && !empty($_SESSION['email'])) 
{
    header('LOCATION: Home_page.php');

}
else
{
    header('LOCATION: Login.php');
}
?>
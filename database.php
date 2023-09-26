<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'smv_projekt';
$port = 3306;

$link = mysqli_connect($host, $user, $password, $db);

if(!$link){
    die("Connection failed:" .mysqli_connect_error());
}
?>
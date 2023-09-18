<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user = 'root';
$password = '';
$db = 'smv_projekt';
$host = 'localhost';
$port = 3306;

$link = mysqli_init();
$success = mysqli_real_connect(
    $link,
    $host,
    $user,
    $password,
    $db,
    $port
);

<?php
include 'database.php';

if(!isset($_SESION['logged_in'])){
    header('Location: Login.php');
}
?>
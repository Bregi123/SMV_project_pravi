<?php
session_start();
include 'database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (isset($_POST['deleteID'])) {
        // Check if the "deleteID" input field exists in the POST data
        $deleteID = $_POST['deleteID'];
        $query = "DELETE FROM students WHERE id={$deleteID} LIMIT 1";
        mysqli_query($link, $query);
    }
}
    header("Location: Student_assign.php");
    exit();

    ?>
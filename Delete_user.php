<?php
session_start();
include 'database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (isset($_POST['deleteID'])) {
        
        // Check if the "deleteID" input field exists in the POST data
        $deleteID = $_POST['deleteID'];
        $res = mysqli_query($link, "SELECT * FROM students WHERE id_student=" . $deleteID);
        $row = mysqli_fetch_array($res);
        if (!empty($row)){            
            $message = "Cannot delete user! User is a student with already assigned subjects ";
            header("Location: User_management.php?message=" . $message);
            exit();
   
        }

        $res = mysqli_query($link, "SELECT * FROM professors_subjects WHERE id_professor=" . $deleteID);
        $row = mysqli_fetch_array($res);
        if (!empty($row)){          
            
            $message = "Cannot delete user! User is a professor with assigned subjects ";
            header("Location: User_management.php?message=" . $message);
            exit();
          
        }
        $res = mysqli_query($link, "SELECT * FROM assignments WHERE id_student="   . $deleteID);
        $row = mysqli_fetch_array($res);
        if (!empty($row)){          
            
            $message = "Cannot delete user ! User is a student with  assignments ";
            header("Location: User_management.php?message=" . $message);
            exit();
          
        }
        if ($deleteID==$_SESSION['user_id']){          
            
            $message = "Cannot delete your user  ";
            header("Location: User_management.php?message=" . $message);
            exit();
          
        }
        $query = "DELETE FROM login WHERE id_login={$deleteID} LIMIT 1";
        mysqli_query($link, $query);
    }
}
    header("Location: User_management.php");
    exit();

    ?>
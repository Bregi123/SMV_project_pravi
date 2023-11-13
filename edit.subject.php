<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php
session_start(); 
// Start the session (this should be at the top of your PHP script)
include 'database.php';
include 'header.php';
echo '<div class = "h2" >SUBJECT EDIT </div>';
//session_start();

if (isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
    if($_SESSION['user_type'] != 'Admin')
    {
        header("location: login.php");
    exit();
    }
    
}






if (count($_POST) > 0) {
    if ($_POST['id_subject'] != ''){

        mysqli_query($link, "UPDATE subjects SET subject_name='" . $_POST['subject_name'] . "' WHERE id_subject='" . $_POST['id_subject'] . "'");
        header("Location: Subject_management.php");
        exit;
    } 
    
    else {
        $result = mysqli_query($link, "SELECT * FROM subjects WHERE subject_name='" . $_POST['subject_name'] . "'");
        $row = mysqli_fetch_array($result);

        if (empty($row)) {
            mysqli_query($link, "INSERT INTO subjects ( subject_name ) VALUES ('" . $_POST['subject_name'] . "')");
            header("Location: Subject_management.php");
            exit;
        }
        else {
            $message = "Subject already exists!";
            
        }
    }
    
}

if (isset($_GET['subject_id'])) {
    $result = mysqli_query($link, "SELECT * FROM Subjects WHERE id_subject='" . $_GET['subject_id'] . "'");
    $row = mysqli_fetch_array($result);

    if (!empty($row)) {
        $id_subject= $row['id_subject'];
        $subject_name = $row['subject_name'];
       
    } else {
        // Handle the case where the record is not found or $row is null
        $message = "Record not found"; // You can set an appropriate message
    }
}

else {
    $id_subject = '';
    $subject_name = '';
    
}

 
?>
<html>
<head>
    <title>Edit Subject</title>
    <style>

        .table_size{
            width: 50%;
        }

        .center_content{
            padding-left : 300px;
            font-family: "Arial", Gadget, sans-serif;
            font-weight : bold;
            letter-spacing: -0.8px;
            word-spacing: 2px;
            color: #0000FF;
            font-style: normal;
        }
        body {
  background: linear-gradient(to bottom, whitesmoke 0%, grey 100%);
  padding-top: 65px;
  padding-left: 20px;
  padding-right: 40px;
  
}
        
    </style>
</head>

<body >
<?php
include 'navigation_bar.php';
?>
    <form name="frmUser" method="post" action="">
<div class = "center_content"><?php if(isset($message)) { echo $message; } ?>

<table class="table table_size"  >
  <tbody>
    <tr>
      <td>Subject Name :</td>
      <td><input type="hidden" name="id_subject" class="txtField" value="<?php echo $id_subject; ?>">
            <input type="text" name="subject_name"  value="<?php echo $subject_name; ?>">
        </td>
    </tr>
   
    

  </tbody>
</table>

    







<input  type="submit" name="submit" value="Submit" class="btn btn-primary" > 

<button type="reset" onclick="location.href = 'Subject_management.php'"  class="btn btn-danger" >Cancel</button>
   
</div>
</form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const sidebar = document.getElementById("sidebar");
        const toggleButton = document.getElementById("toggleButton");
        const logoutButton = document.getElementById("logoutButton");

        // Function to open/close the sidebar
        function toggleSidebar() {
            if (sidebar.style.left === "0px" || sidebar.style.left === "") {
                sidebar.style.left = "-250px";
            } else {
                sidebar.style.left = "0px";
            }
        }

        // Add click event listener to the button
        toggleButton.addEventListener("click", toggleSidebar);
    </script>
</body>
</html>
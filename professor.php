<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php

include 'header.php';
// Start the session (this should be at the top of your PHP script)
session_start();
  
    //exit();
    if (isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
        if($_SESSION['user_type'] != 'Professor')
        {
            header("location: login.php");
        exit();
        }
        
    }

//conncet the professor-subjects table

?>
<html>
<head>
    <title> Professor</title>
    <style>
        #logoutButton {
            background-color: #007BFF; /* Change the background color as desired */
            color: #fff; /* Change the text color as desired */
            border: none;
            border-radius: 5px; /* Rounded corners */
            padding: 10px 20px; /* Adjust padding as needed */
            cursor: pointer;
        }
        body {
  padding-top: 65px;
  padding-left: 20px;
  padding-right: 40px;
  background-image: url('science_pattern.jpg');
  backdrop-filter: blur(8px);
}
#tekst {
    font-size: 2.5vw;
    overflow: hidden;
    display: inline-block;
    white-space: nowrap;
    width: 30vw;
    letter-spacing: 5px;
    color: white;
    border-right: 5px solid;
    animation: 
     typing 2s steps(15),
     cursor .6s step-end infinite alternate;
}
.divneki{
    margin: auto;
    text-align:center;
    justify-content: center;
    margin-top: 14vw;
}

@keyframes cursor {     /* TUKI JE ZATO DA SE ONA CRTICA NA KONCU BLNKA (zdelo se mi je kul) */
    
    50% { border-color: transparent; }
    
}

@keyframes typing {
    from { width: 0; }
}

       
    </style>
</head>
<body >
<div class="divneki"><div id=tekst> Welcome to Pibernet! </div></div>
<?php
include 'navigation_bar_prof.php';
?>

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

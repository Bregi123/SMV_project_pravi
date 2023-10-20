<?php 
echo '<div class = "h1" >PIBERNET E-CLASSROOM </div>';
?>
<head>
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
<style>
    .h1{
        font-family: Arial, Helvetica, sans-serif;
font-size: 31px;
letter-spacing: -1px;
word-spacing: 0px;
color: #007BFF;
font-weight: 700;
text-decoration: none;
font-style: normal;
font-variant: normal;
text-transform: none;
text-align: center;
    }
    .h2{
        font-family: Arial, Helvetica, sans-serif;
font-size: 20px;
letter-spacing: -1px;
word-spacing: 0px;
color: #000000;
font-weight: 700;
text-decoration: none;
font-style: normal;
font-variant: normal;
text-transform: none;
text-align: center;
    }
              body {
  background-color:#d3d3d3;
  padding-top: 65px;
  padding-left: 20px;
  padding-right: 40px;
}
        #Button{
            font-family: 'Trebuchet MS', sans-serif;
            background-color: #d3d3d3; /* Change the background color as desired */
            color: #333; /* Change the text color as desired */
            border: none;
            border-radius: 3px; /* Rounded corners */
            padding: 2px 4px; /* Adjust padding as needed */
            cursor: pointer;
            font-weight: bold;
            
            

        }
        #logoutButton {
            background-color: #007BFF; /* Change the background color as desired */
            color: #fff; /* Change the text color as desired */
            border: none;
            border-radius: 5px; /* Rounded corners */
            padding: 10px 20px; /* Adjust padding as needed */
            cursor: pointer;
        }
        /* Styles for the sidebar */
        .sidebar {
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: -250px; /* Initially hidden */
            background-color: #333;
            color: white;
            transition: left 0.3s;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            padding: 15px;
        }

        /* Styles for the button */
        #toggleButton {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>


<head>
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
<style>
   
    .h2{
        font-family: Arial, Helvetica, sans-serif;
font-size: 1.5vw;
letter-spacing: -1px;
word-spacing: 0px;
color: #000000;
font-weight: 700;
text-decoration: none;
font-style: normal;
font-variant: normal;
text-transform: none;
text-align: center;
margin-top: 1vw;
    }
              

        a {
            color: black;
        }
        a:link {
            text-decoration: none;
            
                }
        #Button{
            font-family: 'Trebuchet MS', sans-serif;
            background-color: #d3d3d3; /* Change the background color as desired */
            color: black; /* Change the text color as desired */
            border: none;
            border-radius: 3px; /* Rounded corners */
            padding: 2px 4px; /* Adjust padding as needed */
            cursor: pointer;
            width: 100%;
            
            

        }
        #logoutButton {
            background-color: #007BFF; /* Change the background color as desired */
            color: #fff; /* Change the text color as desired */
            border: none;
            border-radius: 5px; /* Rounded corners */
            padding: 10px 20px; /* Adjust padding as needed */
            cursor: pointer;
            margin: auto;
            justify-content: center;
            display: flex;
            width: 50%;
        }
        /* Styles for the sidebar */
        .sidebar {
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: -250px; /* Initially hidden */
            background: linear-gradient(to left, darkgray 0%, grey 100%);
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
            background: linear-gradient(to left, grey 0%, darkgray 100%);
            color: white;
            border: 1px solid white;
            border-radius: 10px;
            padding: 10px 20px;
            cursor: pointer;
        }
      
        
    </style>
</head>

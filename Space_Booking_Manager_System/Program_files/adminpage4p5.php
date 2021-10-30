<?php
    if((session_id() == '')){
        session_start();
        }
    //echo $_SESSION["Login"]; //for session tracking purpose, can delete
    //echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

    if ($_SESSION["Login"] != "YES"){
        header("Location: index.php");
    }

    $display = "All" ;
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="adminpage.css">
    </head>
    <style>
        .main{
        min-height: 100vh;
        background-image: url(images/rain.png);

        background-size:cover;
      }
      #OthPro{
            background: #03a9f4;
            transition: 0.5s;
            border-radius: 10px;
            width: 200px;
        }
    </style>
    <body>
        <div class="container2">
            <div class="navigation">
                <ul>
                    <li><h2><?php echo  $_SESSION["USER"]."(ADMIN)" ?></h2></li>
                    <a href="adminpage1.php"> 
                    <li>
                        <span class="title">Booking Requests</span>
                    </li></a>
                   <a href="adminpage2.php">
                    <li>
                        <span class="title">Booking Reports</span>
                    </li></a>
                    <a href="adminpage3.php">
                    <li>
                        <span class="title">Personal Profile</span>
                    </li>
                    </a>
                    <a href="adminpage4.php">
                    <li id="OthPro">
                        <span class="title">User Lists</span>
                    </li>
                    </a>
                    <a href="logout.php" id="logout">
                    <li>
                        <span class="title">Logout</span>
                    </li>
                    </a>
                </ul>
            </div>

            <div class="main">
                <div class="topbar">
                    <div class="toggle" onclick="toggleMenu();"><img src="images/menu-svgrepo-com.svg"></div>
                    <div class="title">Space Booking Management System<span><p><br>BOOK YOUR LABS & ROOMS WITH EASE</p></a></div>
                </div>
                <div class="con">
                    <?php 
                    require("editProfile.php");
                    ?>
                </div>
            </div>
        </div>
        <script>
            function toggleMenu(){
                let toggle = document.querySelector('.toggle');
                let navigation = document.querySelector('.navigation');
                let main = document.querySelector('.main');

                
                toggle.classList.toggle('active');
                navigation.classList.toggle('active');
                main.classList.toggle('active');
            }
        </script>
    </body>
</html>
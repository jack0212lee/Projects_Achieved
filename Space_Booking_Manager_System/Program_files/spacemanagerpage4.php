<?php
    if((session_id() == '')){
        session_start();
        }
    //echo $_SESSION["Login"]; //for session tracking purpose, can delete
    //echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

    if ($_SESSION["Login"] != "YES"){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="spacemanagerpage.css">
        <link rel="stylesheet" type="text/css" href="search.css">
    </head>
    <style>
        #rll{
            background: #03a9f4;
            transition: 0.5s;
            border-radius: 10px;
            width: 200px;
        }
        .con table{
            width: 80% ;
        }

        .con{
            min-height: 100vh;
            background-image: url(images/rain.png);

            background-size:cover;
        }
    </style>
    <body>
        <div class="container2">
            <div class="navigation">
                <ul>
                    <li><h2><?php echo  $_SESSION["USER"] ?></h2></li>
                    <a href="spacemanagerpage1.php"> 
                    <li id="br">
                        <span class="title">Booking Requests</span>
                    </li></a>
                   <a href="spacemanagerpage2.php">
                    <li id= "abh">
                        <span class="title">All booking history</span>
                    </li></a>
                    <a href="spacemanagerpage3.php">
                    <li id="Pro">
                        <span class="title">Profile</span>
                    </li>
                    </a>
                    <a href="spacemanagerpage4.php" >
                    <li id="rll">
                        <span class="title">Rooms/Labs</span>
                    </li>
                    </a>
                    <a href="logout.php" id="logout">
                    <li id="lgt">
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
                    <?php require("roomlists.php");?>
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
            function mysearch (){
            var input = document.getElementById("mysearch");
            var filter = input.value.toUpperCase();
            var table = document.getElementById("roomlists");
              var tr = document.getElementsByTagName("tr");
            var td, txtValue ;

              for (i = 1 ; i < tr.length ; i++){
                td = tr[i].getElementsByTagName("td")[1];
                if (td){
                  txtValue = td.textContent || td.innerText;
                  if(txtValue.toUpperCase().indexOf(filter)>-1){
                    tr[i].style.display = "";
                  }else{
                    tr[i].style.display = "none";
                  }
                }  
              }
            }
        </script>
    </body>
</html>

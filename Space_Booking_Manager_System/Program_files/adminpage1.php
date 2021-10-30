<?php
    if((session_id() == '')){
        session_start();
        }
    //echo $_SESSION["Login"]; //for session tracking purpose, can delete
    //echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

    if ($_SESSION["Login"] != "YES"){
        header("Location: index.php");
    }


    $_SESSION["d"] = "0";
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="adminpage.css">
        <link rel="stylesheet" type="text/css" href="spacemanagerpage.css">
        <link rel="stylesheet" type="text/css" href="search.css">
    </head>
    <style>
        .main .con{
            margin: 0px 30px 10px 0px;
            padding: 10px 30px;
        }
        .tablearea{
            margin: 0px 0 ;
        }
        #history_sp_ad_view{
            width: 90%;
        }
        #history_sp_ad_view td{
            padding: 5px;
        }
        #history_sp_ad_view td form button{
            cursor: pointer;
            padding: 3px;
            box-shadow: 0.3px 0.3px 3px grey;
        }
        #history_sp_ad_view td form button:hover{
            border-radius: 3px;
        }
        #br{
            background: #03a9f4;
            transition: 0.5s;
            border-radius: 10px;
            width: 200px;
        }
        .con{
        min-height: 100vh;
        background-image: url(images/rain.png);

        background-size:cover;
      }
      .con table{
        background: white;
        box-shadow: 5px 5px 10px grey;
      }
      #boR{
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
                    <li><h2><?php echo  $_SESSION["USER"]."(ADMIN)"?></h2></li>
                    <a href="adminpage1.php"> 
                    <li id="boR">
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
                    <li>
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
                <div class="con3">
                    <h4>Search by Rooms/Lab</h4>
                    <div class="search3">
                        <div class="icon3"></div>
                        <div class="input3">
                            <input type="text" placeholder="Rooms/Labs ID" id="mysearch3" onkeyup="mysearch3()">
                        </div>
                        <span class="clear3" onclick="document.getElementById
                        ('mysearch3').value = '' ">
                        </span>
                    </div>
                </div>
                <div class="con2">
                    <h4>Search by Status</h4>
                    <div class="search2">
                        <div class="icon2"></div>
                        <div class="input2">
                            <input type="text" placeholder="APPROVED/REJECTED" id="mysearch2" onkeyup="mysearch2()">
                        </div>
                        <span class="clear2" onclick="document.getElementById
                        ('mysearch2').value = '' ">
                        </span>
                    </div>
                </div>
                    <div class="con">
                        <h4>Search by Booking Date</h4>
                    <div class="search">
                        <div class="icon"></div>
                        <div class="input">
                            <input type="text" placeholder="yyyy-mm-dd" id="mysearch" onkeyup="mysearch()">
                        </div>
                        <span class="clear" onclick="document.getElementById
                        ('mysearch').value = '' ">
                        </span>
                    </div>
                    <div class="tablearea">
                    <?php require("checkBookings.php");?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const icon3 = document.querySelector('.icon3');
            const search3 = document.querySelector('.search3');
            icon3.onclick = function(){
                search3.classList.toggle('active')
            }

            const icon2 = document.querySelector('.icon2');
            const search2 = document.querySelector('.search2');
            icon2.onclick = function(){
                search2.classList.toggle('active')
            }

            function toggleMenu(){
                let toggle = document.querySelector('.toggle');
                let navigation = document.querySelector('.navigation');
                let main = document.querySelector('.main');

                
                toggle.classList.toggle('active');
                navigation.classList.toggle('active');
                main.classList.toggle('active');
            }
            function mysearch2(){
            var input = document.getElementById("mysearch2");
            var filter = input.value.toUpperCase();
            var table = document.getElementById("history");
              var tr = document.getElementsByTagName("tr");
            var td, txtValue ;

              for (i = 0 ; i < tr.length ; i++){
                td = tr[i].getElementsByTagName("td")[7];
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

            function mysearch3(){
            var input = document.getElementById("mysearch3");
            var filter = input.value.toUpperCase();
            var table = document.getElementById("history");
              var tr = document.getElementsByTagName("tr");
            var td, txtValue ;

              for (i = 0 ; i < tr.length ; i++){
                td = tr[i].getElementsByTagName("td")[2];
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
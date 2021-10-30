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
         .main .con{
            margin: 0px 30px 10px 0px;
            padding: 10px 30px;
        }
        .fullreport{
            margin: 0 10px 10px;
        }
        #abh{
            background: #03a9f4;
            transition: 0.5s;
            border-radius: 10px;
            width: 200px;
        }
        .main{
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
                    <h4>Search by Date</h4>
                    <div class="search">
                        <div class="icon"></div>
                        <div class="input">
                            <input type="text" placeholder="yyyy-mm-dd" id="mysearch" onkeyup="mysearch()">
                        </div>
                        <span class="clear" onclick="document.getElementById
                        ('mysearch').value = '' ">
                        </span>
                    </div>
                </div>
                <div class="fullreport">
                    <?php require('viewReport.php') ?>
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

            const icon = document.querySelector('.icon');
            const search = document.querySelector('.search');
            icon.onclick = function(){
                search.classList.toggle('active')
            }
            
            function mysearch (){
            var input = document.getElementById("mysearch");
            var filter = input.value.toUpperCase();
            var table = document.getElementById("fullhistory");
              var tr = document.getElementsByTagName("tr");
            var td, txtValue ;

              for (i = 1 ; i < tr.length ; i++){
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

           
            function mysearch2(){
            var input = document.getElementById("mysearch2");
            var filter = input.value.toUpperCase();
            var table = document.getElementById("fullhistory");
              var tr = document.getElementsByTagName("tr");
            var td, txtValue ;

              for (i = 1 ; i < tr.length ; i++){
                td = tr[i].getElementsByTagName("td")[10];
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
            var table = document.getElementById("fullhistory");
              var tr = document.getElementsByTagName("tr");
            var td, txtValue ;

              for (i = 1 ; i < tr.length ; i++){
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
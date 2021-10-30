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
        p select{
            font-size: 18px;
        }
        #updatetable{
            font-size:18px;
        }
        #updatetable tr td input{
            font-size:18px
        }
      
        #upStatButt, #cancelStatButt{
            width: 200px ;
            height:30px ;
            border-radius: 5px;
            border: none;
            font-weight: 600;
        }
        #upStatButt{
            background:grey;
            color: black;
            transition: 0.5 ;
            box-shadow: 0.5px 0.5px 5px grey ;
            cursor:pointer;
        }
        #upStatButt:hover{
            background:green;
            color: white;
            transition: 0.5 ;
        }
        #cancelStatButt{
            background:grey;
            color: black;
            transition: 0.5 ;
            box-shadow: 0.5px 0.5px 5px grey ;
            cursor:pointer;
        }
        #cancelStatButt:hover{
            background: darkred;
            color: white;
            transition: 0.5 ;
        }
        .links button{
            text-decoration:none;
            color: black;
        }
        .links button:hover{
            color:white;
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
                    <li><h2><?php echo  $_SESSION["USER"]."(ADMIN)" ?></h2></li>
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
                    <div class="Bookingreceipt">
                    
                    <?php
                        require("configDB.php");
                        $id = $_POST["ID_bkn"];
                        echo $id ;
                        $sql = "SELECT * FROM booking WHERE booking_id = '$id' ";
                        $result = mysqli_query($conn,$sql);
                        $rows = $result->fetch_assoc();
                        
                        $id_user = $rows["user_id"];
                        $sql2 = "SELECT username FROM user WHERE user_id = '$id_user' ";
                        $result2 = mysqli_query($conn,$sql2);
                        $users = $result2->fetch_assoc();

                        $id_room = $rows["roomid"];
                        $sql3 = "SELECT room_descrip FROM room WHERE roomid = '$id_room' ";
                        $result3 = mysqli_query($conn,$sql3);
                        $rooms = $result3->fetch_assoc();
                    ?>
            <hr>
        <!-- Shows the receipt received by the users-->
                            <table>
                            <th>
                                Requestor Details
                            </th>
                            <tr>
                                <td>Booking Id: </td>
                                <td><?php echo "<b>" .$rows["booking_id"] . "</b>" ?></td>
                            </tr>
                            <tr>
                                <td>User Id: </td>
                                <td><?php echo $rows["user_id"] ?></td>
                            </tr>
                            <tr>
                                <td>Lecturer's Name: </td>
                                <td><?php echo $users["username"];?></td>
                            </tr>

                            <tr>
                                <td>Subject Name: </td>
                                <td><?php echo $rows["bookSubject"] ?></td>
                            </tr>

                            <tr>
                                <td>Section: </td>
                                <td><?php echo $rows["section"] ?></td>
                            </tr>

                            <tr>
                                <td>Class Size: </td>
                                <td><?php echo $rows["studnum"] ?></td>
                            </tr>
                            </table>
                            <br><br>

                            <!--Booking Details-->
                            <table>
                            <th>Booking Details</th>
                            <tr>
                                <td>Purpose: </td>
                                <td colspan="2"><?php echo $rows["bookTitle"] ?></td>
                            </tr>
                            <tr>
                                <td>Room Selected: </td>
                                <td><?php echo $rows["roomid"] ?></td>
                            </tr>
                            <tr>
                                <td>Room Description: </td>
                                <td><?php echo $rooms["room_descrip"] ?></td>
                            </tr>

                            <tr>
                                <td>Booking Date: </td>
                                <td><?php echo $rows["bookDate"] ?></td>
                            </tr>

                            <tr>
                                <td>Start Time: </td>
                                <td><?php echo $rows["startTime"] ?></td>
                            </tr>

                            <tr>
                                <td>End Time: </td>
                                <td><?php echo $rows["endTime"] ?></td>
                            </tr>

                            <tr>
                                <td>Apply time date: </td>
                                <td><?php echo $rows["applyTimeDate"]?></td>
                            </tr>

                            <tr>
                                <td>Booking Status: </td>
                                <td><?php echo $rows["bookStatus"] ?></td>
                            </tr>

                            <tr>
                                <td>Status last updated: </td>
                                <td><?php echo $rows["statusTimeDate"] ?></td>
                            </tr>
                            </table>
                        </div> 
          <!-- <-- Space Manager Approve Reject function -->               
                        <?php
                        
                        $ID = $_POST["ID_bkn"];
                        $sql = "SELECT * FROM booking WHERE booking_id='$ID'";

                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_fetch_assoc($result);
                        ?>
                        <br>
                        <form method="post" action="updateApprove.php" id="updatetable">
                        <table>
                            <tr>
                            <td>Booking Id: </td>
                            <td><input type="text" name="id" value=<?php echo $ID?> readonly></td>
                            </tr>
                        </table>
                        <br>
                        <p> You want to <select name="status">
                            <option value="APPROVED">Approved</option>
                            <option value="REJECTED">Reject</option>
                        </select> this application?</p>
                        <br>
                        <input type="submit" value="Update" id="upStatButt">
                        <a href="adminpage1.php" class="links"><button type="button" id="cancelStatButt" >Cancel</button></a>
                        </form>
                </div>
            </div>
        </div>
        <script>
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
                td = tr[i].getElementsByTagName("td")[5];
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
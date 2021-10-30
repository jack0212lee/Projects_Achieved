<?php
   if((session_id() == '')){
    session_start();
    }
  // echo $_SESSION["Login"];
  // echo $_SESSION["LEVEL"];
  if ($_SESSION["Login"] != "YES"){
    header("Location: index.php");
  }

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <title>Booking History</title>
     <link rel="stylesheet" href="search.css">
   </head>
   <style>
        .top_row ul li #v{
        background: linear-gradient(45deg, #d6e9f1, rgba(22, 149, 207, 0.5));    
        color: white;
        transition: 0.5s;
        padding: 9px 17px;
        }
    
      body{
          min-height: 100vh;
          background-image: url(images/rain.png);
          background-size:cover;
      }


      #history{
        margin: 10px;
        background: white;
        box-shadow: 5px 5px 10px grey;
      }

      #history tr td form {
        align-items: center ;
        justify-content: center ;
        display: flex;
      }

      #history tr td form button{
        margin: 3px;
        cursor: pointer ;
        width: 100px ;
        height: 30px ;
      }

     </style>
   <body onload="initial_load()">
   <hr>
 

   <?php
     require("configDB.php");

     $sql="SELECT * FROM user";
     $result = mysqli_query($conn, $sql);
      ?>

      <?php
      if($_SESSION["LEVEL"]==3) {
        require("configDB.php");

        $sql="SELECT * FROM booking";
        $result = mysqli_query($conn, $sql);

        require("lecturer_menu_bar.html");
        ?>
       
        <div class="search">
            <div class="icon"></div>
            <div class="input">
                <input type="text" placeholder="yyyy-mm-dd" id="mysearch" onkeyup="mysearch()">
            </div>
            <span class="clear" onclick="document.getElementById
            ('mysearch').value = '' "></span>
        </div>
      
       
      <h1>Booking Histroy</h1>
      <table border='1' cellspacing='0' id="history" >
        <tr>
                <th>Booking Date</th>
                <th>Booking ID </th>
                <th>Room ID </th>
                <th>Booking Time</th>
                <th>Book Title</th>
                <th>Book Subject</th>
                <th>Section</th>            
                <th>Status</th>
                <th>Details</th>
        </tr>
          <?php 
          $counter =  0;
          while($rows = mysqli_fetch_assoc($result)) {
          if($_SESSION["ID"]==$rows["user_id"]){
            ?>
            <tr>
            <td><?php echo $rows["bookDate"]; ?></td>
                  <td><?php echo $rows['booking_id'] ?></td>
                  <td><?php echo $rows['roomid']?></td>
                  <td><?php echo $rows['startTime'] . " - " . $rows['endTime'] ?></td>
                  <td><?php echo $rows['bookTitle'] ?></td>
                  <td><?php echo $rows['bookSubject'] ?></td>
                  <td><?php echo $rows['section'] ?></td>
                  <td><?php echo $rows['bookStatus'] ?></td>
                  <td><form action="bookingrecordsdetails.php" method="POST" target="_blank"><button type="submit" value= <?php echo $rows["booking_id"] ?> name="ID_bkn">Detail Report</button></form>
              
            </tr>
        <?php  }
        }
        ?>
      </table>
    <?php  }
     //mysqli_close($conn)//?>


     <?php
          if($_SESSION['LEVEL']==1 || $_SESSION["LEVEL"]==2){
            require("configDB.php");

            $sql="SELECT * FROM booking";
            $result = mysqli_query($conn, $sql);
            ?>

            <h1>Full booking list</h1>
            <table border='1' cellspacing='0' id="history_sp_ad_view">
              <tr>
                <th>Booking Date</th>
                <th>Booking Time</th>
                <th>Rooms/Labs</th>
                <th>Lecturer</th>
                <th>Book Title</th>
                <th>Book Subject</th>
                <th>Section</th>            
                <th>Status</th>
                <th>Action</th>
                
              </tr>
              <?php while($rows = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $rows["bookDate"] ?></td>
                  <td><?php echo $rows['startTime'] . " - " . $rows['endTime'] ?></td>
                  <td><?php echo $rows['roomid']?></td>
                  <td><?php echo $rows['user_id']?></td>
                  <td><?php echo $rows['bookTitle'] ?></td>
                  <td><?php echo $rows['bookSubject'] ?></td>
                  <td><?php echo $rows['section'] ?></td>
                  <td><?php echo $rows['bookStatus'] ?></td>
                  <td><form action=
                  <?php if($_SESSION["LEVEL"] == 2){echo "spacemanagerpage1p5.php";}
                  if($_SESSION["LEVEL"] == 1){echo "adminpage1p5.php";}?>
                   method="POST" ><button type="submit" value= <?php echo $rows["booking_id"] ?> name="ID_bkn">Action/Detail Report</button></form>
                </tr>
            <?php
            }
            ?>
          </table>
        <?php  }
         mysqli_close($conn)?>

        <script>
            const icon = document.querySelector('.icon');
            const search = document.querySelector('.search');
            icon.onclick = function(){
                search.classList.toggle('active')
            }
            
            function mysearch (){
            var input = document.getElementById("mysearch");
            var filter = input.value.toUpperCase();
            var table = document.getElementById("history");
              var tr = document.getElementsByTagName("tr");
            var td, txtValue ;

              for (i = 0 ; i < tr.length ; i++){
                td = tr[i].getElementsByTagName("td")[0];
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

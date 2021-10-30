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
        <title>Room Lists</title>
        <link rel="stylesheet" href="search.css">
    </head>
    <style>
        .top_row ul li #rl{
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
      #roomlists{
        margin: 10px;
        background: white;
        box-shadow: 5px 5px 10px grey;
      }

      #toggle_status{
        margin: 2px ;
        cursor: pointer;
      }
      #toggle_status:hover{
        border-radius: 3px;
      }

    </style>
    <body>

        <?php 
        

        require("configDB.php");
        $sql = "SELECT * FROM room";
        $result = mysqli_query($conn, $sql);
        if($_SESSION["LEVEL"] == 3 ) {
        require("lecturer_menu_bar.html");}
        ?>
        <div class="search">
            <div class="icon"></div>
                <div class="input">
                    <input type="text" placeholder="Room/Lab name" id="mysearch" onkeyup="mysearch()">
                </div>
                <span class="clear" onclick="document.getElementById
                ('mysearch').value = '' "></span>
        </div>
            <h1>Room/Lab Lists</h1>
                <table border="1" cellspacing="0" id="roomlists">
                    <tr>
		                <td align="center" width="70"><strong>Room/Lab ID</strong></td>
                        <td align="center" width="70"><strong>Room/Lab name</strong></td>
                        <td align="center" width="50"><strong>Room/Lab Location</strong></td>
		                <td align="center" width="170"><strong>Room/Lab Availability</strong></td>
		                <td align="center" width="50"><strong>Capacity</strong></td>
                    <?php if($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2){
                      echo "<td align='center' width='50'><strong>Last Modified</strong></td>";
                      echo "<td align='center' width='50'><strong>Action</strong></td>" ;}
                    ?>
                    </tr>
                 
                        <?php while($rows = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                <td><?php echo $rows["roomid"]?></td>
                                <td><?php echo $rows["room_descrip"]?></td>
                                <td><?php echo $rows["room_location"]?></td>
                                <td><?php echo $rows["room_availability"]?></td>
                                <td><?php echo $rows["room_capacity"]?></td>
                                <?php if($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2){
                                echo "<td>"; echo $rows['room_lastupdate']; echo"</td>";
                                echo "<td>
                                <form method='POST' action='room_edit.php'>
                                  <button type='submit' value=";
                                  echo $rows["roomid"];
                                  echo " name=roomID id='toggle_status'> Update Status </form> </td>";
                                ;}
                                ?>
                                </tr>
                        <?php
                        }?>
                </table>
       
    </body>
    <script>
            const icon = document.querySelector('.icon');
            const search = document.querySelector('.search');
            icon.onclick = function(){
                search.classList.toggle('active')
            }
            
            function mysearch (){
            var input = document.getElementById("mysearch");
            var filter = input.value.toUpperCase();
            var table = document.getElementById("roomlists");
              var tr = document.getElementsByTagName("tr");
            var td, txtValue ;

              for (i = 1 ; i < tr.length ; i++){
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
</html>
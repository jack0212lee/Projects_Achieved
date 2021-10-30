<?php
    session_start();
    require("configDB.php");

    if ($_SESSION["Login"] != "YES"){
        header("Location: index.php");
      }
      
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Your Booking Receipt</title>
  </head>
  <style>
      .Bookingreceipt{
        margin : 10px;
      }
      table td{
        padding: 0.5px 3.5px;
      }
      #delete{
        margin: 20px;
        width: 200px ;
        height: 30px ;
        cursor: pointer;
      }
      #delete:hover{
        background:red;
        color:white ;
      }
    </style>
  <body onload="hiding()">
    <?php
    if($_SESSION["LEVEL"] == 3){
      require("lecturer_menu_bar.html");}
    ?>
    <div class="Bookingreceipt">
      <h2>Thank you for booking the room!</h2>
      <?php


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
        <!-- Requestor Details-->
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
      <?php 
      if ($rows["bookStatus"] == ""){?>
    <form method="post" action="deleteRecord.php">
      <input type="text" value=<?php echo $rows["booking_id"]?> name="to_be_delete" id="hide"></input>
      <br>
      <input type="submit" value="Cancel Request" id="delete"></input>
      </form>
    <?php }?>
  </body>
  <script>
    function hiding(){
      var item = document.getElementById("hide");
      item.style.display = "none";
    }
    </script>
</html>
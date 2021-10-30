<!DOCTYPE html5>

<?php
    session_start();

    if ($_SESSION["Login"] != "YES"){
      header("Location: index.php");
    }
    if($_SESSION["LEVEL"] == 3){
    require("lecturer_menu_bar.html");}
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Booking Page</title>
  </head>
  <style>
       
        .top_row ul li #b{
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
      h1{
        margin: 8px 0 ;
      }
      form{
        margin: 10px;
        line-height: 25px;
        margin-bottom: 40px;
        
      }
      form .table th, td{
        background: white;
        border-color: transparent;
        padding: 5px ;
        border-radius: 10px;
      }

      td input, select{
        width: 600px;
        font-size: 14px ;
        padding: 3px ; 
        border-radius: 2px ;
        box-shadow: 5px 5px 5px grey;
      }
      .butts{
        display: flex ;
        
      }
      .submitbutt{
        background: lightgrey;
        color: black ;
        width: 100px;
        margin: 0 50px 0 100px;
        height: 40px;
        border-radius: 10px ;
        transition: 0.5s;
        font-size: 16px;
        cursor: pointer;
        box-shadow: 5px 5px 5px grey;
      }
      .submitbutt:hover{
        background: lightgreen;
        color: white ;
        width: 120px;
        height: 50px;
        transition: 0.5s;
      }

      .resetbutt{
        background: lightgrey;
        color: black ;
        width: 100px;
        margin: 0 50px;
        height: 40px;
        border-radius: 10px ;
        font-size: 16px;
        cursor: pointer;
        box-shadow: 5px 5px 5px grey;
      }

      .resetbutt:hover{
        background: red;
        color: white ;
        width: 120px;
        height: 50px;
        transition: 0.5s;
      }

    </style>
  <body>
    <?php
      if($_SESSION["LEVEL"]==1 || $_SESSION["LEVEL"]==2){
        echo "Sorry, You are not able to access this page";
      ?>
      <br>
      <button id="back">Back </button>
    <?php  }?>

    <script>
      document.getElementById("back").onclick=function(){
      window.history.back();
      };

      function validate()
      {
        // if (document.booking.user_id.value=="")
        // {
        //   document.booking.user_id.focus();
        //   alert("Please enter your user id! (Check at my profile)");
        //   return false;
        // }

        // if (document.booking.name.value=="")
        // {
        //   document.booking.name.focus();
        //   alert("Please enter your name!");
        //   return false;
        // }

        if (document.booking.bookSubject.value=="")
        {
          document.booking.bookSubject.focus();
          alert("Please enter your teaching subject!");
          return false;
        }

        if (document.booking.section.value<=0)
        {
          document.booking.section.focus();
          alert("Please enter your section!");
          return false;
        }

        if (document.booking.stunum.value<=0)
        {
          document.booking.stunum.focus();
          alert("Please enter your class student numbers!");
          return false;
        }

        if (document.booking.bookTitle.value=="")
        {
          document.booking.bookTitle.focus();
          alert("Please enter your booking purpose!");
          return false;
        }

        if (document.booking.roomid.value=="")
        {
          document.booking.roomid.focus();
          alert("Please choose which lab you want to book!");
          return false;
        }

        if (document.booking.date.value=="")
        {
          document.booking.date.focus();
          alert("Please choose when you want to book!");
          return false;
        }

        if (document.booking.startTime.value=="")
        {
          document.booking.startTime.focus();
          alert("Please choose when you want to book!");
          return false;
        }

        if (document.booking.endTime.value=="")
        {
          document.booking.endTime.focus();
          alert("Please choose when you want to book!");
          return false;
        }

        if (document.booking.startTime.value >= document.booking.endTime.value)
        {
          document.booking.endTime.focus();
          alert("Please amend your booking time");
          return false;
        }

        alert("Thankyou for your time!")
        return (true);
      }
    </script>

    <?php
    if($_SESSION["LEVEL"]==3){
    ?>
    <!-- Open form -->
    <form name="booking" action="booking.php" method="post" onsubmit="return(validate());">

      <h1>Space Booking Form</h1>

      <p><b>Instruction</b></p>
      <ol>
        <li>Please fill in the exact information.</li>
        <li>Please fill in with <b>UPPERCASE</b>. ( exp: SIAHWENGTZE)</li>
        <li>Application is not editable after submission.</li>

      </ol>
      <hr>

      <!-- Requestor Details-->
      <table>
        <th>
          Class Details
        </th>
        <!--<tr>
          <td>User Id: </td>
          <td><input type="text" name="user_id" size="8"/></td>
        </tr>
        <tr>
          <td>Lecturer's Name: </td>
          <td><input type="text" name="name" size="30"/></td>
        </tr>-->

        <tr>
          <td>Subject Name: </td>
          <td><input type="text" name="bookSubject" size="50"/></td>
        </tr>

        <tr>
          <td>Section: </td>
          <td><input type="number" name="section"/></td>
        </tr>

        <tr>
          <td>Class Size: </td>
          <td><input type="number" name="stunum"/></td>
        </tr>
      </table>
      <br><br>

      <!--Booking Details-->
      <table>
        <th>Booking Details</th>
        <tr>
          <td>Purpose: </td>
          <td colspan="2"><input type="text" name="bookTitle" size="100"/></td>
        </tr>
        <tr>
          <td>Room Selected: </td>
          <td><select name="roomid">
            <option value=""></option>
            <?php
              require("configDB.php"); 
              $getting_room_list = "SELECT * FROM room" ;
              $datas = mysqli_query($conn,$getting_room_list);
              
              while($insert = $datas->fetch_assoc()){
            ?>
            <option value= <?php echo $insert["roomid"]?> <?php
              if($insert["room_availability"] != "available"){
                echo "disabled" ;
              }?>> 
              <?php echo $insert["room_descrip"] ?></option>
            <?php } ?>
          </select>
        </td>
        </tr>

        <tr>
          <td>Date: </td>
          <td><input type="date" name="date"/></td>
        </tr>

        <tr>
          <td>Start Time: </td>
          <td><select name="startTime">
            <option value=""></option>
            <option value="0800">0800</option>
            <option value="0900">0900</option>
            <option value="1000">1000</option>
            <option value="1100">1100</option>
            <option value="1200">1200</option>
            <option value="1300">1300</option>
            <option value="1400">1400</option>
            <option value="1500">1500</option>
            <option value="1600">1600</option>
          </select></td>
        </tr>

        <tr>
          <td>End Time: </td>
          <td>
            <select name="endTime">
              <option value=""></option>
              <option value="0900">0900</option>
              <option value="1000">1000</option>
              <option value="1100">1100</option>
              <option value="1200">1200</option>
              <option value="1300">1300</option>
              <option value="1400">1400</option>
              <option value="1500">1500</option>
              <option value="1600">1600</option>
              <option value="1700">1700</option>
            </select>
          </td>
        </tr>
      </table>

      <br>
      <div class="butts">
        <input type="submit" value="Submit form" class="submitbutt">
        <input type="reset"  value="Clear form" class="resetbutt">
    </div>
    </form>
  <?php  }?>
  </body>
</html>

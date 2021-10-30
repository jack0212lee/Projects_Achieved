<!DOCTYPE html>

<?php
    session_start();

    if ($_SESSION["Login"] != "YES"){
      header("Location: index.php");
    }
    
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Thanks for Booking with Us!</title>
  </head>
  <style>
  .Bookingreceipt{
        margin : 10px;
      }
  </style>
  <body>
    <?php if($_SESSION["LEVEL"] == 3){
      require("lecturer_menu_bar.html");}?>
    <div class="Bookingreceipt">
        <h2>Thank you for booking the room!</h2>
        <?php
            require ("configDB.php");

            $user_id = $_SESSION["ID"];
            $name = $_SESSION["USER"];
            $bookSubject = $conn->real_escape_string($_POST["bookSubject"]);
            $section =$conn->real_escape_string($_POST["section"]) ;
            $stunum = $conn->real_escape_string($_POST["stunum"]);
            $bookTitle = $conn->real_escape_string($_POST["bookTitle"]);
            $roomid = $conn->real_escape_string($_POST["roomid"]) ;
            $date = $conn->real_escape_string($_POST["date"]) ;
            $startTime = $conn->real_escape_string($_POST["startTime"]);
            $endTime = $conn->real_escape_string($_POST["endTime"]);

            date_default_timezone_set("Asia/Kuala_Lumpur");
            $applyDate =date("Ymd");
            $applyTime =date("His");
            $applyTimeDate = $conn->real_escape_string($applyDate . $applyTime);
            $booking_id= $applyTimeDate ;

            $sql = "INSERT INTO booking (booking_id, user_id, roomid, bookTitle, bookSubject,
              section, studnum, bookDate, startTime, endTime, applyTimeDate)
              VALUES ('$booking_id', '$user_id', '$roomid', '$bookTitle', '$bookSubject', '$section',
              '$stunum', '$date', '$startTime', '$endTime', '$applyTimeDate')";

            if ($conn->query($sql)===TRUE){
              echo "  Your booking id is " . $booking_id;
            } else{
              echo "Error: " .$sql. "<br>" . $conn->error;
            }

            $conn->close();

            header("Location: checkBookings.php");

        ?>
          <hr>
  </body>
</html>

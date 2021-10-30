<?php
    session_start();
    require("configDB.php");
    $tempID = $_POST["id"];

        $tempRoom = $_POST["roomid"];
        $tempTitle = $_POST["booktitle"];
        $tempSubject = $_POST["bookSubject"];
        $tempSection = $_POST["section"];
        $tempStud = $_POST["studnum"];
        $tempBookDate = $_POST["bookDate"];
        $tempStart = $_POST["startTime"];
        $tempEnd = $_POST["endTime"];
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $tempApplyDate =date("Ymd");
        $tempApplyTime =date("His");
        $tempApplyTimeDate = $tempApplyDate . $tempApplyTime;



        $sql = "UPDATE booking SET roomid = '$tempRoom', bookTitle = '$tempTitle',
        bookSubject = '$tempSubject', section = '$tempSection', studnum = '$tempStud',
        bookDate = '$tempBookDate', startTime = '$tempStart', endTime = '$tempEnd',
        applyTimeDate = '$tempApplyTimeDate'
        WHERE booking_id = '$tempID'";

        if(mysqli_query($conn, $sql)){
            echo "Updated";
        }else {
            echo "Error";
        }
        header("Location: viewResult.php");
?>

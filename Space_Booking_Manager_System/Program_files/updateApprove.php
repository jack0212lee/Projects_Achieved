<?php
    session_start();
    require("configDB.php");
    $tempID = $_POST["id"];

        $Status = $_POST["status"];
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $tempStatusDate =date("Ymd");
        $tempStatusTime =date("His");
        $tempStatusTimeDate = $tempStatusDate . $tempStatusTime;

        $sql = "UPDATE booking SET bookStatus = '$Status', statusTimeDate = '$tempStatusTimeDate' WHERE booking_id = '$tempID'";

        if(mysqli_query($conn, $sql)){
            echo "Updated";
        }else {
            echo "Error";
        }
        if($_SESSION["LEVEL"] == 2){
        header("Location: spacemanagerpage1.php");}
        if($_SESSION["LEVEL"] == 1){
            header("Location: adminpage1.php");}
?>

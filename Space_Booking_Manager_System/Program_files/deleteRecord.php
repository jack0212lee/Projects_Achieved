<?php
        if((session_id() == '')){
            session_start();
            }
        //echo $_SESSION["Login"]; //for session tracking purpose, can delete
        //echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete
    
        if ($_SESSION["Login"] != "YES"){
            header("Location: index.php");
        }
        require("configDB.php");

        $item = $_POST["to_be_delete"];

        $sql = "DELETE FROM booking WHERE booking_id = $item " ;
        $result = mysqli_query($conn, $sql) ;

        if($result){
            if($_SESSION["LEVEL"] == 3){
            header("Location: checkBookings.php");
            }
            if($_SESSION["LEVEL"] == 1){
                header("Location: adminpage1.php");
            }
        }
        else{
            echo "Error" ;
        }
?>
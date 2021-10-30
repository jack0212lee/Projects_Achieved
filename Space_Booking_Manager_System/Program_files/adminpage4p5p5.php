<?php
    if((session_id() == '')){
        session_start();
        }
    //echo $_SESSION["Login"]; //for session tracking purpose, can delete
    //echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

    if ($_SESSION["Login"] != "YES"){
        header("Location: index.php");
    }

    $display = "All" ;

    require("configDB.php");

    $deleteitem = $_GET['value'];

    $sql2 = "SET FOREIGN_KEY_CHECKS = 0;";
    $result = mysqli_query($conn, $sql2) ;

    $sql2 = "DELETE FROM user WHERE user_id='$deleteitem'" ;
    $result = mysqli_query($conn, $sql2) ;


    $result = $conn->query($sql2) or die($conn->error);
    if($result){
        echo "deleted" ;
    }
    else{
        echo "error";
    }

    header("Location: adminpage4.php");
?>
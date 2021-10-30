<?php
   if((session_id() == '')){
    session_start();
    }
  // echo $_SESSION["Login"];
  // echo $_SESSION["LEVEL"];
  if ($_SESSION["Login"] != "YES"){
    header("Location: index.php");
  }

  require("configDB.php");
  $id = $_POST["roomID"];
  $sql = "SELECT * FROM room WHERE roomid = '$id'";
//   echo $id ;
//   $result = $conn->query($sql) or die($conn->error);
  $result = mysqli_query($conn, $sql);
  $rows = $result->fetch_assoc();
  
  if($rows["room_availability"] != "available"){
    $dql = "UPDATE room SET room_availability = 'available' WHERE roomid = '$id' " ;
    $result2 = mysqli_query($conn, $dql);
    $dql2 = "UPDATE room SET room_lastupdate = now() WHERE roomid = '$id' " ;
    $result3 = mysqli_query($conn, $dql2);
  }
  else{
    $dql = "UPDATE room SET room_availability = 'not available' WHERE roomid = '$id' " ;
    $result2 = mysqli_query($conn, $dql);
    $dql2 = "UPDATE room SET room_lastupdate = now() WHERE roomid = '$id' " ;
    $result3 = mysqli_query($conn, $dql2);
  }

  header("Location: spacemanagerpage4.php");
?>



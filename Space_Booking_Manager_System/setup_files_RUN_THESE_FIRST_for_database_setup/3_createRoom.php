<?php

    require("configDB.php");

    $sql = "CREATE TABLE room (
        roomid VARCHAR (8),
        room_descrip VARCHAR (30),
        room_location VARCHAR (100),
        room_availability VARCHAR (50), /* in available or under maintenance etc.*/
        room_capacity int,
        room_lastupdate DATETIME,
        PRIMARY KEY (roomid)
        ) ";

if (mysqli_query($conn, $sql)) {
    echo "<h3>Table user created successfully</h3>";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
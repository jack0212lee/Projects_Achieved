<?php

    require("configDB.php");

    $sql = "CREATE TABLE user (
        user_id VARCHAR (8), /* uniquely identifies user, unchangeable*/
        username VARCHAR (100) NOT NULL, /* user's real name, unchangeable */
        password VARCHAR (20) NOT NULL ,

        userlevel int, /* 1- admin, 2- space manager, 3- lecturer */
        school VARCHAR (50),
        faculty VARCHAR (50),
        email VARCHAR (100),
        phoneNo VARCHAR (20),

        PRIMARY KEY (user_id)
        ) ";

if (mysqli_query($conn, $sql)) {
    echo "<h3>Table user created successfully</h3>";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
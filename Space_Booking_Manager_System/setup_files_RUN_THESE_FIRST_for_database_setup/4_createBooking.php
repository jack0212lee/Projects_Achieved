<?php

    require("configDB.php");

    $sql = "CREATE TABLE booking (
        booking_id VARCHAR (14),
        booking_index int NOT NULL AUTO_INCREMENT,
        user_id VARCHAR (8),
        roomid VARCHAR (8),


        bookTitle VARCHAR (100), /*Purpose of booking */
        bookSubject VARCHAR (50), /*Subject that use the lab/room */
        section int, /* class section */
        studnum int, /* Number of students using the lab/room */
        bookDate DATE, /* Booking date */

        startTime VARCHAR (10), /* set up the timeslots in hours format (0800)*/
        endTime VARCHAR (10),

        bookStatus VARCHAR (30), /* Approved , Pending, Reject */
        applyTimeDate DATETIME, /* Date and time of booking request sent */
        statusTimeDate DATETIME, /* Date and time of request being updated by admin */

        FOREIGN KEY (roomid) REFERENCES room(roomid),
        FOREIGN KEY (user_id) REFERENCES USER (user_id),
        PRIMARY KEY (booking_index)
        ) ";

if (mysqli_query($conn, $sql)) {
    echo "<h3>Table user created successfully</h3>";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>

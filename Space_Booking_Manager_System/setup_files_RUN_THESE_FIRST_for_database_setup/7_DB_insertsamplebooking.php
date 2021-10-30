<?php
 
require ("configDB.php");

$sql = "INSERT INTO booking (booking_id,user_id,roomid,bookTitle,
bookSubject,section,studnum,bookDate,startTime,
endTime,bookStatus,applyTimeDate,statusTimeDate)
VALUES ('B001', 'L2100001','MPK1', 'Lecture','Web Programming', 30, 40, '2021-01-01' , '0800', '1000', '',
now(), now());";

if (mysqli_multi_query($conn, $sql)) {
  echo "<h3>New records created successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
 
?> 

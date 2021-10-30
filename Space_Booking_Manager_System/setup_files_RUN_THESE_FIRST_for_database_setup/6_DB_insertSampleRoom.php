<?php
 
require ("configDB.php");

$sql = "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('MPK1', 'Lab 1', 'N24','available', 30, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('MPK2', 'Lab 2', 'N24', 'available', 50, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('MPK3', 'Lab 3', 'N24', 'available', 40, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('MPK4', 'Lab 4', 'N24', 'available', 20, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('MPK5', 'Lab 5', 'N24', 'available', 30, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('MPK6', 'Lab 6', 'N24', 'available', 30, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('MPK7', 'Lab 7', 'N24', 'available', 25, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('MPK8', 'Lab 8', 'N24', 'available', 35, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('MPK9', 'Lab 9', 'N24', 'available', 25, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('MPK10', 'Lab 10', 'N24', 'available', 30, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('MPK11', 'Lab 11', 'N24', 'available', 30, now());";

$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('BK1', 'Lecture Room 1', 'N28' ,'available', 30, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('BK2', 'Lecture Room 2', 'N28' ,'available', 35, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('BK3', 'Lecture Room 3', 'N28' ,'available', 40, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('BK4', 'Lecture Room 4', 'N28' ,'available', 35, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('BK5', 'Lecture Room 5', 'N28' ,'available', 50, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('BK6', 'Lecture Room 6', 'N28' ,'available', 45, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('BK7', 'Lecture Room 7', 'N28' ,'available', 55, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('BK8', 'Lecture Room 8', 'N28' ,'available', 60, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('BK9', 'Lecture Room 9', 'N28' ,'available', 45, now());";
$sql .= "INSERT INTO room (roomid, room_descrip, room_location, room_availability, room_capacity, room_lastupdate)
VALUES ('BK10', 'Lecture Room 10', 'N28' ,'available', 30, now());";

if (mysqli_multi_query($conn, $sql)) {
  echo "<h3>New records created successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
 
?> 

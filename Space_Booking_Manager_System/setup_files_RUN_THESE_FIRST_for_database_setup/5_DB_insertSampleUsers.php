<?php
 
require ("configDB.php");

$sql = "INSERT INTO user (user_id, username, password, userlevel, school, faculty, email, phoneNo)
VALUES ('A2100001', 'Siah Weng Tze','admin123', 1, 'School of Admin', 'Faculty of Admin', 'admin@utm.my', '+607775563');";
$sql .= "INSERT INTO user (user_id, username, password, userlevel, school, faculty, email, phoneNo)
VALUES ('S2100001', 'Chin Wei Xiang','space123', 2, 'School of Computing', 'Faculty of Engineering', 'spacemanager@utm.my', '+60112321531');";
$sql .= "INSERT INTO user (user_id, username, password, userlevel, school, faculty, email, phoneNo)
VALUES ('L2100001', 'Nicholas Pang', 'lectr123', 3 , 'School of Computing', 'Faculty of Engineering', 'lecturer@utm.my', '+601424235')";

if (mysqli_multi_query($conn, $sql)) {
  echo "<h3>New records created successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
 
?> 
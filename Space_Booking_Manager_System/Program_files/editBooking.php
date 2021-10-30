<?php
    session_start();
?>
<html>
    <head>
        <title>Update Booking</title>
    </head>
    <body>
        <?php
            require("configDB.php");
            $ID = $_GET["id"];
            $sql = "SELECT * FROM booking WHERE booking_id='$ID'";

            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_assoc($result);
        ?>
        <form method="post" action="updateBooking.php">
            </br>
            </br>
            <table>
                <tr>
                    <td>Booking ID: </td>
                    <td ><input type="text" name="id" value=<?php echo $ID?> readonly></td>
                </tr>
                <tr>
                    <td>Room Id: </td>
                    <td><input type="text" name="roomid" value=<?php echo $rows["roomid"]?>></td>
                </tr>
                <tr>
                    <td>Book Title: </td>
                    <td><input type="text" name="booktitle" value=<?php echo $rows["bookTitle"]?>></td>
                </tr>
                <tr>
                    <td>BookSubject: </td>
                    <td><input type="text" name="bookSubject" value=<?php echo $rows["bookSubject"]?>></td>
                </tr>
                <tr>
                    <td>Section: </td>
                    <td><input type="text" name="section" value=<?php echo $rows["section"]?>></td>
                </tr>

                <tr>
                    <td>Studnum: </td>
                    <td><input type="text" name="studnum" value=<?php echo $rows["studnum"]?>></td>
                </tr>

                <tr>
                    <td>Book Date: </td>
                    <td><input type="text" name="bookDate" value=<?php echo $rows["bookDate"]?>></td>
                </tr>

                <tr>
                    <td>Start Time: </td>
                    <td><input type="text" name="startTime" value=<?php echo $rows["startTime"]?>></td>
                </tr>

                <tr>
                    <td>End Time: </td>
                    <td><input type="text" name="endTime" value=<?php echo $rows["endTime"]?>></td>
                </tr>

                <tr>
                    <td colspan="2" align=center><input type="submit" value="Update"></td>
                </tr>
            </table>
        </form>
    </body>
</html>

<?php
    if((session_id() == '')){
        session_start();
        }
    //echo $_SESSION["Login"]; //for session tracking purpose, can delete
    //echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

    if ($_SESSION["Login"] != "YES"){
        header("Location: index.php");
    }
?>
<html>
    <head>
        <title>Approve application</title>
    </head>
    <body>
        <?php
            require("configDB.php");
            $ID = $_POST["ID_bkn"];
            $sql = "SELECT * FROM booking WHERE booking_id='$ID'";

            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_assoc($result);
        ?>
        <form method="post" action="updateApprove.php">
          <table>
            <tr>
              <td>Booking Id: </td>
              <td><input type="text" name="id" value=<?php echo $ID?> readonly></td>
            </tr>
          </table>
          <p> You want to <select name="status">
            <option value="APPROVED">Approved</option>
            <option value="REJECTED">Reject</option>
          </select> this application?</p>
          <br>
          <input type="submit" value="Update">

        </form>
    </body>
</html>

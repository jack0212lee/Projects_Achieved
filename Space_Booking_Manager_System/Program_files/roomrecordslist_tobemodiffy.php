<!DOCTYPE html>
<html>
    <head>
        <Title>Booking Page</Title>
    </head>
    <style>
        .top_row ul li #b{
        background: linear-gradient(45deg, #d6e9f1, rgba(22, 149, 207, 0.5));    
        color: white;
        transition: 0.5s;
        padding: 9px 17px;
        }
    </style>
    <body>
        <?php 
        session_start();

            if ($_SESSION["Login"] != "YES"){
                header("Location: index.php");
            }
        
        require("configDB.php");
        $sql = "SELECT * FROM room";
        $result = mysqli_query($conn, $sql);

        require("lecturer_menu_bar.html");
        ?>
            <h1>view room record</h1>
                <table border="1" cellspacing="0" >
                    <tr>
		                <td align="center" width="70"><strong>Room ID</strong></td>
                        <td align="center" width="70"><strong>Room Description</strong></td>
                        <td align="center" width="50"><strong>Room Location</strong></td>
		                <td align="center" width="170"><strong>Room Availability</strong></td>
		                <td align="center" width="50"><strong>Book Capacity</strong></td>
                    
                    </tr>
                 
                        <?php while($rows = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                <td><?php echo $rows["roomid"]?></td>
                                <td><?php echo $rows["room_descrip"]?></td>
                                <td><?php echo $rows["room_location"]?></td>
                                <td><?php echo $rows["room_availability"]?></td>
                                <td><?php echo $rows["room_capacity"]?></td>
                                </tr>
                                <?php
                        }?>
                </table>
    </body>
</html>
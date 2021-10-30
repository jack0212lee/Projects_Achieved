<?php 
            if((session_id() == '')){
                session_start();
                }
                // echo $_SESSION["Login"]; //for session tracking purpose, can delete
                // echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete
            
                if ($_SESSION["Login"] != "YES"){
                    header("Location: index.php");
                }
                
        if($_SESSION["LEVEL"] == 1 && $_SESSION["d"] == 2) {
        require("configDB.php");
        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);
        ?>
            <h1>All Users' Profile</h1>
                <table border="1" cellspacing="0" >
                    <tr>
		                <td align="center" width="70"><strong>User ID</strong></td>
		                <td align="center" width="170"><strong>Username</strong></td>
		                <td align="center" width="50"><strong>User Level</strong></td>
                        <td align="center" width="100"><strong>User Type</strong></td>
                        <td align="center" width="150"><strong>School</strong></td>
                        <td align="center" width="150"><strong>Faculty</strong></td>
                        <td align="center" width="200"><strong>Email</strong></td>
                        <td align="center" width="150"><strong>Phone Number</strong></td>
                        <td align="center" width="100"><strong>Edit</strong></td>
                        <td align="center" width="100"><strong>Delete</strong></td>
                    </tr>
                 
                        <?php while($rows = mysqli_fetch_assoc($result)) {
                            if($rows["userlevel"] == 2 || $rows["userlevel"] == 3) {?>
                                <tr>
                                <td><?php echo $rows["user_id"]?></td>
                                <td><?php echo $rows["username"]?></td>
                                <td><?php echo $rows["userlevel"]?></td>
                                <td>
                                    <?php if($rows["userlevel"] == 2){
                                        echo "Manager";
                                    }else{
                                        echo "Lecturer";
                                    }?>
                                </td>
                                <td><?php echo $rows["school"]?></td>
                                <td><?php echo $rows["faculty"]?></td>
                                <td><?php echo $rows["email"]?></td>
                                <td><?php echo $rows["phoneNo"]?></td>
                                <td><?php echo "<a href='adminpage4p5.php ?id=" . $rows["user_id"] . "'>Edit</a>"?></td>
                                <td><?php echo "<a href='adminpage4p5p5.php?value=";
                                            echo $rows["user_id"];
                                              echo "'><button type='submit' onclick='return (deleteuser())' ";
                                                    echo">DELETE USER</button></a>";?></td>
                                </tr>
                        <?php }else{
                                continue;
                            }
                        }?>
               
                </table>
        <?php }
        mysqli_close($conn)?>
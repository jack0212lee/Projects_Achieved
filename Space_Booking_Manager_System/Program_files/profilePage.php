<?php
    if((session_id() == '')){
    session_start();
    }
    // echo $_SESSION["Login"]; //for session tracking purpose, can delete
    // echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

    if ($_SESSION["Login"] != "YES"){
        header("Location: index.php");
    }
?>

<html>
    <head>
        <title>Profile Page</title>
        <link rel="stylesheet" href="profilePage.css">
    </head>
    <body>
        <?php
            require("configDB.php");

            $sql = "SELECT * FROM user";    
            $result = mysqli_query($conn, $sql);

            if($_SESSION['LEVEL']==3){
            require("lecturer_menu_bar.html");}
        ?>

        <div class = "container">
            <div class = "personal_prof">
            <h1><?php echo $_SESSION["USER"]?>'s Profile</h1>
            <table class="profile" id="user_prof">
                <?php while($rows = mysqli_fetch_assoc($result)) {
                    if($_SESSION["ID"] == $rows["user_id"])  {
                ?>
                <tr>
                    <td>ID: </td>
                    <td class="data"><?php echo $rows['user_id'];?></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td class="data"><?php echo $rows['username'];?></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td class="data"><?php echo $rows['password'];?></td>
                </tr>
                <tr>
                    <td >Phone Number: </td>
                    <td class="data"><?php echo $rows['phoneNo'];?></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td class="data"><?php echo $rows['email'];?></td>
                </tr>
                <?php
                if($_SESSION["LEVEL"] == 2 || $_SESSION["LEVEL"] == 3) { ?>
                    <tr>
                        <td>School: </td>
                        <td class="data"><?php echo $rows["school"];?></td>
                    </tr>
                    <tr>
                        <td>Faculty: </td>
                        <td class="data" ><?php echo $rows["faculty"];?></td>
                    </tr>
                <?php }
                break;
                    }else{
                        continue;
                    }
                } ?>
            </table>
            <div class="edit_button">
            <?php
            if ($_SESSION ['LEVEL'] == 1){
                echo "<a href='adminpage3p5.php ?id=" . $rows["user_id"] . "'>Edit Profile</a></br>";} 
            if ($_SESSION ['LEVEL'] == 2){
                echo "<a href='spacemanagerpage3p5.php ?id=" . $rows["user_id"] . "'>Edit Profile</a></br>";}
            if ($_SESSION ['LEVEL'] == 3){
                echo "<a href='editProfile.php ?id=" . $rows["user_id"] . "'>Edit Profile</a></br>"; }?>

            </div>
        </div>
    </div>
    </body>
</html>

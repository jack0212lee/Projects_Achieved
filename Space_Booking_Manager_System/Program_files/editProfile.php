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
        <title>Edit Profile</title>
        <link rel="stylesheet" href="editProfile.css">
    </head>
    <body>
        <?php
            require("configDB.php");
            $ID = $_GET["id"];
            $sql = "SELECT * FROM user WHERE user_id='$ID'";
            
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_assoc($result);

            if($_SESSION["LEVEL"] == 3 ){
            require("lecturer_menu_bar.html");}

        ?>
          
        <div id="edit_prof">
            <div id="content">
        <form method="post" action= "updateProfile.php" name="updateform" id="updateform" onsubmit="return(validateform());">
            <h2>Editing Profile</h2>
                    <table id="formtable">
                        <tr>
                            <td class="label">ID: </td>
                            <td class="nochange"><input type="text"  name="id" size="40" id="id" value="<?php echo $ID?>" readonly></td>
                        </tr>
                        <tr>
                            <td class="label">Username: </td>
                            <td class="nochange"><input type="text"  name="username" size="40" id="username" value="<?php echo $rows['username']?>" readonly></td>
                        </tr>
                        <tr>
                            <td class="label">Password: </td>
                            <td class="change"><input type="text" name="password" size="40" id="password" value="<?php echo $rows['password']?>" require></td>
                        </tr>
                        <tr>
                            <td class="label"> Phone Number: </td>
                            <td class="change"><input type="text" name="phoneNo" size="40" id="phoneNo" value="<?php echo $rows['phoneNo']?>" require></td>
                        </tr>
                        <tr>
                            <td class="label">Email: </td>
                            <td class="change"><input type="text"  name="email" size="40" id="email" value="<?php echo $rows['email']?>" require></td>
                        </tr>
                        <?php if($rows["userlevel"] == 2 || $rows["userlevel"] == 3) {?>
                            <tr>
                                <td class="label">School: </td>
                                <td class="nochange"><input type="text"  name="school" size="40" id="school" value="<?php echo $rows['school']?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="label">Faculty: </td>
                                <td class="nochange"><input type="text"  name="faculty" size="40" id="faculty" value="<?php echo $rows['faculty']?>" readonly></td>
                            </tr>
                        <?php }?>     
                    </table>
                        <div class="butt">
                        <input type="submit" value="UPDATE" id="updatebutt">
                        </div>
                        <div class="butt">
                        
                        <?php
                            if($_SESSION["LEVEL"] == 3)
                            {echo "<a href='profilePage.php'><button type='button' >CANCEL</button></a>";}
                            if ($_SESSION["LEVEL"] == 2)
                            {echo "<a href='spacemanagerpage3.php'><button type='button'>CANCEL</button></a>";}
                            if ($_SESSION["LEVEL"] == 1 && $_SESSION["d"]==1)
                            {echo "<a href='adminpage3.php'><button type='button'>CANCEL</button></a>";}
                            if ($_SESSION["LEVEL"] == 1 && $_SESSION["d"]==2)
                            {echo "<div><a href='adminpage4.php'><button type='button'>CANCEL</button></a></div>";}
                        ?>
                        </div>
                    </div>
            </div>
        </form>
        <div id="del">
        <?php
        if ($_SESSION["LEVEL"] == 1 && $_SESSION["d"]==2){
                            echo "<a href='adminpage4p5p5.php?value=";
                            echo $ID;
                            echo "'><button type='submit' onclick='return (deleteuser())' ";
                            echo">DELETE USER</button></a>";}
        ?>
        </div>
    </body>
    <script>
            function deleteuser(){
                if(confirm("Are you sure you want to delete this user ? This action cannot be undone.")){
                    return true ;
                }
                else{
                    return false ;
                }
            }

            function validateEmail(a){
                var x = String(a);
                var dot = x.lastIndexOf(".")
                var aliant = x.lastIndexOf("@");
                
                if(aliant == 0 || dot < aliant || (dot-aliant)==1 )
                {
                    return false ;
                }
                else
                {
                    return true ;
                }
            }

        function validateform(){
            var p = document.updateform.password.value;
            p = String(p);
            var ph = document.updateform.phoneNo.value.length;
            var em = document.updateform.email.value.length;
            var strem = document.updateform.email.value ;
            if(p.length < 8){
                alert("Password length must be 8 charactor! ");
                document.updateform.password.focus();
                return false ;
            }
            if(ph < 10){
                alert("Please enter valid phone number!");
                document.updateform.phoneNo.focus();
                return false ;
            }
            if(em == 0 || em < 5){
                alert("Please enter your email !");
                document.updateform.email.focus();
                return false ;
            }        
            if (!validateEmail(strem))
            {
                alert("Please enter the correct email format!");
                document.updateform.email.focus();
                return false;
            }
            return true;
        }


    </script>
</html>

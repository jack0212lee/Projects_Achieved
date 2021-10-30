        <?php

        session_start();

        require("configDB.php");

        $checkuserid = $conn->real_escape_string($_POST["User_id"]);
        $checkpassword = $conn->real_escape_string($_POST["Password"]);

        $sql = "SELECT * FROM user WHERE user_id= '$checkuserid' AND Password = '$checkpassword'";

        $result = mysqli_query($conn, $sql);
        $rows=mysqli_fetch_assoc($result);

        if (isset($rows)){
            $user_name=$rows["username"];
            $user_id=$rows["user_id"];
            $user_level=$rows["userlevel"];

            $_SESSION["Login"] = "YES";
            $_SESSION["USER"] = $user_name;
            $_SESSION["ID"] = $user_id;
            $_SESSION["LEVEL"] =$user_level;

            $remember_me = $_POST["remember"];

            if(isset($_POST['remember'])){
                setcookie("userID", $_POST["User_id"], time()+3600);
                setcookie("pass", $_POST["Password"], time()+3600);
                setcookie("remLogin", $_POST["remember"], time()+3600);
            }
            else{
                setcookie("userID", "");
                setcookie("pass", "");
                setcookie("remLogin", "");
            }
            if($_SESSION["LEVEL"]==3){
            header("Location: mainpage.php");
            }
            if($_SESSION["LEVEL"]==2){
                header("Location: spacemanagerpage1.php");
            }
            if($_SESSION["LEVEL"]==1){
                header("Location: adminpage1.php");
            }
        }else{
            $_SESSION["Login"] = "NO";
                echo '<script type="text/javascript">'; 
                echo 'alert("Invalid user ID or password");'; 
                echo 'window.location.href = "index.php";';
                echo '</script>';
        }
        mysqli_close($conn);
        ?>

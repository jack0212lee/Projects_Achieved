<?php
    if((session_id() == '')){
        session_start();
        }
    //echo $_SESSION["Login"]; //for session tracking purpose, can delete
    //echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

    if ($_SESSION["Login"] != "YES"){
        header("Location: index.php");
    }

    require("configDB.php");

    $id = $_POST["user_ID"];

    $check_ID_query = "SELECT * FROM user WHERE user_id = '$id'";
    $result = mysqli_query($conn, $check_ID_query);
    $rows = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inserting new user</title>
    </head>
    <body onload="invalid_ID()"> </body>
    <?php
            if($rows){
                echo "<script> function invalid_ID(){
                    alert('This user ID is already in used !');
                    window.location.href = window.history.back(); }
                    </script>";
            }
            else{
                $username = $_POST["user_name"];
                $password = $_POST["user_password"];
                $level = $_POST["user_level"];
                $school = $_POST["school"];
                $faculty = $_POST["faculty"];
                $email = $_POST["email"];
                $phone = $_POST["phone"] ;

                $insert_sql = "INSERT INTO user
                (user_id,
                username,
                password,
                userlevel,
                school,
                faculty,
                email,
                phoneNo)
                VALUES ('$id', '$username', '$password', '$level', '$school', '$faculty', '$email', '$phone');" ;
                
                if($conn->query($insert_sql)==TRUE){
                    echo"done";
                echo '<script type="text/javascript">'; 
                echo 'alert("User added to database successfully");'; 
                echo 'window.location.href = "index.php";';
                echo '</script>';

                header("Location: adminpage4.php");
                }
                else{
                    echo "error";
                    $result = $conn->query($insert_sql) or die($conn->error);
                }
            }
    ?>
</html>
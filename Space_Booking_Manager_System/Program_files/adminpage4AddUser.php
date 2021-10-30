<?php
    if((session_id() == '')){
        session_start();
        }
    //echo $_SESSION["Login"]; //for session tracking purpose, can delete
    //echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

    if ($_SESSION["Login"] != "YES"){
        header("Location: index.php");
    }

    $_SESSION["d"] = 1 ;
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="adminpage.css">
    </head>
    <style>
        .main{
        min-height: 100vh;
        background-image: url(images/rain.png);

        background-size:cover;
      }
      #addUs{
            background: #03a9f4;
            transition: 0.5s;
            border-radius: 10px;
            width: 200px;
        }
    form .table th, td{
      
        border-color: transparent;
        padding: 5px ;
        border-radius: 10px;
      }
    form table tr td{
        font-size: 20px;
    }
    form table tr{
        margin: 5px;
        padding:5px;
    }
    td input{
        width: 600px;
        font-size: 18px ;
        padding: 3px ; 
        border-radius: 4px ;
        box-shadow: 5px 5px 5px grey;
      }

      .done, .resetbutt{
        background: lightgrey;
        color: black ;
        width: 100px;
        margin: 40px 50px 0 150px;
        height: 40px;
        border-radius: 10px ;
        transition: 0.5s;
        font-size: 16px;
        cursor: pointer;
        box-shadow: 5px 5px 5px grey
      }

      .done:hover{
        background: lightgreen;
        color: white ;
        width: 120px;
        height: 50px;
        transition: 0.5s;
      }

      .resetbutt:hover{
        background: red;
        color: white ;
        width: 120px;
        height: 50px;
        transition: 0.5s;
      }
        </style>
    <body>
        <div class="container2">
            <div class="navigation">
                <ul>
                    <li><h2><?php echo  $_SESSION["USER"]."(ADMIN)" ?></h2></li>
                    <a href="adminpage1.php"> 
                    <li>
                        <span class="title">Booking Requests</span>
                    </li></a>
                   <a href="adminpage2.php">
                    <li>
                        <span class="title">Booking Reports</span>
                    </li></a>
                    <a href="adminpage3.php">
                    <li id="PerPro">
                        <span class="title">Personal Profile</span>
                    </li>
                    </a>
                    <a href="adminpage4.php">
                    <li id="addUs">
                        <span class="title" >User Lists</span>
                    </li>
                    </a>
                    <a href="logout.php" id="logout">
                    <li>
                        <span class="title">Logout</span>
                    </li>
                    </a>
                </ul>
            </div>

            <div class="main">
                <div class="topbar">
                    <div class="toggle" onclick="toggleMenu();"><img src="images/menu-svgrepo-com.svg"></div>
                    <div class="title">Space Booking Management System<span><p><br>BOOK YOUR LABS & ROOMS WITH EASE</p></a></div>
                </div>
                <div class="con">
                    <h1>Add New User Form</h1>
                    <ol>
                    <li>Please fill in the exact information.</li>
                    <li>Please fill in with <b>UPPERCASE</b>. ( exp: SIAHWENGTZE)</li>
                    <li>The first capital of user's ID should represents their role (L-Lecturer, S-Space manager)</li>
                    </ol>
                <hr>

                    <form method="POST" action="addnewuser.php" name="user_info" onsubmit="return (validate2())">
                        <table>
                            <tr>
                                <td>User ID: </td>
                                <td><input type="text" name="user_ID" size="50"></td>
                            </tr>
                            <tr>
                                <td>User Name: </td>
                                <td><input type="text" name="user_name" size="50"></td>
                            </tr>
                            <tr>
                                <td>Password: </td>
                                <td><input type="text" name="user_password" size="50"></td>
                            </tr>
                            <tr hidden>
                                <td><input type="number" name="user_level" id="hide_level"></td>
                            </tr>
                            <tr>
                                <td>School: </td>
                                <td><input type="text" name="school" size="50"></td>
                            </tr>
                            <tr>
                                <td>Faculty: </td>
                                <td><input type="text" name="faculty" size="50"></td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td><input type="text" name="email" size="50"></td>
                            </tr>
                            <tr>
                                <td>Phone: </td>
                                <td><input type="text" name="phone" size="50"></td>
                            </tr>
                        </table>
                        <input type="submit" value="Done" class="done">
                        <input type="reset"  value="Clear form" class="resetbutt">
                    </form>
                </div>
            </div>
        </div>
        <script>
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

            function toggleMenu(){
                let toggle = document.querySelector('.toggle');
                let navigation = document.querySelector('.navigation');
                let main = document.querySelector('.main');

                
                toggle.classList.toggle('active');
                navigation.classList.toggle('active');
                main.classList.toggle('active');
            }
            function validate2(){
                if(document.user_info.user_ID.value == ""){
                    document.user_info.user_ID.focus();
                    alert("Please enter user's ID! ");
                    return false ;
                }
                if(document.user_info.user_name.value == ""){
                    document.user_info.user_name.focus();
                    alert("Please enter user's name! ");
                    return false ;
                }
                if(document.user_info.user_password.value == ""){
                    document.user_info.user_password.focus();
                    alert("Please enter user's password! ");
                    return false ;
                }
                if(document.user_info.user_password.value.length<8){
                    alert("Password length must be 8 charactor! ");
                    document.user_info.user_password.focus();
                    return false ;
                }
                if(document.user_info.school.value == ""){
                    document.user_info.school.focus();
                    alert("Please enter user's school! ");
                    return false ;
                }
                if(document.user_info.faculty.value == ""){
                    document.user_info.faculty.focus();
                    alert("Please enter user's faculty! ");
                    return false ;
                }
                if(document.user_info.email.value == ""){
                    document.user_info.email.focus();
                    alert("Please enter user's email! ");
                    return false ;
                }
                if(!validateEmail(document.user_info.email.value)){
                    document.user_info.email.focus();
                    alert("Please enter the correct email format!");
                    return false ;
                }
                if(document.user_info.phone.value == ""){
                    document.user_info.phone.focus();
                    alert("Please enter user's phone number! ");
                    return false ;
                }
                if(document.user_info.phone.value.length < 10){
                    document.user_info.phone.focus();
                    alert("Please enter valid phone number!");
                    return false ;
                }
                else{
                let identity = document.user_info.user_ID.value;
                let i = identity.substring(0,1);

                if (i == "L"){
                    document.user_info.user_level.value = 3 ;
                    return true ;
                }
                if (i == "S"){
                    document.user_info.user_level.value = 2 ;
                    return true ;
                }
                if(i != "L" || i != "S"){
                    document.user_info.user_ID.focus();
                    alert("Please enter the correct code for user's ID !");
                    return false ;
                }
                }
                
            }
        </script>
    </body>
</html>
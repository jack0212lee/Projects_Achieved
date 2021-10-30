<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <?php session_start()?>
        <a href="index.php" id="logo">Space Booking Management System<span><br><br>BOOK YOUR LABS & ROOMS WITH EASE</span></a>
        
        <div class="box">
            <form method="post" action="check_login.php">
                <b>Welcome! Please log in before proceeding</b>
                </br>
                </br>
                <table  style="text-align: left;">
                    <tr>
                        <td>User ID: </td>
                    </tr>
                    <tr>
                        <td><input type="text" name="User_id" size="40" required class="in"
                            value="<?php if(isset($_COOKIE['userID'])) {print ($_COOKIE['userID']);} ?>"></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                    </tr>
                    <tr>
                        <td><input type="password" name="Password" size="40" required class="in" 
                            value="<?php if(isset($_COOKIE['pass'])){ echo $_COOKIE['pass'];} ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Login" id="submit"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" id="remember" name="remember"
                            value="1" <?php if(isset($_COOKIE['pass'])){ ?> checked <?php } ?> >Remember me</td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

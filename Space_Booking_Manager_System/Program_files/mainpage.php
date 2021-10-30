<!DOCTYPE html>
<html>
    <head>
        <title>Welcome! </title>
        <link rel="stylesheet" href="lecturermainpage.css">
    </head>
    <body>
        <?php session_start() ;?>
        
        <?php require("lecturer_menu_bar.html")?>

        <div id="greetings">Welcome ! <?php echo $_SESSION["USER"]?></div>

        <section class="content">
            <div class="container">
                    <div class="hexagon">
                        <div class="option" id="booking">
                            <img src="images/labbackgroundimage.jpg">
                            <div class="caption">
                                <a href="bookingPage.php">Start booking now !</a>
                            </div>
                        </div>
                    </div>

                <div class="hexagon">                        
                        <div class="option" id="booking_report">
                            <img src="images/check_bookings.jpg">
                            <div class="caption">
                                <a href="checkBookings.php">Check your booking now !</a>
                            </div>
                        </div>
                </div>  
              </div>
        </section>
    </body>
</html>
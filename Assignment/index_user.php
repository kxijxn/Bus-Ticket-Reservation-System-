<?php
    session_start();

    if (isset($_SESSION['ID']) && isset($_SESSION['Username']))
    {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="styles/reg_index.css">
    </head>
    
    <body>
        <div class="transition transition-1 is-active"></div>

        <div class="nav">
            <nav>
                <ul class="nav-links">
                    <li><a href="index_user.php">Home</a></li>
                    <li><a href="bookings.php">Booking History</a></li>
                    <li><a href="logout.php" class="active">Sign Out</a></li>
                </ul>
            </nav> 
            <div class="clearfix"></div>
        </div> 

        <div class="intro">
            <h1>Welcome To Our Bus Resevation System!</h1>
        </div>

        <div class="search">
            
            <h3><a class="a" href="reg_results.php">Click here to view bus schedules!</a></h3>
        
        </div>

        <script src="JavaScript/transition.js"></script>
    </body>
</html>

<?php
}
else
{
    header("Location: index.php");
    exit();
}
?>
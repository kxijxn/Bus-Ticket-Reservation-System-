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
        <link rel="stylesheet" href="styles/index.css">
    </head>
    
    <body>
        <div class="transition transition-1 is-active"></div>


            <nav>
                <ul class="nav-links">
                    <li><a href="index_admin.php">Home</a></li>
                    <li><a href="routes.php">Routes/Time</a></li>
                    <li><a href="buses.php">Buses</a></li>
                    <li><a href="customerbooking.php">Customer Bookings</a></li>
                    <li><a href="users.php">Users</a></li>
                    <li><a href="add_admin.php">Add Admin</a></li>
                    <li><a href="logout.php" class="active">Sign Out</a></li>
                </ul>
            </nav> 

        <div class="intro">
            <h1>Welcome To Bus Resevation System!</h1>
        </div>

        <script src="JavaScript/transition.js"></script>
    </body>
</html>

<?php
}
else
{
    header("Location: index_admin.php");
    exit();
}
?>
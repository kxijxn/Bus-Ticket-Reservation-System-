<?php
    include 'conn.php';
    session_start();
    $userID = $_SESSION['ID'];

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
        <link rel="stylesheet" href="styles/cust.css">
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

        <div class="container">
            <div class="header">
                <h2>Schedules</h2>
            </div>
            <center>
                <table border="1" cellspacing="0" cellpadding="10" width="50%">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">UserID</th>
                        <th scope="col">ScheduleID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql="SELECT * from booking where user_id='$userID'";
                            $result=mysqli_query($conn, $sql);
                            if($result)
                            {
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $ID = $row['ID'];
                                    $Bus = $row['user_id'];
                                    $Bus2 = $row['schedule_id'];
                                    print ' <tr>
                                    <th scope="row">'.$ID.'</th>
                                    <td>'.$Bus.'</td>
                                    <td>'.$Bus2.'</td>
                                    </tr>';
                                }
                            }
                        ?>
                    </tbody>    
                </table>
            </center>
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
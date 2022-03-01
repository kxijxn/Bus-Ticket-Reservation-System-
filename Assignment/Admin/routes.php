<?php
    include 'conn.php';
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
        <title>Routes</title>
        <link rel="stylesheet" href="styles/routes.css">
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

        <div class="container1">
            <div class="header">
                <h2>Routes/Times</h2>
            </div>
            <button class="Primary"><a href="routeconfig.php">Add Routes</a></button>
            
            <center>
                <table border="1" cellspacing="0" cellpadding="10">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">BusPlateNumber</th>
                        <th scope="col">Route</th>
                        <th scope="col">Departure</th>
                        <th scope="col">Date</th>
                        <th scope="col">Price</th>
                        <th scope="col">Time</th>
                        <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql="SELECT * from schedules";
                            $result=mysqli_query($conn, $sql);
                            if($result)
                            {
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $ID = $row['ID'];
                                    $Bus = $row['BusPlateNumber'];
                                    $Bus2 = $row['Route'];
                                    $Bus3 = $row['Departure'];
                                    $Bus4 = $row['Date'];
                                    $Bus5 = $row['Price'];
                                    $Bus6 = $row['Time'];
                                    print ' <tr>
                                    <th scope="row">'.$ID.'</th>
                                    <td>'.$Bus.'</td>
                                    <td>'.$Bus2.'</td>
                                    <td>'.$Bus3.'</td>
                                    <td>'.$Bus4.'</td>
                                    <td>'.$Bus5.'</td>
                                    <td>'.$Bus6.'</td>
                                    <td>
                                    <button><a href="updateroute.php?updateid='.$ID.'">Update</a></button>
                                    <button><a href="deleteroute.php?deleteid='.$ID.'">Delete</a></button>
                                    </td>
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
    header("Location: sign_in.php");
    exit();
}
?>
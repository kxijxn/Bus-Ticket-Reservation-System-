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
        <title>Search Results</title>
        <link rel="stylesheet" href="Styles/reg_results.css">
    </head>
    
    <body>
        <div class="transition transition-1 is-active"></div> 
        
        <div class="nav">
            <nav>
                <ul class="nav-links">
                    <li><a href="index_user.php">Home</a></li>
                    <li><a href="reg_results.php">Schedules</a></li>
                    <li><a href="bookings.php">Booking History</a></li>
                    <li><a href="logout.php" class="active">Sign Out</a></li>
                </ul>
            </nav> 
            <div class="clearfix"></div>
        </div> 

        <div class="container1">
            <div class="header">
                <h2>Schedules</h2>
            </div>
            <center>
                <table cellspacing="10" cellpadding="20">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">BusID</th>
                        <th scope="col">Route</th>
                        <th scope="col">Departure</th>
                        <th scope="col">Date</th>
                        <th scope="col">Price</th>
                        <th scope="col">Time</th>
                        <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody align="center">
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
                                    <button><a href="payment.php?ID='.$ID.'">Book</a></button>
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
    header("Location: index.php");
    exit();
}
?>
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
        <title>Buses</title>
        <link rel="stylesheet" href="styles/buses.css">
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

       <div class="container">
            <div class="header">
                <h2>Buses</h2>
            </div>
           <button class="Primary"><a href="busconfig.php">Add Bus</a></button>
       
            <center>
                <table border="1" cellspacing="0" cellpadding="10">
                    <thead>
                        <tr>
                        <th scope="col">BusID</th>
                        <th scope="col">BusPlateNumber</th>
                        <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql="SELECT * from bus";
                            $result=mysqli_query($conn, $sql);
                            if($result)
                            {
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $ID = $row['BusID'];
                                    $Bus = $row['BusPlateNumber'];
                                    print ' <tr>
                                    <th scope="row">'.$ID.'</th>
                                    <td>'.$Bus.'</td>
                                    <td>
                                    <button><a href="updatebus.php?updateid='.$ID.'">Update</a></button>
                                    <button><a href="deletebus.php?deleteid='.$ID.'">Delete</a></button>
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
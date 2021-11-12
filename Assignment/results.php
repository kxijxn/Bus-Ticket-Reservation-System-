<?php
    include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Results</title>
        <link rel="stylesheet" href="Styles/results.css">
    </head>
    
    <body>
        <div class="transition transition-1 is-active"></div> 
        
        <div class="nav">
            <nav>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about_us.php">About Us</a></li>
                    <li><a href="sign_in.php">Sign In</a></li>
                    <li><a href="sign_up.php" class="active">Sign Up</a></li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </div> 

        <div class="container1">
            <div class="header">
                <h2>Schedules</h2>
            </div>

            <center>
                <table border="1" cellspacing="0" cellpadding="10">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">BusID</th>
                        <th scope="col">Route</th>
                        <th scope="col">Departure</th>
                        <th scope="col">Date</th>
                        <th scope="col">Price</th>
                        <th scope="col">Time</th>
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
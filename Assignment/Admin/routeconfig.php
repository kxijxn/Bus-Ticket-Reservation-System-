<?php
    include 'conn.php';

    if (isset($_POST['submit']))
    {
        $Plate = $_POST['busID'];
        $Plate2 = $_POST['route'];
        $Plate3 = $_POST['departure'];
        $Plate4 = $_POST['date'];
        $Plate5 = $_POST['price'];
        $Plate6 = $_POST['time'];

        if(empty($Plate) and empty($Plate2) and empty($Plate3) and empty($Plate4) and empty($Plate5) and empty($Plate6))
        {
            header("Location: routeconfig.php?error=Fields cannot be empty!");
	        exit();
        }
        elseif(empty($Plate))
        {
            header("Location: routeconfig.php?error=BusPlateNumber cannot be empty!");
	        exit();
        }
        elseif(empty($Plate2))
        {
            header("Location: routeconfig.php?error=Route cannot be empty!");
	        exit();
        }
        elseif(empty($Plate3))
        {
            header("Location: routeconfig.php?error=Departure cannot be empty!");
	        exit();
        }
        elseif(empty($Plate4))
        {
            header("Location: routeconfig.php?error=Date cannot be empty!");
	        exit();
        }
        elseif(empty($Plate5))
        {
            header("Location: routeconfig.php?error=Price cannot be empty!");
	        exit();
        }
        elseif(empty($Plate6))
        {
            header("Location: routeconfig.php?error=Time cannot be empty!");
	        exit();
        }
        else
        {
            $sql="INSERT into schedules(BusPlateNumber, Route, Departure, Date, Price, Time) values('$Plate', '$Plate2', '$Plate3', '$Plate4', '$Plate5', '$Plate6')";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                header("Location: routes.php");
	            exit(); 
            }   
        }
    }
    
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
        <title>Add Route</title>
        <link rel="stylesheet" href="styles/routeconfig.css">
    </head>
    
    <body>
        <div class="container">
                <div class="header">
                    <h2>Add Route</h2>
                    <div class="error">
                        <?php if (isset($_GET['error'])) 
                        { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php 
                        } ?> 
                    </div>
                </div>

            <form method="POST" class="form">    
                <div class="form-control">  
                    BusPlateNumber:   
                    <input type="text" name="busID" placeholder="BusPlateNumber" autocomplete="off">  
                </div>
                <div class="form-control">  
                    Route:   
                    <input type="text" name="route" placeholder="Route" autocomplete="off">  
                </div>
                <div class="form-control">  
                    Departure:   
                    <input type="text" name="departure" placeholder="Departure" autocomplete="off">  
                </div>
                <div class="form-control">  
                    Date:   
                    <input type="text" name="date" placeholder="Date" autocomplete="off">  
                </div> 
                <div class="form-control">  
                    Price:   
                    <input type="text" name="price" placeholder="Price" autocomplete="off">  
                </div>
                <div class="form-control">  
                    Time:   
                    <input type="text" name="time" placeholder="Time" autocomplete="off">  
                </div>                                 
                <button name="submit">Submit</button>                             
            </form>
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